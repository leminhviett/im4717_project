<!DOCTYPE html>

<html lang="en">
	<?php
		require 'shared/head.php';
	?>
	<link rel="stylesheet" href="../css/register_login.css" />
	<script src="../js/input.js"></script>
	<body>
		<?php
			require 'shared/nav_bar.php';

            if(isset($_SESSION["message"])) {
                $message = $_SESSION["message"];
                echo "<script>alert('$message')</script>";
                unset($_SESSION["message"]);
            }
        ?>
        
		<form action="register_back.php" method="POST">
            <div class="container">
                <h1>Register</h1>
                <br>
                <p>Please fill in this form to create an account.</p>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="username" id="username" required>

                <label for="fullname"><b>Full name</b></label>
                <input type="text" placeholder="Enter full name" name="fullname" id="fullname" required>

                <label for="email"><b>Email</b></label>
                <input type="email"  type="email" placeholder="Enter Email" name="email" id="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pw" id="pw" required>

                <button type="submit" class="registerbtn" name="sub" onclick="return check_input();">Register</button>
                <br>
                <br>
                
                <p>Already have an account? <a href="login_front.php">Log in</a>.</p>

            </div>

        </form>
		<!-- <script src="js/scripts.js"></script> -->
	</body>
</html>
