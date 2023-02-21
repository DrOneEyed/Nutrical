<?php

  $bFoodAdd = $_POST["bFoodAdd"];
  $bCalAdd = $_POST["bCalAdd"];

  $conn = mysqli_connect("localhost", "root", "", "iwp_proj");
  if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
  }

  $sql = "INSERT INTO breakfast VALUES ('$bFoodAdd', '$bCalAdd')";
  if(!mysqli_query($conn, $sql)){
    echo "Not inserted";
  }
  else{
    echo "Successfully inserted";
  }

  header("refresh:1; url=../index.php");

?>
