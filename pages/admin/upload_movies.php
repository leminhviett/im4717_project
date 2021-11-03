<!DOCTYPE html>

<html lang="en">
	<?php
		require_once "../shared/head.php";
	?>

	<body>
		
		<?php
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
	</body>
</html>
