<?php
require_once('db_conn.php');
session_start();
 
 
    
    $gender = $_POST['User_Gender'];
    $age = $_POST['Age'];
    $activity = $_POST['Activities'];
    $calplan = 0;
    $user_gender = $gender;

    //Activity Level
    if ($activity == "No moderate of vigorous activities. Spending most of the day sitting (e.g. bank teller, desk job)") 
        {
            $user_activity = "Sedentary";
        }
    elseif ($activity == "Daily exercise that is equal to walking for 1 hour and 45 minutes at 4mph. Spending a good part of the day doing some physical activity (e.g. waitress, mailman)") 
        {
            $user_activity = "Moderately Active";
        }
    else
        {
            $user_activity = "Active";
        }

    


    //Age Group
    if ($age >= 19 && $age <= 30)
        {   
            $user_age = '19-30';
        }
    else if ($age >= 31 && $age <= 50)
        {   
            $user_age = '31-50';
        }
    else if ($age >= 50)
        {   
            $user_age = '50+';
        }
    else
        {       

        }



    // FemaleCalorie Goal
    if ($gender = "Female" && $age <= 8 && $avtivity = "Sedentary") {
        $calplan = 1200;
    }
    else if ($gender = "Female" && ($age >=9 && $age <=13) && $avtivity = "Sedentary") {
        $calplan = 1600;
    }
    else if ($gender = "Female" && ($age >=14 && $age <=18) && $avtivity = "Sedentary") {
        $calplan = 1800;
    }
    else if ($gender = "Female" && ($age >=19 && $age <=30) && $avtivity = "Sedentary") {
        $calplan = 2000;
    }
    else if ($gender = "Female" && ($age >=31 && $age <=50) && $avtivity = "Sedentary") {
        $calplan = 1800;
    }
    else if ($gender = "Female" && $age >=51 && $avtivity = "Sedentary") {
        $calplan = 1600;
    }

    else if ($gender = "Female" && $age <= 8 && $avtivity = "Moderately Active") {
        $calplan = 1600;
    }
    else if ($gender = "Female" && ($age >=9 && $age <=13) && $avtivity = "Moderately Active") {
        $calplan = 2000;
    }
    else if ($gender = "Female" && ($age >=14 && $age <=18) && $avtivity = "Moderately Active") {
        $calplan = 2000;
    }
    else if ($gender = "Female" && ($age >=19 && $age <=30) && $avtivity = "Moderately Active") {
        $calplan = 2200;
    }
    else if ($gender = "Female" && ($age >=31 && $age <=50) && $avtivity = "Moderately Active") {
        $calplan = 2000;
    }
    else if ($gender = "Female" && $age >=51 && $avtivity = "Moderately Active") {
        $calplan = 1800;
    }

    else if ($gender = "Female" && $age <= 8 && $avtivity = "Active") {
        $calplan = 1800;
    }
    else if ($gender = "Female" && ($age >=9 && $age <=13) && $avtivity = "Active") {
        $calplan = 2200;
    }
    else if ($gender = "Female" && ($age >=14 && $age <=18) && $avtivity = "Active") {
        $calplan = 2400;
    }
    else if ($gender = "Female" && ($age >=19 && $age <=30) && $avtivity = "Active") {
        $calplan = 2400;
    }
    else if ($gender = "Female" && ($age >=31 && $age <=50) && $avtivity = "Active") {
        $calplan = 2200;
    }
    else if ($gender = "Female" && $age >=51 && $avtivity = "Active") {
        $calplan = 2200;
    }

    // Male Cal Plan
    else if ($gender = "Male" && $age <= 8 && $avtivity = "Sedentary") {
        $calplan = 1400;
    }
    else if ($gender = "Male" && ($age >=9 && $age <=13) && $avtivity = "Sedentary") {
        $calplan = 1800;
    }
    else if ($gender = "Male" && ($age >=14 && $age <=18) && $avtivity = "Sedentary") {
        $calplan = 2200;
    }
    else if ($gender = "Male" && ($age >=19 && $age <=30) && $avtivity = "Sedentary") {
        $calplan = 2400;
    }
    else if ($gender = "Male" && ($age >=31 && $age <=50) && $avtivity = "Sedentary") {
        $calplan = 2200;
    }
    else if ($gender = "Male" && $age >=51 && $avtivity = "Sedentary") {
        $calplan = 2000;
    }

    else if ($gender = "Male" && $age <= 8 && $avtivity = "Moderately Active") {
        $calplan = 1600;
    }
    else if ($gender = "Male" && ($age >=9 && $age <=13) && $avtivity = "Moderately Active") {
        $calplan = 2200;
    }
    else if ($gender = "Male" && ($age >=14 && $age <=18) && $avtivity = "Moderately Active") {
        $calplan = 2800;
    }
    else if ($gender = "Male" && ($age >=19 && $age <=30) && $avtivity = "Moderately Active") {
        $calplan = 2800;
    }
    else if ($gender = "Male" && ($age >=31 && $age <=50) && $avtivity = "Moderately Active") {
        $calplan = 2600;
    }
    else if ($gender = "Male" && $age >=51 && $avtivity = "Moderately Active") {
        $calplan = 2400;
    }

    else if ($gender = "Male" && $age <= 8 && $avtivity = "Active") {
        $calplan = 2000;
    }
    else if ($gender = "Male" && ($age >=9 && $age <=13) && $avtivity = "Active") {
        $calplan = 2600;
    }
    else if ($gender = "Male" && ($age >=14 && $age <=18) && $avtivity = "Active") {
        $calplan = 3200;
    }
    else if ($gender = "Male" && ($age >=19 && $age <=30) && $avtivity = "Active") {
        $calplan = 3000;
    }
    else if ($gender = "Male" && ($age >=31 && $age <=50) && $avtivity = "Active") {
        $calplan = 3000;
    }
    else if ($gender = "Male" && $age >=51 && $avtivity = "Active") {
        $calplan = 2800;
    }

    //This query selects the matching meal plan based on user's information
    $query="SELECT * FROM fixed_meal_plan WHERE Gender='$user_gender' AND Age='$user_age' AND Physical_Activities ='$user_activity'";
        if($result=mysqli_query($con,$query))
    {
        if (mysqli_num_rows($result) > 0)
        {
            while ($row=mysqli_fetch_assoc($result))
            {
                $meal_1 = $row['Meal_1'];
                $meal_2 = $row['Meal_2'];
                $meal_3 = $row['Meal_3'];
            }
        }
    }   

    //This query inserts the new user's details to the db
    $register = mysqli_query($con,"INSERT INTO user_info (Name, Email, Password, Gender,Age_Range, Physical_Activity, cal_plan, meal1, meal2, meal3) 
        VALUES 
        ('".
            $_SESSION['name']."', '".
            $_SESSION['email']."', '".
            $_SESSION['password']."', '".
            $user_gender."', '".
            $user_age."', '".
            $user_activity."', '".
            $calplan."','".
            $meal_1."','".
            $meal_2."','".
            $meal_3."')"
        );
    
    if($register)
    {
    session_destroy();
        mysqli_close($con); // Close connection
        header("location:index.php?Invalid= Registration Success"); // redirects to index.php
        exit;
    }
    else
    {
        echo mysqli_error($con);
    }       

?>