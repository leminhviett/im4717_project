


<nav class="navbar">
    <div class="logo"><img src="../imgs/logo.svg" width="auto" height="100%"><p></p></div>
    <div class="links_container">
        <a href="home.php">Home</a>
        <a href="movies.php"> Showing now</a>
        <a href="about.php"> About us</a>
        <?php
            if (isset($_SESSION['role']) && $_SESSION['role']=='ADMIN') {
                echo "<a href='upload_movies.php'>Upload movies</a>";
            }
        ?>
    </div>
    <div>
        <?php
            if (isset($_SESSION['username'])) {
                echo "<button onclick=location.href='$root_name/pages/me.php'>View profile</button>";
            } else {
                echo "<button style='background-color: transparent; color: white' onclick=location.href='$root_name/pages/register_front.php'>Sign up</button>";
                echo "<button onclick=location.href='$root_name/pages/login_front.php' >Sign in</button>";
            }
        ?>

    </div>
</nav>

