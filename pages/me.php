<!DOCTYPE html>

<html lang="en">
<?php
		require_once 'shared/head.php';
        if (!isset($_SESSION["username"])) {
            header("Location:login_front.php");
        }
        $username = $_SESSION["username"];

	?>
	<link rel="stylesheet" href="../css/me.css" />
	
	<body>
		<?php
            require_once 'shared/nav_bar.php';
		?>
        <div class="dummy">
            <div class="container">
                <div class="info">

                    <h2>My Info</h2>
                    <div class="sub_info">
                        <?php
                            $user_query = "select * from users where user_id='$username'";
                            $user = $db->query($user_query)->fetch_assoc();
                            $email = $user['email'];
                            $full_name = $user['full_name'];
                            $user_id = $user['id'];

                            echo "<p><b>Full name: </b> \t $full_name</p>";
                            echo "<p><b>User name: </b> $username</p>";
                            echo "<p><b>Email: </b> $email</p>";
                        ?>
                    </div>
                </div>

                <div class="info">
                    <h2>My Booking</h2>

                    <?php
                        $my_bookings = array();

                        $query = "SELECT *, movies.id as movie_id from bookings
                                    INNER JOIN seats
                                        ON bookings.seat_id = seats.id
                                    INNER JOIN schedule
                                        on schedule.id = seats.schedule_id
                                    INNER JOIN movies
                                        on schedule.movie_id = movies.id	
                                where user_id = $user_id";

                        $result = $db->query($query);
                        if (!$result) {
                            $db->close();
                        }

                        $num_results = $result->num_rows;

                        for ($i=0; $i <$num_results; $i++) {
                            $row = $result->fetch_assoc();
                            $movie_name = $row['name'];
                            $movie_id = $row['movie_id'];

                            $desc = $row['description'];
                            $date_time = $row['date_time'];
                            $sched_id = $row['schedule_id'];
                            $hall = $row['hall'];
                            $r = $row['seat_row'];
                            $c = $row['seat_col'];
                            $new_seat = $r.'-'.$c;

                            $my_bookings[$movie_id]['movie_name'] = $movie_name;
                            $my_bookings[$movie_id]['desc'] = $desc;

                            if (!isset($my_bookings[$movie_id]['detail'])) {
                                $my_bookings[$movie_id]['detail'] = array();
                            }
                            // key is datetime, value: seats

                            if (!isset($my_bookings[$movie_id]['detail'][$date_time])){
                                $my_bookings[$movie_id]['detail'][$date_time] =array($new_seat);
                            } else {
                                array_push($my_bookings[$movie_id]['detail'][$date_time], $new_seat);
                            }


                        }
                        $my_bookings_out = '';
                        foreach ($my_bookings as $key => $value) {

                            $movie_name = $value['movie_name'];
                            $detail = $value['detail'];
                            $desc = $value['desc'];

                            $sub_detail = "";
                            foreach ($detail as $date_time => $seats) {
                                $this_seat = "";
                                foreach ($seats as $value) {
                                    $this_seat .= $value.", ";
                                }

                                $sub_detail .= "
                                    <tr>
                                        <td>
                                            $date_time
                                        </td>
                                        <td>
                                            $this_seat
                                        </td>
                                    </tr>

                                ";

                            }

                            $this_movie_out = "
                                <div class='sub_info'>
                                    <h3>Movie name: $movie_name</h3>
                                    <p><b>About:</b> $desc</p>
                                    <table>
                                        <tr>
                                            <th>
                                                Date & time
                                            </th>
                                            <th>
                                                Seats
                                            </th>
                                            
                                        </tr>
                                        $sub_detail

                                    </table>
                                </div>
                            ";
                            echo $this_movie_out;
                        }
    
                        $db->close();
                    ?>
                </div>
                <button onclick="location.href='http://localhost/pages/log_out.php';">Log out</button>
            </div>
        </div>

        
        
	</body>
</html>
