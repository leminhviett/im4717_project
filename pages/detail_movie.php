<!DOCTYPE html>

<html lang="en">

	
	<link rel="stylesheet" href="../css/detail_movie.css" />

	

	<body>
		<div style="margin: auto; width: 80%">
			<div class="flex_container">
				<div class="smaller_col">
					<img
						src="../imgs/banner_bg.jpeg"
						alt="Snow"
						style="width: 100%; height: auto"
					/>
				</div>
				<div class="larger_col">
					<h2>Film title</h2>
					<br />
					<div>
						<label for="date">Pick a date</label>
						<select name="date" id="date">
							<option value="1/10">1/10/2021</option>
							<option value="20/10">20/10/2021</option>
						</select>
					</div>

					<div>
						<label for="time">Pick a time</label>
						<select name="time" id="time">
							<option value="1/10">1/10/2021</option>
							<option value="20/10">20/10/2021</option>
						</select>
					</div>
					<button>View seating</button>
					<br />

					<div class="seat_container">
						<div class="row">
							<div style="padding: 5px 5px">A</div>

							<div class="row">
								<div class="seat occupied"></div>
								<div class="seat selected"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
							</div>
						</div>

						<div class="row">
							<div style="padding: 5px 5px">B</div>

							<div class="row">
								<div class="seat occupied"></div>
								<div class="seat selected"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
							</div>
						</div>
						<div class="row">
							<div style="padding: 5px 5px">A</div>
							<div class="row">
								<div class="seat occupied"></div>
								<div class="seat selected"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
								<div class="seat"></div>
							</div>
						</div>

						<button>Book now</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
