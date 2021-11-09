<!DOCTYPE html>

<html lang="en">
	<?php
		require 'shared/head.php';
	?>
	<link rel="stylesheet" href="../css/home.css" />
	
	
	<body>
	<style>
	.about_header{
		/* text-shadow: 2px 2px 4px #000000; */
		
	}
	.about_content{
		font-family: "Courier New", monospace;
		font-size: 1.2rem;
		/* text-shadow: 2px 2px 4px #000000; */
		
	}
	.about_bg {
		display: flex;
		justify-content: center;
		flex-direction: column;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
		z-index: 100;
		background-position: center;
		background-size: 900px 600px;
		height: 600px;
		width: 900px;
		background-repeat: no-repeat;
		font-size: 25px;
		border-radius: 25px;
		padding:5%;
		/* box-shadow: 5px 5px 5px black; */
	}
	.blur_bg {
		/* filter: brightness(50%); */
		filter: blur(3px);
		-webkit-filter: blur(3px) brightness(0.45);
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
		z-index: 99;
		background-position: center;
		background-image: url("../imgs/about.jpeg");
		background-size: 900px 600px;
		height: 600px;
		width: 900px;
		background-repeat: no-repeat;
		font-size: 25px;
		border-radius: 25px;
		padding:5%;
		background-color: rgba(54, 54, 54, 0.5);
	}

	a {
		text-decoration: none;
		color: white;
	}
</style>
		<?php
			require 'shared/nav_bar.php';

            if(isset($_SESSION["message"])) {
                $message = $_SESSION["message"];
                echo "<script>alert('$message')</script>";
				unset($_SESSION["message"]);
            }
        ?>
		<div class="banner_container">
			<div class="banner_bg">
				<img src="../imgs/about.jpeg" alt="Snow" style="height: 100%; width: 100%" />
			</div>
			
			<div class="blur_bg">
				<p></p>
			</div>

			<div class="about_bg">							
					<h2 class="about_header">About us</h2><br>
					<p class="about_content">Our mission is to make cinema bookings easy and accessible for everyone whom have internet access. 
					<br><br>Cinema bookings be this easy!</p><br>	
				<h2 class="about_header">Contact us</h2><br>
					<p class="about_content">Telephone: 666-999-1111<br><br>Email: <a href="mailto:popcorn@gmail.com"><em>popcorn@gmail.com</em></a></p>						
			</div>
			
			
		</div>
	</body>
</html>
