
<!DOCTYPE html>

<html lang="en">
	<?php
		require 'shared/head.php';
	?>
	<link rel="stylesheet" href="../css/home.css" />
	
	<body>
        <?php
                    require 'shared/nav_bar.php';
        ?>
        <div class="center">
            <div>
                    <?php
                    if (!isset( $_SESSION['username'])) {
                        header("Location:login_front.php");
                    }
                    $username = $_SESSION['username'];
                    $result = $db->query("select * from users where user_id='$username'");
                    $user_id = $result->fetch_assoc()["id"];


                    $sched_id = $_POST["sched_id"];
                    unset($_POST['sched_id']);


                    foreach($_POST as $key => $value) {
                        $row = $key[0];
                        $col = $key[2];
                        
                        $seat_booked_query = "UPDATE seats set booked=1 where schedule_id='$sched_id' and seat_col = '$col' and seat_row = '$row'";
                        // echo $seat_booked_query;
                        // exit();
                        $result = $db->query($seat_booked_query);
                        $persist1 = 0;

                        if(! $result) {
                            echo mysqli_error($db);
                        } else {
                            $persist1 = 1;
                        }

                        $persist2 = 0;

                        $current_seat_id_query = "select id from seats where schedule_id='$sched_id' and seat_col = '$col' and seat_row = '$row'";
                        $res_seat_id= $db->query($current_seat_id_query);
                        $current_seat_id = $res_seat_id->fetch_assoc()['id'];

                        $preserve_booking = "insert into bookings (seat_id, user_id) values ('$current_seat_id', '$user_id')";
                        $result = $db->query($preserve_booking);

                        if(! $result) {
                            echo mysqli_error($db);
                        } else {
                            $persist2 = 1;
                        }

                        if ($persist1 && $persist2){
                            echo "<p>Successfully booked seat $row - $col</p>";
                        }

                    }

                    $db->close();
                ?>
            </div>
        </div>
		

	</body>
</html>
