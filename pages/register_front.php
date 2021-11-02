<!DOCTYPE html>

<html lang="en">
	<?php
		require 'shared/head.php';
	?>
	<link rel="stylesheet" href="../css/register_login.css" />
	
	<body>
		<?php
			require 'shared/nav_bar.php'
		?>

        <?php
            if(isset($_GET["message"])) {
                $message = $_GET["message"];
                echo "<script>alert('$message')</script>";
            }
        ?>
        
		<form action="register_back.php" method="POST">
            <div class="container">
                <h1>Register</h1>
                <br>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="username" id="username" required>

                <label for="fullname"><b>Full name</b></label>
                <input type="text" placeholder="Enter full name" name="fullname" id="fullname" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pw" id="pw" required>

                <hr>

                <button type="submit" class="registerbtn" name="sub">Register</button>
                <br>
                <br>
                
                <p>Already have an account? <a href="login_front.php">Log in</a>.</p>

            </div>

        </form>
		<!-- <script src="js/scripts.js"></script> -->
	</body>
</html>
