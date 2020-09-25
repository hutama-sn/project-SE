<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="checkupload.css">
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

    <?php
        if(isset($_POST['submit'])){
            $file=$_FILES['image'];
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileError = $_FILES['image']['Error'];
            $fileType = $_FILES['image']['type'];
            $fileExt = explode('.',$fileName);
            $fileActualExt= strtolower(end($fileExt));

            $allowed =array('jpg','jpeg','pdf');
            if(in_array($fileActualExt,$allowed)){
                if($fileError==0){
                $fileDestination = 'upload/'.$fileName;
                move_uploaded_file($fileTmpName,$fileDestination);
                    echo "<h3>Image Upload Successfully</h3>";
                echo '<img src="upload/'.$fileName.'" style ="widtch :100%">';

                shell_exec('"D:\\OCR -Tesseract\\Tesseract-OCR\\tesseract" "D:\\XAMPP\\htdocs\\html\\upload\\'.$fileName.'" OCR\\out');
                echo "<br><h3>Expenses</h3><br><pre>";
                $myfile =fopen("OCR\\out.txt","r") or die("Unable to Open File!");
                echo fread($myfile,filesize("OCR\\out.txt"));
                fclose($myfile);

                echo "</pre>";
                }else{
                    echo "There was an error uploading your files !";
                }
            }else{
                echo"You cannot upload files of this type!";
            }
        }
    ?>

    <div id="footer">
        <a href="https://www.facebook.com/cuanku.id/"><img src="../image/facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/cuanku_id/"><img src="../image/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/cuanku1"><img src="../image/twitter.png" alt="twitter"></a>
        <br>
        Made by CuanKu Developers
    </div>
</html>


