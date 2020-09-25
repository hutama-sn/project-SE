<?php
    include ("server.php");
    // $db     = mysqli_connect("localhost", "root", "", "cuanku");
    $USername = $_SESSION['username'];
    $bulan       = mysqli_query($db, "SELECT CategoryName FROM record where BalanceFlow like 'Expense'");
    $penghasilan = mysqli_query($db, "SELECT SUM(AmountFlow) as total FROM record WHERE UserId = '$USername' AND BalanceFlow like 'Expense' GROUP BY CategoryName");

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
    <meta name="viewport" content="width=H, initial-scale=1.0">
    <title>Homepage | Cuanku</title>
    <link rel="stylesheet" href="homepage.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

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

    <!-- <?php  if (isset($_SESSION['username'])) : ?>
    <p style = "color: azure; font-size: 20px">Hello, <strong><?php echo $_SESSION['username']; ?></strong></p>
    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?> -->

    <div id="body">
        <div class="content">
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
            <div class="add">
                <h1 id = "form"> Add Expenses/Income</h1>

                    <form method="post" action="HomePage.php" id = "Registration">

                        <select id="btn" name="balanceFlow" value="<?php echo "$balanceFlow"; ?>" >
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                        <input type="text" name="itemDesc" id="btn" placeholder = "Item name"><br><br>

                        <select id="btn" name="itemCate" value="<?php echo "$itemCate"; ?>">
                            <option value="Food & Drink">Food & Drink</option>
                            <option value="Shopping">Shopping</option>
                            <!-- <option value="Housing">Housing</option> -->
                            <option value="Housing">Housing</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Vehicle">Vehicle</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Technology">Technology</option>
                            <option value="Financial">Financial</option>
                            <option value="Investment">Investment</option>
                            <option value="Income">Income</option>
                            <option value="Others">Others</option>
                        </select>

                        <input type="number" name="itemPrice" id ="btn" value="<?php echo "$itemPrice"; ?>" placeholder = "Item price"><br><br>

                        <button type="submit" id="btn" name="reg_item">Add</button>

                    </form> <br>
                    <h1>Upload Receipt</h1>
                    <form action="checkupload.php" method="POST" enctype="multipart/form-data" id="Registration1">
                        <input type="file" name="image" id="btn">
                        <button id="btn" type="submit" name="submit">Upload Image</button>
                    </form>
                
            </div>
            <br><br>
            <div class="containter">
                <canvas id="myChart" width="50" height="30"></canvas>
            </div>
            
            <script>
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['CategoryName'] . '",';}?>],
                        datasets: [{
                                label: '# of Expense total',
                                data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['total'] . '",';}?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 0.2)',
                                    
                                ],
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                        }
                    }
                });
            </script>
        </div>
    </div>

    <div id="footer">
        <a href="https://www.facebook.com/cuanku.id/"><img src="../image/facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/cuanku_id/"><img src="../image/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/cuanku1"><img src="../image/twitter.png" alt="twitter"></a>
        <br>
        Made by CuanKu Developers
    </div>
    
</body>
</html>