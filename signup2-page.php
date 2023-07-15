<?php

session_start();
if (isset($_SESSION['user_name'])) {
    header("location:main-activity.php");
}

//This part stores the input values into session variables for multipage form process
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diabuddy Signup</title> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Fontawesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <link rel="stylesheet" href="assets/css/style.css">
     <script src="javascript.js"></script>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="logo">
                <img src="img/DIABUDDY_LOGO.png" alt="">
            </div>
            <div class="body">
                <div class="title">
                    <h3>Personal Information</h3>
                </div>
                <form action="registration_process.php" method = "POST" class="login">
                    
                <div class="form-group-gender" > 
                    <p class="label">Gender</p>
                    <span>
                        <input type="radio" name="User_Gender" value="Male" class="gender" style="width: 20px"><label for="gender">Male</label></input>
                        <input type="radio" name="User_Gender" value="Female" class="gender" style="width: 20px"><label for="gender">Female</label></input>
                    </span>
                </div>
                        
                    

                    <div class="form-group" >
                        <input id="age" type="text" class="form-control" name="Age" placeholder="Age" required autofocus>
                    </div>

                    <div class="form-group">
                            <select name="Activities" class="form-control slct-pal" id="mySelect" onchange="myFunction()" placeholder="" required>
                                <option value="" disabled selected style="color: gray;">Physical Activity Level</option>
                                <option value="No moderate of vigorous activities. Spending most of the day sitting (e.g. bank teller, desk job)" title="">Sedentary</option>
                                <option value="Daily exercise that is equal to walking for 1 hour and 45 minutes at 4mph. Spending a good part of the day doing some physical activity (e.g. waitress, mailman)" title="">Moderately Active</option>
                                <option value="Daily exercise that is equal to walking for 4 hours and 15 minutes at 4mph." title="">Active</option>
                            </select>
                    </div>
                    <p class="demo" id="demo"></p>  

                    <div class="mt-5">
                        <button class="btn btn-primary btn-block" type="submit" value="Login" name="signup">Sign up</button>
                    </div>

                    <div class="mt-4 text-center">
                        Already have an account? <a href="index.php" style="color: #6EC5B8">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
        var x = document.getElementById("mySelect").value;
        document.getElementById("demo").innerHTML = x;
        }
    </script>
</body>
</html>