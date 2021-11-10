<?php

    require_once 'shared/db_conn.php';
    
    // Escape user inputs for security
    $username = mysqli_real_escape_string($db, $_POST['username']);
    
    $sql_u = "SELECT * FROM users WHERE user_id='$username'";
    // echo $username;
    // exit();
    $res_u = mysqli_query($db, $sql_u);


    if (mysqli_num_rows($res_u) > 0) {
        mysqli_close($db);
        $_SESSION['message'] = "Username already taken";
        header("Location:register_front.php");
        exit();
    }

    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $hashed_pw = mysqli_real_escape_string($db, md5($_POST['pw']));

    // Attempt insert query execution
    $query = "INSERT INTO users (user_id, full_name, email, hashed_pw, role) VALUES ('$username','$fullname', '$email', '$hashed_pw', 'CUSTOMER')";
    if(mysqli_query($db, $query)){
        mysqli_close($db);
		$_SESSION['username'] = $username;
        $_SESSION['message'] = "Registration Sucessful!";

        header("Location:home.php");
    } else{
        mysqli_close($db);
        $_SESSION['message'] = "Something wrong during registration. Please try again";
        header("Location:register_front.php");
    }
    
    // Close connection


?>