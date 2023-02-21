<?php
  $conn = mysqli_connect("localhost", "root", "", "iwp_proj");

if ($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}

$bFoodDe = $_POST["bFoodDe"];
$sql = "DELETE from breakfast where Item = '$bFoodDe'";
if(!mysqli_query($conn, $sql)){
  echo "Not deleted";
}
else{
  echo "Successfully deleted";
}

header("refresh:1; url=../index.php");

?>
