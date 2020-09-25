<?php 
    include('server.php'); 
    $USerName = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Income | Cuanku</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class = "header">
        <div class="Title">
            <img src="../image/logoCuanku.png" alt="Logo">
            CuanKu
        </div>
        
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div id="myDropdown" class="dropdown-content">
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

            <h1>Update income</h1>

                <form action="" class="change" method="post">
                    <input type="number" name="addInc" id="button" placeholder="Additional income">
                    <button type="submit" id="button" name="add">Submit</button> <br><br>
                    <p>Final balance: 
                        <?php $db = mysqli_connect('localhost', 'root', '', 'cuanku'); //The Blank string is the password
                        
                        $query = "SELECT * FROM user WHERE Username = '$USerName'" ; //userid ganti sama username yg lagi login
                        $result = mysqli_query($db,$query);
                        
                        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                            echo "<tr><td>" . $row['Budget'];
                           
                        }
                        
                        mysqli_close($db);?>
                    </p>
                </form>

            </div>

        </div>

    </div>

    <div id="footer">
        <a href="https://www.facebook.com/cuanku.id/"><img src="../image/facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/cuanku_id/"><img src="../image/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/cuanku1"><img src="../image/twitter.png" alt="twitter"></a><br>
        Made by CuanKu Developers
    </div>

</body>
</html>