<?php
    require_once 'db_conn.php';
?>

<link rel="stylesheet" href="../css/nav_bar.css" />

<nav class="navbar">
    <div class="logo"><p>Logo</p></div>
    <div class="links_container">
        <a href="#">Home</a>
        <a href="about.html"> About us</a>
        <a href="about.html"> About us</a>
        <a href="about.html"> About us</a>
        <a href="about.html"> About us</a>
    </div>
    <div>
        <?php
            if (isset($_SESSION['user_id'])) {
                echo '<button>View profile</button>';
            } else {
                echo '<button style="background-color: transparent; color: white">Sign up</button>';
                echo '<button>Sign in</button>';
            }
        ?>

    </div>
</nav>

