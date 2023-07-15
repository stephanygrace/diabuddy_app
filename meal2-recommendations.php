<?php
require_once('db_conn.php'); 
session_start();

$user_id = $_SESSION['user_id'];

$user_query="SELECT * FROM user_info WHERE ID='$user_id'";
    
    if($user_result=mysqli_query($con,$user_query))
    {
        if (mysqli_num_rows($user_result) > 0)
        {
            while ($user_row=mysqli_fetch_assoc($user_result))
            {
                //$cal_plan = $row['Kcal'];
                $meal2_id = $user_row['meal2'];
                //echo $meal1_id;
            }
        }
    }

$meal2_query="SELECT * FROM updated_dataset WHERE ID='$meal2_id'";
    
    if($meal2_result=mysqli_query($con,$meal2_query))
    {
        if (mysqli_num_rows($meal2_result) > 0)
        {
            while($meal2_row=mysqli_fetch_assoc($meal2_result))
            {
                $cluster = $meal2_row['Cluster'];
                $category = $meal2_row['Category'];
                $energy_kcal = $meal2_row['Energy_kcal'];
                //echo $cluster." ".$category." ".$energy_kcal;
            }
        }
    }

$minValue = $energy_kcal - 200;
$maxValue = $energy_kcal + 200;

//echo $minValue." ".$maxValue;

$recommend_query ="SELECT * FROM updated_dataset WHERE Cluster = '$cluster' AND Category = '$category' AND Energy_kcal > '$minValue' AND Energy_kcal < '$maxValue' AND Energy_kcal <> '$energy_kcal' ";

if($recommend_result=mysqli_query($con,$recommend_query))
{

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
     
</head>
<body>
    <div class="container">
        <form action="customization.php">
        <div class="card">

            <div class="header">
                <p class="header-title">Lunch Meal Replacement</p>
            </div>
<?php
                            

    while ($row = mysqli_fetch_assoc($recommend_result)) 
    {

        echo '
            <div class="box-card">
            <div class="card-meal" style="background-color: #AED6F1;">
                <p>Lunch</p>
            </div>
            <a href="replace-meal2.php?recipe='.$row['ID'].'"><i class="fa fa-solid fa-circle-check"></i></a>

            <div class="image-meal text-center mb-2">
                <img src="'.$row['Directory'].'">
                <p>'.$row['Recipe'].'</p>
            </div>

            <div class="nutri-facts">
                <div class="row">
                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3>'.round($row['Energy_kcal']).'</h3></div>
                        <p class="nutrition">Calories</p>
                        <p>(KCal)</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3>'.round($row['Carbohydrate_incl_fibre_g']).'</h3></div>
                        <p class="nutrition">Carb</p>
                        <p>(g)t</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3>'.round($row['Protein_g']).'</h3></div>
                        <p class="nutrition">Protein</p>
                        <p>(g)</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3>'.round($row['Sugar_g']).'</h3></div>
                        <p class="nutrition">Sugar</p>
                        <p>(g)</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3>'.round($row['Fat_g']).'</h3></div>
                        <p class="nutrition">Fat</p>
                        <p>(g)</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <div class="circle"><h3>'.round($row['Fibre_g']).'</h3></div>
                        <p class="nutrition">Fibre</p>
                        <p>(g)</p>
                        </div>
                    </div>
                </div>
                <p class="subheading"><i>Nutrition Facts</i></p>
            </div>
            </div>';
};
?>

            <button class="btn btn-primary btn-custom" type="submit" value="Login" name="login">Cancel</button>
            
<!---->
        </div>
        </form>
    </div>
    <script src="js/javascript.js"></script>
</body>
</html>