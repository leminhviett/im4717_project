<!DOCTYPE html>

<html lang="en">
	<?php
		require 'shared/head.php';
	?>
	<link rel="stylesheet" href="../css/home.css" />
	<style>
    
     
    /* Styling the area of the slides */
     
    #slideshow {
        overflow: hidden;
        height: 510px;
        width: 900px;
        margin: 0 auto;
    }
     
    /* Style each of the sides
    with a fixed width and height */
     
    .slide {
        float: left;
        height: 510px;
        width: 900px;
    }
     
    /* Add animation to the slides */
     
    .slide-wrapper {
         
        /* Calculate the total width on the
      basis of number of slides */
        width: calc(900px * 4);
         
        /* Specify the animation with the
      duration and speed */
        animation: slide 10s ease infinite;
    }
     
    /* Set the background color
    of each of the slides */
     
    .slide:nth-child(1) {
        background-image: url("..//imgs/slide_show3.jpg");
		background-size: cover;
    }
     
    .slide:nth-child(2) {
        background-image: url("..//imgs/slide_show2.jpg");
		background-size: cover;
    }
     
    .slide:nth-child(3) {
        background-image: url("..//imgs/slide_show1.jpg");
		background-size: cover;
    }
     
    .slide:nth-child(4) {
        background-image: url("..//imgs/slide_show4.jpg");
		background-size: cover;
    }
     
    /* Define the animation
    for the slideshow */
     
    @keyframes slide {
         
        /* Calculate the margin-left for
      each of the slides */
        20% {
            margin-left: 0px;
        }
        40% {
            margin-left: calc(-900px * 1);
        }
        60% {
            margin-left: calc(-900px * 2);
        }
        80% {
            margin-left: calc(-900px * 3);
        }
    }
    </style>
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
				<img src="../imgs/banner_bg.png" alt="Snow" style="height: 100%; width: 100%" />
			</div>

			<div class="banner_content">
				 <div id="slideshow">
        <div class="slide-wrapper">
             
            <!-- Define each of the slides
         and write the content -->
            <div class="slide">
                <h1 class="slide-number">
                    
                </h1>
            </div>
            <div class="slide">
                <h1 class="slide-number">
                    
                </h1>
            </div>
            <div class="slide">
                <h1 class="slide-number">
                    
                </h1>
            </div>
            <div class="slide">
                <h1 class="slide-number">
                    
                </h1>
            </div>
        </div>
    </div><br><br>
				<?php
					$location = "location.href='$root_name/pages/movies.php';";
					echo "<button onclick=$location>Book now</button>";

				?>
			</div>
		</div>
	</body>
</html>
