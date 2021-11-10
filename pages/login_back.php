<?php 


if(isset($_POST['sub']))
{	
	require_once 'shared/db_conn.php';
	//avoid sql injection
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $pw = mysqli_real_escape_string($db, $_POST['pw']);
	
	// $username = $_POST['username'];
	// $pw = $_POST['pw'];

	$query = mysqli_query($db,"select * from users where user_id='$username'and hashed_pw=md5('$pw')");
	// $query = ("select * from users where user_id='$username'and hashed_pw=md5('$pw')");
	
	// echo $query;
	// exit;
	$result=mysqli_fetch_array($query);
	$role = $result["role"];
	if($result) {
        mysqli_close($db);
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $role;
		$_SESSION['message'] = "Log in sucessful!";
        header("Location:home.php");
	}
	else
	{
        mysqli_close($db);
		$_SESSION['message'] = "Incorrect Username or Password!";
        header("Location:login_front.php");
	}
	exit();

}
?>