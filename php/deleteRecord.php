<?php
$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "cuanku";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$query = "SELECT * FROM Record WHERE RecordID = '$id'" ;
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);
if($row["BalanceFlow"] == 'Expense'){
    $amount = $row["AmountFlow"];
    $user = $row["UserID"];
    $query2 = "UPDATE User SET Budget = Budget + $amount WHERE Username = '$user' ";
    mysqli_query($conn, $query2);
}else{
    $amount = $row["AmountFlow"];
    $user = $row["UserID"];
    $query3 = "UPDATE User SET Budget = Budget - $amount WHERE Username = '$user' ";
    mysqli_query($conn, $query3);
}

$sql = "DELETE FROM Record WHERE RecordID = $id";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: RecordViewer.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>