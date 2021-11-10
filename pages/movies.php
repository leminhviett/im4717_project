<!DOCTYPE html>

<html lang="en">
	<?php require 'shared/head.php' ?>

	<link rel="stylesheet" href="../css/movies.css" />

	<body>
		<?php require 'shared/nav_bar.php' ?>
		<div style="padding: 30px 30px; text-align: center">
			<h2>Showing now</h2>
			<div id="movies" class="grid_container">


				<?php

					// get all movies
					$query = "SELECT * FROM movies ORDER BY id DESC";
					$result = $db->query($query);

					$num_results = $result->num_rows;
					

					for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$id = $row['id'];
						$name = $row['name'];
						$desc = $row['description'];
						$image_data = 'data:image/png;base64, '. base64_encode($row['poster_img']);
						
						// get schedule
						$query2 = "SELECT * FROM schedule where movie_id=$id";
						$result2 = $db->query($query2);
	
						$num_results2 = $result2->num_rows;
	

						$schedule = "";
						for ($j=0; $j <$num_results2; $j++) {
							$row2 = $result2->fetch_assoc();
							$sched_id = $row2["id"];
							$sched=  $row2["date_time"];

							$schedule = $schedule."<option name='sched_id' value=$sched_id>$sched</option>";
						}
						
						$result2->free();
						$content = 
							"<div class='movie_card'>
								<img
									src='$image_data'
									alt='$name'
									style='width: 100%; height: 280px; max-height: 52%; border-radius: 15px'
								/>
			
									<div class='movie_info'>
										<br />
										<h2>$name</h2>
										<p>$desc</p>
										<br>
										<form action='detail_movie.php' method='GET'>
											<input type='hidden' value='$id' name='movie_id'></input>
											<label for='sched_id'>Pick a schedule</label>
											<select name='sched_id' id='sched_id'>
												$schedule
											</select>

											<br><br>
											<button type='submit' >View Detail</button>
										</form>
									
									</div>
							</div>";


						echo $content;
					}
				?>
			</div>
		</div>
	</body>
</html>
