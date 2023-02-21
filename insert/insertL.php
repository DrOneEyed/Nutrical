<?php

  $lFoodAdd = $_POST["lFoodAdd"];
  $lCalAdd = $_POST["lCalAdd"];

  $conn = mysqli_connect("localhost", "root", "", "iwp_proj");

  if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
  }

  $sql = "INSERT INTO lunch VALUES ('$lFoodAdd', '$lCalAdd')";
  if(!mysqli_query($conn, $sql)){
    echo "Not inserted";
  }
  else{
    echo "Successfully inserted";
  }

  header("refresh:1; url=../index.php");

?>
