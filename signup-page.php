
<?php
session_start();
if (isset($_SESSION['user_name'])) {
    header("location:main-activity.php");
}

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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <img src="img/DIABUDDY_LOGO.png" alt="">
            </div>
            <div class="body">
                <div class="title">
                    <h3>Create an account</h3>
                </div>
                <form method = 'POST' action="signup2-page.php" class="login">

                    <div class="form-group" >
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name" required autofocus autocomplete="off">
                    </div>

                    <div class="form-group" >
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required autofocus autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="" data-eye autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="" data-eye autocomplete="off">
                        <span id='message'></span>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-primary btn-block" type="submit" value="Login" name="login">Continue</button>
                    </div>

                    <div class="mt-4 text-center">
                        Already have an account? <a href="index.php" style="color: #6EC5B8">Sign in</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
     <!--Matching Password-->
     <script type="text/javascript">
         $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Not Matching').css('color', 'red');
        });

                var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
            </script>
     <!--Matching Password End-->
</body>
</html>