<?php
require_once('db_conn.php'); 
session_start();
$keyword = $_POST['search'];
$recipe_query="SELECT * FROM updated_dataset WHERE Recipe LIKE '".$keyword."%' ";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recipe</title> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- General Style -->
    <link rel="stylesheet" href="assets/css/recipe.css">
    <link rel="stylesheet" href="assets/css/nav-style.css">
    <!--Live Search Script
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-input one input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
-->
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

        <li class="nav-item active">
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

        <li class="nav-item" id="themeButton">
            <a href="user-profile.php" class="nav-link">
            <img class="baby" src="img/user-nav.png" style="width: 30px;">
            <span class="link-text">Profile</span>
            </a>
        </li>
        </ul>
    </nav>
    <!-- end navbar-->

    <div class="container">
        <div class="cards">
            <div class="header">
                <p class="header-title">Recipe</p>
            </div>

            <div class="search-input one">
            <form action="recipe_search.php" method="POST">
                <input type="text" autocomplete="off" name="search" placeholder="Search here">
                <button type="submit" class="btn btn-search fa fa-search"></button>
            </form>
            </div>
            <div class="result">
<?php
if ($recipe_result=mysqli_query($con,$recipe_query))
{
    if (mysqli_num_rows($recipe_result) > 0)
        {
            while ($row = mysqli_fetch_assoc($recipe_result))
                {
                echo'


                            <div class="card">
                                <div class="card__image-holder">
                                    <img class="card__image" src="'.$row['Directory'].'" alt="field" />
                                </div>
                                <div class="card-title">
                                    <a href="#"></a>
                                    <h2>
                                        '.$row['Recipe'].'
                                    </h2>
                                </div>
                                <div class="card-flap flap1">
                                    <div class="card-description">
                                        <table> 
                                            <caption></caption>
                                            <thead class="title">
                                                <tr>
                                                    <th colspan="2">Nutrion Facts</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th>Nutrients</th>
                                                    <th>Daily Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Calories</td>
                                                    <td>'.$row['Energy_kcal'].' KCal</td>
                                                </tr>

                                                <tr>
                                                    <td>Carb</td>
                                                    <td>'.$row['Carbohydrate_incl_fibre_g'].' g</td>
                                                </tr>
                                                    
                                                <tr>
                                                    <td>Protein</td>
                                                    <td>'.$row['Protein_g'].' g</td>
                                                </tr> 

                                                <tr>
                                                    <td>Sugar</td>
                                                    <td>'.$row['Sugar_g'].' g</td>
                                                </tr>

                                                <tr>
                                                    <td>Fat</td>
                                                    <td>'.$row['Fat_g'].' g</td>
                                                </tr>

                                                <tr>
                                                    <td>Fibre</td>
                                                    <td>'.$row['Fibre_g'].' g</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                ';
                }

        }
        else
        {
            echo 'No Data Found.';
        }
}



?>
</div>



        </div>
    </div>

<script>
$(document).ready(function () {
    var zindex = 10;

    $("div.card").click(function (e) {
        e.preventDefault();

        var isShowing = false;

        if ($(this).hasClass("show")) {
        isShowing = true;
        }

        if ($("div.cards").hasClass("showing")) {
        // a card is already in view
        $("div.card.show").removeClass("show");

        if (isShowing) {
            // this card was showing - reset the grid
            $("div.cards").removeClass("showing");
        } else {
            // this card isn't showing - get in with it
            $(this).css({ zIndex: zindex }).addClass("show");
        }

        zindex++;
        } else {
        // no cards in view
        $("div.cards").addClass("showing");
        $(this).css({ zIndex: zindex }).addClass("show");

        zindex++;
        }
    });
});
</script>
</body>
</html>