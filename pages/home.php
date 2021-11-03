<!DOCTYPE html>

<html lang="en">
	<?php
		require 'shared/head.php';
	?>
	<link rel="stylesheet" href="../css/home.css" />
	
	<body>
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
				<img src="../imgs/banner_bg.jpeg" alt="Snow" style="height: 100%; width: 100%" />
			</div>

			<div class="banner_content">
				<h1>Heading</h1>
				<p>content</p>
				<br />
				<?php
					$location = "location.href='$root_name/pages/movies.php';";
					echo "<button onclick=$location>Showing now</button>";

				?>
			</div>
		</div>
	</body>
</html>
