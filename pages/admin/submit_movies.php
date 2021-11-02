<?php
    // TODO: check admin role
    $name = $_FILES["movie_info"]['name'];
    $info = $_FILES["movie_info"]['tmp_name'];
    $image = file_get_contents($_FILES["movie_poster"]['tmp_name']);
    $info = file_get_contents($info);
    $json_a = json_decode($info, true);
    
    $movie_name = $json_a["movie_name"];
    $desc = $json_a["desc"];
    $date_times = $json_a["date_time"];
    $hall = $json_a["hall"];

    require_once '../shared/db_conn.php';

    $image = mysqli_real_escape_string($db, $image);



    $query1 = "insert into movies (name, description, poster_img) values ('".$movie_name."', '".$desc."', '".$image."')";
    $result = $db->query($query1);
    $query0 = "select max(id) as id from movies";
    $res1 = $db -> query($query0);

    $last_id = $res1->fetch_assoc()["id"];
    if ($result) {
        echo  "Movie info inserted" ;
        echo "<br/>";

    } else {
        echo $db->error;
    }

    $seat_rows = array('A','B','C','D','E','F');
    foreach ($date_times as $date_time) {
        $query2 = "insert into schedule (movie_id, date_time, hall) values ('$last_id', '$date_time', '$hall')";
        $result = $db->query($query2);

        $query0 = "select max(id) as id from schedule";
        $res1 = $db -> query($query0);
        $last_sched_id = $res1->fetch_assoc()["id"];
        
        for ($row=1; $row <= 6; $row ++) {
            $seat_row = $seat_rows[$row - 1];
            for ($col = 1; $col <= 9; $col++) {
                $query3 = "insert into seats (schedule_id, seat_row, seat_col, booked) values ('$last_sched_id', '$seat_row', '$col', 0)";
                $resul3 = $db->query($query3);
            }
        }

        if ($result) {
            echo  "Movie schedule inserted for slot '$date_time'" ;
            echo "<br/>";
        } else {
            echo $db->error;
        }
    }


    $db->close();
?>