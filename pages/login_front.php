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

        <form action="login_back.php" method="POST">
            <div class="container">
                <h2>Log in</h2>
                <br>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="username" id="username" required>

                <label for="pw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pw" id="pw" required>

                <hr>

                <button type="submit" class="registerbtn" name="sub">Log in</button>
                <br>
                <p>Don't have an account? <a href="register_front.php">Register</a>.</p>
            </div>
            

        </form>
		
	</body>
</html>
