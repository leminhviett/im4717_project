<!DOCTYPE html>

<html lang="en">
	<?php

		require_once 'shared/head.php';
	?>
	
	<link rel="stylesheet" href="../css/detail_movie.css" />

	
	<?php
		$sched_id = $_GET["sched_id"];
		$movie_id = $_GET["movie_id"];

		$query1 = "SELECT * FROM movies where id=$movie_id";
		$res1 = $db->query($query1);
		$row1 = $res1->fetch_assoc();
		$query2 = "SELECT * FROM seats where schedule_id=$sched_id";
		$result2 = $db->query($query1);

		$num_results = $result2->num_rows;

		$image_data = 'data:image/png;base64, '. base64_encode($row1['poster_img']);
		$title = $row1['name'];
		$desc = $row1['description'];

		// echo $image_data;
		// echo "<br>";
		// echo $title;
		// echo $desc;

		$smaller_col = "
		<div class='smaller_col'>
			<img
				src='$image_data'
				alt='$desc'
				style='width: 100%; height: auto'
			/>
		</div>";
		
		
		$rows = "";
		$seat_rows = array('A','B','C','D','E','F');

		$all_seats_query = "select * from seats where schedule_id=$sched_id order by seat_row, seat_col";
		$all_seats = $db->query($all_seats_query);

		for ($r = 1; $r <= 6; $r ++) {
			$current_r = $seat_rows[$r - 1];
			$temp1 = "
			<div class='row'>
				<div style='padding: 5px 5px'>$current_r</div>
				<div class='row'>";

			for ($c = 1; $c <= 9; $c ++ ) {
				$row_result_fetch = $all_seats->fetch_assoc();
				if ($row_result_fetch["booked"] == 1) {
					$temp1 = $temp1."<input class='seat' type=checkbox id='$current_r.$c' name='$current_r.$c' value='1' disabled='disabled' ></input>";
				} else {
					$temp1 = $temp1."<input class='seat' type=checkbox id='$current_r.$c' name='$current_r.$c' value='1' ></input>";
				}

			}
			$temp1 = $temp1."</div></div>";

			$rows = $rows.$temp1;
		}
	?>
	<body>
		<?php
			require_once 'shared/nav_bar.php';
		?>

		<div style="margin: auto; width: 80%">
			<div class="flex_container">

				<?php
					echo $smaller_col;

				?>
				
				<div class="larger_col" id="rows_container">
					<form action="book_seats.php" method="POST">


					<?php
						echo "<h2>$title</h2>";
						echo "<p>$desc</p>"
					?>
					<div class="seat_container">
						<?php
							echo $rows;
							echo "<input type=text name='sched_id' hidden value='$sched_id'/>";

						?>
						<br>
						<button type="submit">Confirm booking</button>
					</form>
					</div>
				</div>
			</div>
		</div>
		<script src="../js/booking_movies.js" >

		</script>
	</body>
</html>
