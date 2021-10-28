<!DOCTYPE html>

<html lang="en">
	<?php
		require 'shared/head.php';
	?>
	<link rel="stylesheet" href="../css/home.css" />
	
	<body>
		<?php
			require 'nav_bar.php'
		?>

		<div class="banner_container">
			<div class="banner_bg">
				<img src="../imgs/banner_bg.jpeg" alt="Snow" style="height: 100%; width: 100%" />
			</div>

			<div class="banner_content">
				<h1>Heading</h1>
				<p>content</p>
				<br />
				<button>Watch now</button>
			</div>
		</div>
		<div style="padding: 10px 30px">
			<h2>Trending now</h2>
			<div class="card_container">
				<div class="card_col">
					<h1>Headning</h1>
					<p>paragraph</p>
				</div>
				<div class="card_col">
					<h1>Headning</h1>
					<p>paragraph</p>
				</div>
				<div class="card_col">
					<h1>Headning</h1>
					<p>paragraph</p>
				</div>
				<div class="card_col">
					<h1>Headning</h1>
					<p>paragraph</p>
				</div>
			</div>
		</div>
		<script src="js/scripts.js"></script>
	</body>
</html>
