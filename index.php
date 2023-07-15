<?php
session_start();//Starts session Functions
if (isset($_SESSION['user_name'])) {//Checks if there's an online session. If so, returns to main-activity
    header("location:main-activity.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diabuddy Login</title> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Fontawesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
     <link rel="stylesheet" href="assets/css/style.css">
     
</head>
<body>
    <div class="container">

        <div class="card">
            <div class="logo">
                <img src="img/DIABUDDY_LOGO.png" alt="">
            </div>
            <div class="body">
                <div class="title">
                    <h3>Login</h3>
                </div>
                <form action="login_process.php" class="login" method="post">
                    <!--INVALID INPUT FEEDBACK-->
                    <?php
                            if(@$_GET['Invalid'] == true)
                            {
                        ?>
                            <div class="invalid-feedback">
                                <?php echo $_GET['Invalid']?>
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            </div>
                        <?php
                            }
                        ?>
                        <!--INVALID INPUT FEEDBACK END-->
                    <div class="form-group" >
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required autofocus autocomplete="off">
                    </div>

                    <div class="form-group password-form">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="" data-eye-completion="off">
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                        
                    </div>

                    <div class=" mt-5">
                        <button class="btn btn-primary btn-block" type="submit" value="Login" name="login">Login</button>
                    </div>

                    <div class="mt-4 text-center">
                        Don't have an account? <a href="signup-page.php" style="color: #6EC5B8">Create One</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="/js/javascript.js"></script>
</body>
</html>