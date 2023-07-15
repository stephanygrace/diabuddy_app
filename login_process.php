<?php 
require_once('db_conn.php');
session_start();
    if(isset($_POST['login']))//Login Button Clicked
    {
       if(empty($_POST['email']) || empty($_POST['password']))//Checks if Forms are Empty
       {
            //No need for this function since it's already Validated in the index form
       }

       else
       {
        //Actual Login Process Starts here...
        $query = "SELECT * FROM user_info WHERE Email='".$_POST['email']."' AND Password='".$_POST['password']."'";
        $result = mysqli_query($con,$query);

            if($row=mysqli_fetch_assoc($result))//Checks if the input matches with an account
                {
                    //Stores the information of ther user to Session Variables
                    $_SESSION['user_id']=$row['ID'];
                    $_SESSION['user_name']=$row['Name'];
                    $_SESSION['user_email']=$row['Email'];
                    $_SESSION['user_gender']=$row['Gender'];
                    $_SESSION['user_age']=$row['Age_Range'];
                    $_SESSION['user_activity']=$row['Physical_Activity'];
                    $_SESSION['user_registered']=$row['Registered'];
                    $_SESSION['user_plan']=$row['cal_plan'];
                    $_SESSION['meal_cal']=$row['total_kcal'];
                    header("location:main-activity.php");//User Directs to the Main Activity After Sucessful Login
                }
            else
                {
                    header("location:index.php?Invalid= Invalid Email or Password");//Redirects to login if no matching account
                }
       }
    }
    else
    {
        echo 'Not Working Now Guys';//Testing purposes
    }

?>