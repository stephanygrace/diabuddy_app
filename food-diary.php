<?php
require_once('db_conn.php'); 
session_start();

$user_id = $_SESSION['user_id'];


//Get User Meal Info
$user_query="SELECT * FROM consumed_recipe WHERE user_id='$user_id'";
    

    if($user_result=mysqli_query($con,$user_query))
    {
        if (mysqli_num_rows($user_result) > 0)
        {
            while ($user_row=mysqli_fetch_assoc($user_result))
            {
                $recipe_id = $user_row['recipe_id'];              
                $meal_type = $user_row['meal_type'];

                if($meal_type == 1){
                    $type = 1;
                    //Get Meal 1 Info
                    $meal1_query="SELECT DISTINCT * FROM consumed_recipe WHERE recipe_id='$recipe_id' AND meal_type = '$type'";
                        
                        if($meal1_result=mysqli_query($con,$meal1_query))
                        {
                            if (mysqli_num_rows($meal1_result) > 0)
                            {
                                
                            }
                        }
                }elseif ($meal_type == 2) {
                    $type = 2;
                    //Get Meal 2 Info
                    $meal2_query="SELECT DISTINCT * FROM consumed_recipe WHERE recipe_id='$recipe_id' AND meal_type = '$type'";
                        
                        if($meal2_result=mysqli_query($con,$meal2_query))
                        {
                            if (mysqli_num_rows($meal2_result) > 0)
                            {
                                
                            }
                        }
                }elseif ($meal_type == 3){
                    $type = 3;
                    //Get Meal 3 Info
                    $meal3_query="SELECT DISTINCT * FROM consumed_recipe WHERE recipe_id='$recipe_id' AND meal_type = '$type'";

                        if($meal3_result=mysqli_query($con,$meal3_query))
                        {
                            if (mysqli_num_rows($meal3_result) > 0)
                            {
                                $m3_result = "true";
                            }
                        }

                }

            }
        }
    }

$meal_directory ="SELECT consumed_recipe.meal_type, consumed_recipe.recipe_name, image_directory.Directory 
                  FROM consumed_recipe INNER JOIN image_directory ON consumed_recipe.recipe_id = image_directory.ID";

          if($meal_result=mysqli_query($con,$meal_directory))
             {
                if (mysqli_num_rows($meal_result) > 0)                          
                    {
                        while ($user_row=mysqli_fetch_assoc($meal_result))
                        {           
                            $meal_type = $user_row['meal_type'];

                            if($meal_type == 1){
                                $type = 1;
                                //Get Meal 1 directory
                                $dir1_query ="SELECT consumed_recipe.date_today,consumed_recipe.recipe_name,updated_dataset.Directory
                                                FROM consumed_recipe 
                                                INNER JOIN updated_dataset ON consumed_recipe.recipe_id = updated_dataset.ID
                                                WHERE consumed_recipe.meal_type = '$type' AND user_id='$user_id'";
                                    if($dir1_result=mysqli_query($con,$dir1_query))
                                    {
                                        if (mysqli_num_rows($dir1_result) > 0)
                                        {
                                            
                                        }
                                    }
                            }elseif($meal_type == 2){
                                $type = 2;
                                //Get Meal 2 directory
                                $dir2_query ="SELECT consumed_recipe.date_today,consumed_recipe.recipe_name,updated_dataset.Directory
                                                FROM consumed_recipe 
                                                INNER JOIN updated_dataset ON consumed_recipe.recipe_id = updated_dataset.ID
                                                WHERE consumed_recipe.meal_type = '$type' AND user_id='$user_id'";
                                    if($dir2_result=mysqli_query($con,$dir2_query))
                                    {
                                        if (mysqli_num_rows($dir2_result) > 0)
                                        {
                                            
                                        }
                                    }
                            }elseif($meal_type == 3){
                                    $type = 3;
                                    //Get Meal 3 directory
                                    $dir3_query ="SELECT consumed_recipe.date_today,consumed_recipe.recipe_name,updated_dataset.Directory
                                                FROM consumed_recipe 
                                                INNER JOIN updated_dataset ON consumed_recipe.recipe_id = updated_dataset.ID
                                                WHERE consumed_recipe.meal_type = '$type' AND user_id='$user_id'";
                                        if($dir3_result=mysqli_query($con,$dir3_query))
                                        {
                                            if (mysqli_num_rows($dir3_result) > 0)
                                            {
                                                
                                            }
                                        }
                            }
                        }
                    }
                    
            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diabbudy Food Diary</title> 
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

        <li class="nav-item active">
            <a href="food-diary.php" class="nav-link">
            <img class="baby" src="img/book.png" style="width: 30px;">
            <span class="link-text">Food Diary</span>
            </a>
        </li>

        <li class="nav-item" id="themeButton">
            <a href="user-profile.php" class="nav-link">
            <img class="baby" src="img/user-nav.png" style="width: 30px;">
            <span class="link-text">Profile</span>
            </a>
        </li>
        </ul>
    </nav>

    <div class="container">

        <div class="card" style="margin-bottom: 50px;">
            
            <div class="header">
                <p class="header-title">Food Diary</p>
            </div>
<?php while ($row=mysqli_fetch_assoc($dir1_result)) { ?>
            <div class="card-meal__fdiary">
                <p> <?php echo $row['date_today'];?></p>
                <div class="row">

                    <div class="image" style="display: flex;">
                    <!--<p class="meal__category">Breakfast</p>-->
                        <div class="card">
                            <img src="<?php echo $row['Directory'];}?>" >
                        </div>
                    </div>
<?php while ($row=mysqli_fetch_assoc($meal1_result)) { ?>
                    <div class="text">
                        <div class="card">
                            <h3 class="bf">Breakfast</h3>
                            <p>Recipe name: <?php echo $row['recipe_name'];?></p><br>
                            <p>Calories: <?php echo $row['recipe_cal'];}?></p>
                        </div>
                    </div>
                </div>
<?php while ($row=mysqli_fetch_assoc($dir2_result))  {?>
                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="<?php echo $row['Directory'];}?>" >
                        </div>
                    </div>
<?php while ($row2=mysqli_fetch_assoc($meal2_result)) { ?>
                    <div class="text">
                        <div class="card">
                            <h3 class="lunch">Lunch</h3>
                            <p>Recipe name: <?php echo $row2['recipe_name'];?></p><br>
                            <p>Calories: <?php echo $row2['recipe_cal'];}?></p>
                        </div>
                    </div>
                </div>
<?php while ($row=mysqli_fetch_assoc($dir3_result))  {?>
                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="<?php echo $row['Directory'];}?>" >
                        </div>
                    </div>
<?php while ($row3=mysqli_fetch_assoc($meal3_result)) { ?> 
                    <div class="text">
                        <div class="card">
                            <h3 class="dinner">Dinner</h3>
                            <p>Recipe name: <?php echo $row3['recipe_name'];?></p><br>
                            <p>Calories: <?php echo $row3['recipe_cal'];}?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-meal__fdiary">
                <p>March 26, 2022</p>
                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="assets/image/DIABUDDY_LOGO.png" alt="">
                        </div>
                    </div>

                    <div class="text">
                        <div class="card">
                            <h3>Breakfast</h3>
                            <p>Recipe name:</p><br>
                            <p>Calories:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="assets/image/DIABUDDY_LOGO.png" alt="">
                        </div>
                    </div>

                    <div class="text">
                        <div class="card">
                        <h3>Lunch</h3>
                        <p>Recipe name:</p><br>
                        <p>Calories:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="assets/image/DIABUDDY_LOGO.png" alt="">
                        </div>
                    </div>

                    <div class="text">
                        <div class="card">
                        <h3>Dinner</h3>
                        <p>Recipe name:</p><br>
                        <p>Calories:</p>
                        </div>
                    </div>
                </div>
            </div>
                                            
            <div class="card-meal__fdiary">
                <p>March 27, 2022</p>
                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="assets/image/DIABUDDY_LOGO.png" alt="">
                        </div>
                    </div>

                    <div class="text">
                        <div class="card">
                        <h3>Breakfast</h3>
                        <p>Recipe name:</p><br>
                        <p>Calories:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="assets/image/DIABUDDY_LOGO.png" alt="">
                        </div>
                    </div>

                    <div class="text">
                        <div class="card">
                        <h3>Lucnh</h3>
                        <p>Recipe name:</p><br>
                        <p>Calories:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="image">
                        <div class="card">
                            <img src="assets/image/DIABUDDY_LOGO.png" alt="">
                        </div>
                    </div>

                    <div class="text">
                        <div class="card">
                        <h3>Dinner</h3>
                        <p>Recipe name:</p><br>
                        <p>Calories:</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/javascript.js"></script>
</body>
</html>