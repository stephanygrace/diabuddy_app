<?php
require_once('db_conn.php'); 
session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['logout']))
{
    header("location:logout_process.php");
}

$user_query="SELECT * FROM user_info WHERE ID='$user_id'";
    
    if($user_result=mysqli_query($con,$user_query))
    {
        if (mysqli_num_rows($user_result) > 0)
        {
            while ($user_row=mysqli_fetch_assoc($user_result))
            {
                //$cal_plan = $row['Kcal'];
                $meal1_id = $user_row['meal1'];
                $meal2_id = $user_row['meal2'];
                $meal3_id = $user_row['meal3'];
            }
        }
    }




//Get Meal 1 Info
$meal1_query="SELECT * FROM updated_dataset WHERE ID='$meal1_id'";
    
    if($meal1_result=mysqli_query($con,$meal1_query))
    {
        if (mysqli_num_rows($meal1_result) > 0)
        {

        }
    }

//Get Meal 2 Info
$meal2_query="SELECT * FROM updated_dataset WHERE ID='$meal2_id'";
    
    if($meal2_result=mysqli_query($con,$meal2_query))
    {
        if (mysqli_num_rows($meal2_result) > 0)
        {

        }
    }

//Get Meal 3 Info
$meal3_query="SELECT * FROM updated_dataset WHERE ID='$meal3_id'";
    
    if($meal3_result=mysqli_query($con,$meal3_query))
    {
        if (mysqli_num_rows($meal3_result) > 0)
        {

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diabbudy Diet Plan Customization</title> 
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
            <a href="#" class="nav-link">
            <img class="baby" src="/img/recipe-book.png" style="width: 30px">
            <span class="link-text">Recipe</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="food-tracker.php" class="nav-link">
            <img class="baby" src="/img/diet.png" style="width: 30px;">
            <span class="link-text">Nutrition Tracker</span>
            </a>
        </li>

        <li class="nav-item active">
            <a href="main-activity.php" class="nav-link">
            <img class="baby" src="/img/meal.png" style="width: 30px;"> 
            <span class="link-text">Meal Plan</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="food-diary.php" class="nav-link">
            <img class="baby" src="/img/book.png" style="width: 30px;">
            <span class="link-text">Food Diary</span>
            </a>
        </li>

        <li class="nav-item" id="themeButton">
            <a href="user-profile.php" class="nav-link">
            <img class="baby" src="/img/user-nav.png" style="width: 30px;">
            <span class="link-text">Profile</span>
            </a>
        </li>
        </ul>
    </nav>

    <div class="container">
        <form action="main-activity.php">
        <div class="card">

            <div class="header">
                <p class="header-title">Customize your Diet Plan</p>
            </div>
        
            <div class="box-card">
            <?php while ($row=mysqli_fetch_assoc($meal1_result)) { ?>
                <div class="card-meal" style="background-color: #F9E79F;">
                    <p>Breakfast</p>
                </div>
                <a href="meal1-recommendations.php"><i class="fa fa-solid fa-pen-to-square"></i></a>

                <div class="image-meal text-center mb-2">
                    <img src="<?php echo $row['Directory'];?>">
                    <p><?php echo $row['Recipe'];?></p>
                </div>

                <div class="nutri-facts">
                    <div class="row">
                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row['Energy_kcal']);?></h3></div>
                            <p class="nutrition">Calories</p>
                            <p>(KCal)</p>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row['Carbohydrate_incl_fibre_g']);?></h3></div>
                            <p class="nutrition">Carb</p>
                            <p>(g)t</p>
                            </div>
                        </div>
                        
                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row['Protein_g']);?></h3></div>
                            <p class="nutrition">Protein</p>
                            <p>(g)</p>
                            </div>
                        </div>
                        
                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row['Sugar_g']);?></h3></div>
                            <p class="nutrition">Sugar</p>
                            <p>(g)</p>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row['Fat_g']);?></h3></div>
                            <p class="nutrition">Fat</p>
                            <p>(g)</p>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row['Fibre_g']);}?></h3></div>
                            <p class="nutrition">Fibre</p>
                            <p>(g)</p>
                            </div>
                        </div>
                    </div>
                    <p class="subheading"><i>Nutrition Facts</i></p>
                </div>
            </div>
            

            <div class="box-card">
            <?php while ($row2=mysqli_fetch_assoc($meal2_result)) { ?>
                <div class="card-meal" style="background-color: #AED6F1;">
                    <p>Lunch</p></a>
                </div>
                <a href="meal2-recommendations.php"><i class="fa fa-solid fa-pen-to-square"></i></a>

                <div class="image-meal text-center mb-2">
                    <img src="<?php echo $row2['Directory']; ?>">
                    <p><?php echo $row2['Recipe'];?></p>
                </div>

                <div class="nutri-facts">
                    <div class="row">
                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row2['Energy_kcal'],0); ?></h3></div>
                            <p class="nutrition">Calories</p>
                            <p>(KCal)</p>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row2['Carbohydrate_incl_fibre_g'],0);?></h3></div>
                            <p class="nutrition">Carb</p>
                            <p>(g)</p>
                            </div>
                        </div>
                        
                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row2['Protein_g'],0); ?></h3></div>
                            <p class="nutrition">Protein</p>
                            <p>(g)</p>
                            </div>
                        </div>
                        
                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row2['Sugar_g'],0); ?></h3></div>
                            <p class="nutrition">Sugar</p>
                            <p>(g)</p>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row2['Fat_g'],0); ?></h3></div>
                            <p class="nutrition">Fat</p>
                            <p>(g)</p>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <div class="circle"><h3><?php echo round($row2['Fibre_g'],0); }?></h3></div>
                            <p class="nutrition">Fibre</p>
                            <p>(g)</p>
                            </div>
                        </div>
                    </div>
                    <p class="subheading"><i>Nutrition Facts</i></p>
                </div>
            </div>
                                      
        <div class="box-card">
<?php while ($row3=mysqli_fetch_assoc($meal3_result)) { ?>      
            <div class="card-meal" style="background-color: #ABEBC6;">
                <p>Dinner</p>
            </div>
            <a href="meal3-recommendations.php"><i class="fa fa-solid fa-pen-to-square"></i></a>

            <div class="image-meal text-center mb-2">
                <img src="<?php echo $row3['Directory']; ?>">
                <p><?php echo $row3['Recipe'];?></p>
            </div>

            <div class="nutri-facts">
                <div class="row">
                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3><?php echo round($row3['Energy_kcal'],0);?></h3></div>
                        <p class="nutrition">Calories</p>
                        <p>(KCal)</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3><?php echo round($row3['Carbohydrate_incl_fibre_g'],0);?></h3></div>
                        <p class="nutrition">Carb</p>
                        <p>(g)</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3><?php echo round($row3['Protein_g'],0);?></h3></div>
                        <p class="nutrition">Protein</p>
                        <p>(g)</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3><?php echo round($row3['Sugar_g'],0);?></h3></div>
                        <p class="nutrition">Sugar</p>
                        <p>(g)</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3><?php echo round($row3['Fat_g'],0);?></h3></div>
                        <p class="nutrition">Fat</p>
                        <p>(g)</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3><?php echo round($row3['Fibre_g'],0);}?></h3></div>
                        <p class="nutrition">Fibre</p>
                        <p>(g)</p>
                        </div>
                    </div>
                </div>
                <p class="subheading"><i>Nutrition Facts</i></p>
            </div>
        </div>

        <button class="btn btn-primary btn-custom" type="submit" value="Login" name="login" style="margin-bottom: 80px;">Done</button>
    
        </div>
        </form>
    </div>
    <script src="js/javascript.js"></script>
</body>
</html>