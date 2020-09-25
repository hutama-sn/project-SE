<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up | Cuanku</title>
  <link rel="stylesheet" href="Signup.css">
</head>
<body>
    <div id = "header">
        <div class="Title">
            <img src="../image/logoCuanku.png" alt="Logo">
            CuanKu
        </div>
    </div>
    
    <div id="Registration-Form">
        <form method="post" action="sign.php" id = "registration">
            <?php include('errors.php'); ?>
            
            <div id="Form">
                <h2>Register</h2><br>
            </div>

            <div id="input-group">
                <input type="text" name="username" id = "button" value="<?php echo $username; ?>" placeholder = "Username">
            </div>
            <br>

            <div id="input-group">
                <input type="email" name="email" id = "button" value="<?php echo $email; ?>" placeholder = "Email">
            </div>
            <br>

            <div id="input-group">
                <input type="password" name="password_1" id = "button" placeholder = "Password">
            </div>
            <br>

            <div id="input-group">
                <input type="password" name="password_2" id = "button" placeholder = "Confirm password">
            </div>
            <br>
            
            <div id="input-group">
                <input type="text" name="budget" id = "button"  placeholder = "Budget">
            </div>
            <br>

            <div id="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <br>
            
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>
        </form>
    </div>
    
    <div class = "footer" style="  position: absolute;bottom: 0px;  width: 100%;">
        <a href="https://www.facebook.com/cuanku.id/"><img src="../image/facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/cuanku_id/"><img src="../image/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/cuanku1"><img src="../image/twitter.png" alt="twitter"></a><br>
        Made by CuanKu Developers
    </div>

</body>
</html>