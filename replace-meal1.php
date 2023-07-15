<?php
require_once('db_conn.php'); 
session_start();

$user_id = $_SESSION['user_id'];
$replace_id = $_GET['recipe'];

$update_user = mysqli_query($con,"UPDATE user_info SET meal1='$replace_id' WHERE ID='$user_id'");
if($update_user)
    {
        mysqli_close($con); // Close connection
        header("location:customization.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }       
?>