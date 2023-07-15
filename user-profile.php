<?php
require_once('db_conn.php'); 
session_start();

$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diabuddy User's Profile</title> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Fontawesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/css/nav-style.css">
</head>
<body>

    <!-- Navbar-->
    <nav class="navbar">
        <ul class="navbar-nav" id="myDIV">
        <li class="logo">
            <a href="#" class="nav-link">
            <span class="link-text logo-text">Diabuddy</span>
            <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fad"
                data-icon="angle-double-right"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"
                class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
            >
                <g class="fa-group">
                <path
                    fill="currentColor"
                    d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                    class="fa-secondary"
                ></path>
                <path
                    fill="currentColor"
                    d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                    class="fa-primary"
                ></path>
                </g>
            </svg>
            </a>
        </li>

        <li class="nav-item">
            <a href="recipe.php" class="nav-link">
            <img class="baby" src="img/recipe-book.png" style="width: 30px">
            <span class="link-text">Recipe</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="food-tracker.php" class="nav-link">
            <img class="baby" src="img/diet.png" style="width: 30px;">
            <span class="link-text">Nutrition Tracker</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="main-activity.php" class="nav-link">
            <img class="baby" src="img/meal.png" style="width: 30px;"> 
            <span class="link-text">Meal Plan</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="food-diary.php" class="nav-link">
            <img class="baby" src="img/book.png" style="width: 30px;">
            <span class="link-text">Food Diary</span>
            </a>
        </li>

        <li class="nav-item active" id="themeButton">
            <a href="user-profile.php" class="nav-link">
            <img class="baby" src="img/user-nav.png" style="width: 30px;">
            <span class="link-text">Profile</span>
            </a>
        </li>
        </ul>
    </nav>

    <div class="container">
        <div class="card">
            <div class="user-img">
                <img src="img/user.png" alt="">
                <p class="user-name">Hi, Buddy!</p>
                <p><?php echo $_SESSION['user_name']; ?></b></p>
            </div>

            <div class="user-plan">
                <h3>Calorie Plan</h3>
                <p>Daily Calorie Goal: <?php echo $_SESSION['user_plan']; ?></p>
            </div>

            <div class="user-info">
                <p>Age: <?php echo $_SESSION['user_age']; ?></p>
                <p>Gender:<?php echo $_SESSION['user_gender']; ?></p>
                <p>Physical Activity:<?php echo $_SESSION['user_activity']; ?></p>
            </div>
            <form action="logout_process.php" method = "POST"><button class="btn btn-primary btn-custom" type="submit" value="Logout" name="logout" style="margin: 50px 0px;">Log-Out</button></form>
        </div>
    </div>

    

    <script src="js/javascript.js"></script>
</body>
</html>