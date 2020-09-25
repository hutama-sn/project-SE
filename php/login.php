<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Log In | Cuanku</title>
  <link rel="stylesheet" type="text/css" href="Login.css">
</head>
<body>
    <div id = "header">
        <div class="Title">
        <img src="../image/logoCuanku.png" alt="Logo">
        CuanKu
        </div>
    </div>
<!--     
    <div id="LogIn">
        <div class = "picture">
            <img src="" alt="banner disini">
        </div>
        <div class="form">
            <form method=POST id= "loginform1">
                <input type="text" name= "Username" id= "loginform" placeholder="Username"><br><br>
                <input type="password" name="password" id="loginform" placeholder="password"> <br><br>
                <button id="button">
                    <a href="homepage.html">Sign In</a>
                </button> <br><br>
                <button id="button">
                    <a href="SignUp.html">Sign Up Now</a>
                </button>
            </form>
        </div>
    </div> -->

    <div id = "LogIn">
        <div class="image-container">
            <span id="slider-image1"></span>
            <span id="slider-image2"></span>
            <span id="slider-image3"></span>

            <div class = "picture">
                <img src="../image/banner1.png" alt="banner disini" class="image-slider">
                <img src="../image/banner2.png" alt="banner disini" class="image-slider">
                <img src="../image/banner3.png" alt="banner disini" class="image-slider">
            </div>
            <div class="button-slide">
            <a href="#slider-image1" class="slider-button"></a>
            <a href="#slider-image2" class="slider-button"></a>
            <a href="#slider-image3" class="slider-button"></a>
             </div>
        </div>

        <hr>
        
        <form method="post" action="login.php" id="loginform1">
            <?php include('errors.php'); ?>
            <div class="loginform">              
                <input type="text" name="username" id= "loginform" placeholder="Username"> <br><br>
            </div>
            <div class="loginform">
                <input type="password" name="password" id= "loginform" placeholder="Password"> <br><br>
            </div>
            <div class="button">
                <button type="submit" id="button" name="login_user">Login</button> <br><br>
            </div>
            <p id = "button">
                Not yet a member? <a href="sign.php">Sign up</a>
            </p>
        </form>

    </div>

    <div id="footer">
        <a href="https://www.facebook.com/cuanku.id/"><img src="../image/facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/cuanku_id/"><img src="../image/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/cuanku1"><img src="../image/twitter.png" alt="twitter"></a> <br>
        Made by CuanKu Developers
    </div>
    
</body>
</html>