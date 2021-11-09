<!DOCTYPE html>

<html lang="en">
	<link rel="stylesheet" href="../../css/style.css" />

	<?php
		require_once "../shared/head.php";
	?>

	<body>
		<div class="center">


		<?php
			if ($_SESSION["role"] != "ADMIN") {
				echo "Unauthorized action!";

				exit;
			}
			echo "<form id='upload' method='post' action='$root_name/pages/admin/submit_movies.php' enctype='multipart/form-data'>";
		?>


			<label for="movie_info">Movie info</label>
			<input type="file" id="movie_info" name="movie_info" accept=".json" />
			<br />
			<br />

			<label for="movie_poster">Movie poster</label>

			<input type="file" id="movie_poster" name="movie_poster" accept="image/*" />
			<br />

			<input type="submit" />
		</form>
		</div>

	</body>
</html>
