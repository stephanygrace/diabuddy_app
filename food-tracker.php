<?php
require_once('db_conn.php'); 
session_start();

$user_id = $_SESSION['user_id'];
$total_carbs = 0;
$total_protein =  0;
$total_sugar = 0;
$total_fat = 0;
$total_cal = 0;
$total_fibre = 0;
$carbs1 = 0;
$protein1 = 0;
$sugar1 = 0;
$fat1 = 0;
$cal2 = 0;
$fibre2 = 0;
$carbs2 = 0;
$protein2 = 0;
$sugar2 = 0;
$fat2 = 0;
$cal3 = 0;
$fibre3 = 0;
$carbs3 = 0;
$protein3 = 0;
$sugar3 = 0;
$fat3 = 0;
$cal3 = 0;
$fibre3 = 0;

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
                    $meal1_query="SELECT * FROM consumed_recipe WHERE recipe_id='$recipe_id' AND meal_type = '$type'";
                        
                        if($meal1_result=mysqli_query($con,$meal1_query))
                        {
                            if (mysqli_num_rows($meal1_result) > 0)
                            {
                                $carbs1 = $user_row['recipe_carb'];
                                $protein1 = $user_row['recipe_protein'];
                                $sugar1 = $user_row['recipe_sugar'];
                                $fat1 = $user_row['recipe_fat'];
                                $cal1 = $user_row['recipe_cal'];
                                $fibre1 = $user_row['recipe_fibre'];


                            }
                        }
                }elseif ($meal_type == 2) {
                    $type = 2;
                    //Get Meal 2 Info
                    $meal2_query="SELECT * FROM consumed_recipe WHERE recipe_id='$recipe_id' AND meal_type = '$type'";
                        
                        if($meal2_result=mysqli_query($con,$meal2_query))
                        {
                            if (mysqli_num_rows($meal2_result) > 0)
                            {
                                $carbs2 = $user_row['recipe_carb'];
                                $protein2 = $user_row['recipe_protein'];
                                $sugar2 = $user_row['recipe_sugar'];
                                $fat2 = $user_row['recipe_fat'];
                                $cal2 = $user_row['recipe_cal'];
                                $fibre2 = $user_row['recipe_fibre'];
                            }else
                            {
                                $carbs2 = 0;
                                $protein2 = 0;
                                $sugar2 = 0;
                                $fat2 = 0;
                                $cal2 = 0;
                                $fibre2 = 0;
                            }
                        }
                }else{
                    $type = 3;
                    //Get Meal 3 Info
                    $meal3_query="SELECT * FROM consumed_recipe WHERE recipe_id='$recipe_id' AND meal_type = '$type'";

                        if($meal3_result=mysqli_query($con,$meal3_query))
                        {
                            if (mysqli_num_rows($meal3_result) > 0)
                            {
                                $carbs3 = $user_row['recipe_carb'];
                                $protein3 = $user_row['recipe_protein'];
                                $sugar3 = $user_row['recipe_sugar'];
                                $fat3 = $user_row['recipe_fat'];
                                $cal3 = $user_row['recipe_cal'];
                                $fibre3 = $user_row['recipe_fibre'];
                            }else
                            {
                                $carbs3 = 0;
                                $protein3 = 0;
                                $sugar3 = 0;
                                $fat3 = 0;
                                $cal3 = 0;
                                $fibre3 = 0;
                            }
                        }
                }

            }

            $total_carbs = $carbs1 + $carbs2 + $carbs3;
            $total_protein =  $protein1 + $protein2 +$protein3; 
            $total_sugar = $sugar1 +$sugar2 +$sugar3;
            $total_fat = $fat1 + $fat2 + $fat3;
            $total_cal = $cal1 + $cal2 + $cal3;
            $total_fibre = $fibre1 +$fibre2 + $fibre3;
        }

    }else
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diabuddy Food Nutrition Tracker</title> 
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

        <li class="nav-item active">
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

        <li class="nav-item" id="themeButton">
            <a href="user-profile.php" class="nav-link">
            <img class="baby" src="img/user-nav.png" style="width: 30px;">
            <span class="link-text">Profile</span>
            </a>
        </li>
        </ul>
    </nav>

    <div class="container">
        <div class="header">
            <p class="header-title">Today <?php echo $today = date("F j, Y");?></p>
            <p class="user-name">Track your nutrion intake</p>
            
        </div>
<?php   while ($row=mysqli_fetch_assoc($meal1_result)) { ?>
        <div class="card">

            <div class="circle-goal">
                <img src="img/new-moon.png" alt="">
                <h3><?php echo $total_cal;?></h3>
                <p>Total Calories</p>
                <p class="mini-txt">Goal: <?php echo $_SESSION['user_plan']; }?></p>
            </div>

<?php  $cal4 = $_SESSION['user_plan']; $cal_rem = $cal4 - $total_cal;
$cal_exc = $total_cal - $cal4;
if($cal_rem > 0 ){
    $plan = " You still have"  ;
    $plan2 = $cal_rem;
    $plan3 = "calorie remaining to reach your goal";
}elseif ($cal_rem < 0) {
    $plan = " You've exceeded ";
    $plan2 = $cal_exc;
    $plan3 = "calorie to your daily goal";
}
?>
            <p class="alert"><?php echo $plan ?> <b> <?php echo $plan2 ?></b> <?php echo $plan3 ?></p>


            <div class="nutrition-card" >
                <div class="row">

                    <div class="text" style="width: 50%;">
                        <div class="card" style="border-left: 3px solid #FFAC00; height: 55px; padding-left: 5px">
                            <h2><?php echo $total_carbs;?>g</h2>
                            <p style="display:block">Carbs</p><br>
                        </div>
                    </div>

                    <div class="text" style="width: 50%;">
                        <div class="card" style="border-left: 3px solid #FFAC00; height: 55px; padding-left: 5px">
                        <h2><?php echo $total_fat;?>g</h2>
                        <p style="display:block">Fat</p><br>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px; justify-content: left;">
                    <div class="text" style="width: 50%">
                        <div class="card" style="border-left: 3px solid #FFAC00; height: 55px; padding-left: 5px">
                            <h2><?php echo $total_protein;?>g</h2>
                            <p style="display:block">Protein</p><br>
                        </div>
                    </div>

                    <div class="text">
                        <div class="card" style="border-left: 3px solid #FFAC00; height: 55px; padding-left: 5px">
                        <h2><?php echo $total_cal;?>KCal</h2>
                        <p style="display:block">Calories</p><br>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px; justify-content: left;">
                    <div class="text" style="width: 50%">
                        <div class="card" style="border-left: 3px solid #FFAC00; height: 55px; padding-left: 5px">
                            <h2><?php echo $total_sugar;?>g</h2>
                            <p style="display:block">Sugar</p><br>
                        </div>
                    </div>

                    <div class="text">
                        <div class="card" style="border-left: 3px solid #FFAC00; height: 55px; padding-left: 5px">
                        <h2><?php echo $total_fibre;?>g</h2>
                        <p style="display:block">Fibre</p><br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/javascript.js"></script>
</body>
</html>
