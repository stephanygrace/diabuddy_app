<?php
require_once('db_conn.php');
session_start();
 
$user_id = $_SESSION['user_id'];//Getting the user ID thru Session variable

//Finds the user to get the user's meal info
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

    //Gets the checked meal on Main-Activity using $_GET method
    if ($_GET['meal'] == 'meal1') {
        $recipe_id = $meal1_id;
        $meal_type = 1;
        $date_today = date("F j, Y");
    }
    else if ($_GET['meal'] == 'meal2') {
        $recipe_id = $meal2_id;
        $meal_type = 2;
        $date_today = date("F j, Y");
    }
    else
    {
        $recipe_id = $meal3_id;
        $meal_type = 3;
        $date_today = date("F j, Y");
    }

//Gets the Recipe info
$recipe_query="SELECT * FROM updated_dataset WHERE ID='$recipe_id'";
    
    if($recipe_result=mysqli_query($con,$recipe_query))
    {
        if (mysqli_num_rows($recipe_result) > 0)
        {

        }
    }
    //storing Recipe info into variables
    while ($row=mysqli_fetch_assoc($recipe_result))
    {
            $recipe_name = ($row['Recipe']);
            $recipe_cal = round($row['Energy_kcal'],0);
            $recipe_carb = round($row['Carbohydrate_incl_fibre_g'],0);
            $recipe_sugar = round($row['Sugar_g'],0);
            $recipe_fat = round($row['Fat_g'],0);
            $recipe_fibre = round($row['Fibre_g'],0);
            $recipe_protein = round($row['Protein_g'],0);
    }

//inserting the consumed recipe to the consumed_recipe table
$insert_query = mysqli_query($con,"INSERT INTO consumed_recipe (user_id, recipe_id, recipe_cal, recipe_carb,recipe_sugar, recipe_fat, recipe_fibre, recipe_protein,recipe_name,meal_type,date_today) 
        VALUES 
        ('".
            $user_id."', '".
            $recipe_id."', '".
            $recipe_cal."', '".
            $recipe_carb."', '".
            $recipe_sugar."', '".
            $recipe_fat."', '".
            $recipe_fibre."','".
            $recipe_protein."','".
            $recipe_name."','".
            $meal_type."','".
            $date_today."')"
        );

    if($insert_query)
    {
        mysqli_close($con); // Close connection
        header("location:main-activity.php"); // 
        exit;
    }
    else
    {
        echo mysqli_error($con);
    }       


?>