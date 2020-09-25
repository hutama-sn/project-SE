<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | CuanKu</title>
    <link rel="stylesheet" href="..\css\settings.css">
</head>
<body>
    <?php include('errors.php')?>
    <div class = "header">
        <div class="Title">
            <img src="../image/logoCuanku.png" alt="Logo">
            CuanKu
        </div>
        
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
              <a href="HomePage.php">Home</a>  
              <a href="RecordViewer.php">Expense History</a>
              <a href="update.php">Update Income</a>
              <a href="Settings.php">Settings</a>
              <a href="login.php">Log out</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="settings">
            <h1>Settings</h1>
                <form action="" class="change" method="post">
                    Change Email <br><br>
                    <input type="text" name="oldUser" id="button" placeholder="Old Email">
                    <input type="text" name="newUser" id="button" placeholder="New Email">
                    <button type="submit" id="button" name="Register">Submit</button> <br><br>
                    Change Password <br><br>
                    <input type="password" name="oldPass" id="button" placeholder="Old Password">
                    <input type="password" name="newPass" id="button" placeholder="New Password">
                    <button type="submit" id="button" name="Reg1">Submit</button> <br><br>
                </form>
            </div>

        </div>

    </div>
    <div id="footer"style="  position: absolute;bottom: 0px;  width: 100%;">
        <a href="https://www.facebook.com/cuanku.id/"><img src="../image/facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/cuanku_id/"><img src="../image/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/cuanku1"><img src="../image/twitter.png" alt="twitter"></a><br>
        Made by CuanKu Developers
    </div>
</body>
</html>