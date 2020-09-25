<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cuanku');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $budget = mysqli_real_escape_string($db, $_POST['budget']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($budget)) { array_push($errors, "Budget is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM User WHERE Username='$username' OR Email='$email' LIMIT 1";
  
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['Username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO User (Username, Password, Email, Budget) 
  			  VALUES('$username', '$password_1', '$email', $budget)";
  	mysqli_query($db, $query);
  	$_SESSION['Username'] = $username;
  	// $_SESSION['success'] = "You are now logged in";
  	// header('location: HomePage.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Username is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      //$password = md5($password);
      $query = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: HomePage.php');
      }else {
          array_push($errors, "Wrong username/password combination");
      }
  }
}

  function alphanum(){
    $a = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return substr(str_shuffle($a), 0, 5);
  }

  if (isset($_SESSION['username'])){
      if (isset($_POST['reg_item'])) {

          // receive all input values from the form
          $itemname = mysqli_real_escape_string($db, $_POST['itemDesc']);
          $itemprice = mysqli_real_escape_string($db, $_POST['itemPrice']);
          $date = date('l');
          $balanceFlow = $_POST['balanceFlow'];
          $itemcategory = $_POST['itemCate'];
          $userName = $_SESSION["username"];
          
          // $username = $_SESSION['username'];
          // echo $_SESSION['username'];

          // form validation: ensure that the form is correctly filled ...
          // by adding (array_push()) corresponding error unto $errors array
          if (empty($itemname)) { array_push($errors, "Item name is required"); }
          if (empty($itemprice)) { array_push($errors, "Item price is required"); }
          if (empty($userName)) {array_push($errors, "username not found"); }

          // first check the database to make sure 
          // a itemid does not already exist with the same username and/or email
          // $user_check_query = "SELECT * FROM items WHERE itemid='$itemid' LIMIT 1";
          // $result = mysqli_query($db, $user_check_query);
          // $item = mysqli_fetch_assoc($result);
          
          // if ($item) { // if itemid exists
          //     if ($item['itemid'] === $itemid) {
          //     array_push($errors, "item id already exists");
          //     }
          // }

          // Finally, register user if there are no errors in the form
          if (count($errors) == 0) {
  
              // foreach ($balanceFlow as $i){
              //   $flow = $i;
              //   $balanceFlow = mysqli_real_escape_string($db, $flow);
              //   // $query = "INSERT INTO items (balanceFlow) VALUES ('$balanceFlow')";
              //   // mysqli_query($db, $query);
              // }

              // foreach ($itemcategory as $j){
              //   $category = $j;
              //   $itemcategory = mysqli_real_escape_string($db, $category);
              //   // $query = "INSERT INTO items (itemcategory) VALUES ('$itemcategory')";
              //   // mysqli_query($db, $query);
              // }

              $query = "INSERT INTO Record (UserID, CategoryName, BalanceFlow, AmountFlow, Date, Description) 
                      VALUES('$userName', '$itemcategory', '$balanceFlow', '$itemprice', '$date', '$itemname')";
              mysqli_query($db, $query);
              
              if($balanceFlow == 'Expense'){
                $query2 = "UPDATE User SET Budget = Budget - $itemprice WHERE Username = '$userName' ";
                mysqli_query($db, $query2);
              } else{
                $query3 = "UPDATE User SET Budget = Budget + $itemprice WHERE Username = '$userName' ";
                mysqli_query($db, $query3);
              }
              
              $_SESSION['username'] = $userName;
              $_SESSION['success'] = "You are now logged in";
              header('location: HomePage.php');
          }
      }
    
      if (isset($_POST['Register'])){
        $oldUser = mysqli_real_escape_string($db, $_POST['oldUser']);
        $newUser = mysqli_real_escape_string($db, $_POST['newUser']);
        $uSerName = $_SESSION['username'];
        
        echo($userName);
      
        $user_check_query = "SELECT * FROM User WHERE Email='$newUser' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
          if ($user['email'] === $newUser) {
            array_push($errors, "Email already exists");
          }
        }
    
        if (count($errors) == 0){
          $query = "UPDATE User SET Email = '$newUser' WHERE Email = '$oldUser'";
          mysqli_query($db, $query);
          $_SESSION['username'] = $uSerName;
          $_SESSION['success'] = "Change Successful";
          header('location: Settings.php');
        }
    
      }
    
      if (isset($_POST['Reg1'])){
        $oldPass = mysqli_real_escape_string($db, $_POST['oldPass']);
        $newPass = mysqli_real_escape_string($db, $_POST['newPass']);
        $UserName = $_SESSION['username'];
        // echo($userName);
    
        if (count($errors) == 0){
          $query = "UPDATE User SET Password = '$newPass' WHERE Password = '$oldPass' and Username = '$UserName'";
          mysqli_query($db, $query);
          $_SESSION['username'] = $UserName;
          $_SESSION['success'] = "Change Successful";
          header('location: Settings.php');
        }
    
      }

      if (isset($_POST['add'])){
        $USERname = $_SESSION['username'];
        $addInc = mysqli_real_escape_string($db, $_POST['addInc']);
        // echo($USERname);

        if(count($errors) == 0){
          $query = "UPDATE User SET Budget = Budget + '$addInc' WHERE Username = '$USERname'";
          mysqli_query($db, $query);
          $_SESSION['username'] = $USERname;
          $_SESSION['success'] = "Change Successful";
          // header('location: Settings.php');
        }
      }
  }



?>  
