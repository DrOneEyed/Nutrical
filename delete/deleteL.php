<?php
  $conn = mysqli_connect("localhost", "root", "", "iwp_proj");

  if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
  }

  $lFoodDe = $_POST["lFoodDe"];
  $sql = "DELETE from lunch where Item = '$lFoodDe'";
  if(!mysqli_query($conn, $sql)){
    echo "Not deleted";
  }
  else{
    echo "Successfully deleted";
  }

  header("refresh:1; url=../index.php");

?>
