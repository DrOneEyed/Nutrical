<?php
$conn = mysqli_connect("localhost", "root", "", "iwp_proj");
if ($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}

$bFoodSelect = $_POST["bFoodSelect"];
$bq = $_POST['bq'];
$lFoodSelect = $_POST['lFoodSelect'];
$lq = $_POST['lq'];
$dFoodSelect = $_POST['dFoodSelect'];
$dq = $_POST['dq'];
$weight = $_POST['weight'];
$reason = $_POST['reasons'];

//bCal
$bQuery = "SELECT * FROM breakfast WHERE item='$bFoodSelect' ";
$bResult = mysqli_query($conn, $bQuery);
$bRow = mysqli_fetch_array($bResult);
$bFoodCal = $bRow[2];
$bCal = $bFoodCal * $bq;

//lCal
$lQuery = "SELECT * FROM lunch WHERE item='$lFoodSelect' ";
$lResult = mysqli_query($conn, $lQuery);
$lRow = mysqli_fetch_array($lResult);
$lFoodCal = $lRow[2];
$lCal = $lFoodCal * $lq;

//dCal
$dQuery = "SELECT * FROM dinner WHERE item='$dFoodSelect' ";
$dResult = mysqli_query($conn, $dQuery);
$dRow = mysqli_fetch_array($dResult);
$dFoodCal = $dRow[2];
$dCal = $dFoodCal * $dq;

//totalCal
$totalCal = $bCal + $lCal + $dCal;

//insert data
$sql = "INSERT INTO Backend(day, breakfast, bq, bCal, lunch, lq, lCal, dinner, dq, dCal, totalCal, weight, reason)
VALUES (CURDATE(), '$bFoodSelect', '$bq', '$bCal', '$lFoodSelect', '$lq', '$lCal', '$dFoodSelect', '$dq', '$dCal', '$totalCal', '$weight', '$reason')";

if(!mysqli_query($conn, $sql)){
  echo "Not inserted";
}
else{
  echo "Successfully inserted";
}

header("refresh:1; url=goalPage.php");

?>
