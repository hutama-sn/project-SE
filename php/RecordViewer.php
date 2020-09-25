<?php

    include ("server.php");
    $USername = $_SESSION['username'];

    // session_start(); 

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense History | Cuanku</title>
	<link rel="stylesheet" type="text/css" href="RecordViewer.css">
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
    <h1><span class="blue"></span>Record Flow<span class="blue"></span></h1>
    <h2>Expenses</h2>
    <div class="scrollable">
        <table class="container">
            <thead>
                <tr>
                    <th><h1>Category</h1></th>
                    <th><h1>Amount</h1></th>
                    <th><h1>Description</h1></th>
                    <th><h1>Date</h1></th>
                    <th><h1>Options</h1></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $db = mysqli_connect('localhost', 'root', '', 'cuanku'); //The Blank string is the password
                    
                    $query = "SELECT * FROM Record WHERE UserID = '$USername' AND BalanceFlow = 'Expense'" ; //userid ganti sama username yg lagi login
                    $result = mysqli_query($db,$query);
                    
                    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                        echo "<tr><td>" . $row['CategoryName'] . "</td><td>" . $row['AmountFlow'] . "</td><td>" . $row['Description'] ."</td><td>" . $row['Date'] . "</td>";  //$row['index'] the index here is a field name
                        echo "<td><a href='deleteRecord.php?id=".$row['RecordID']."'>Delete</a></td></tr>";
                    }
                    
                    mysqli_close($db);
                ?>
            </tbody>
        </table>
    </div>
    <h2 style="color: green;">Income</h2>
    <div class="scrollable">
        <table id="incomeContainer" class="container">
            <thead>
                <tr>
                    <th><h1>Category</h1></th>
                    <th><h1>Amount</h1></th>
                    <th><h1>Description</h1></th>
                    <th><h1>Date</h1></th>
                    <th><h1>Options</h1></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $db = mysqli_connect('localhost', 'root', '', 'cuanku'); //The Blank string is the password
                    
                    $query = "SELECT * FROM Record WHERE UserID = '$USername' AND BalanceFlow = 'Income'" ; //userid ganti sama username yg lagi login
                    $result = mysqli_query($db,$query);
                    
                    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                        echo "<tr><td>" . $row['CategoryName'] . "</td><td>" . $row['AmountFlow'] . "</td><td>" . $row['Description'] ."</td><td>" . $row['Date'] . "</td>";  //$row['index'] the index here is a field name
                        echo "<td><a href='deleteRecord.php?id=".$row['RecordID']."'>Delete</a></td></tr>";
                    }
                    
                    mysqli_close($db);
                ?>
            </tbody>
        </table>
    </div>
    <div id="footer">
        <a href="https://www.facebook.com/cuanku.id/"><img src="../image/facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/cuanku_id/"><img src="../image/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/cuanku1"><img src="../image/twitter.png" alt="twitter"></a><br>
        Made by CuanKu Developers
    </div>
</body>
</html>