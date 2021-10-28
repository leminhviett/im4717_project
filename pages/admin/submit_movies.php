<?php
    // TODO: check admin role
    $name = $_FILES["movie_info"]['name'];
    $info = $_FILES["movie_info"]['tmp_name'];
    $image = file_get_contents($_FILES["movie_poster"]['tmp_name']);
    $info = file_get_contents($info);
    $json_a = json_decode($info, true);
    
    $movie_name = $json_a["movie_name"];
    $desc = $json_a["desc"];
    $date_time = $json_a["date_time"];

    require_once 'db_conn.php';

    $image = mysqli_real_escape_string($db, $image);

    $query1 = "insert into movies (name, description, poster_img) values ('".$movie_name."', '".$desc."', '".$image."')";
    $result = $db->query($query1);


    if ($result) {
        echo  "Succ" ;
    } else {
        echo $db->error;
    }

    $db->close();
?>