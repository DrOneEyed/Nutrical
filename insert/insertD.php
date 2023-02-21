<?php

  $dFoodAdd = $_POST["dFoodAdd"];
  $dCalAdd = $_POST["dCalAdd"];

  $conn = mysqli_connect("localhost", "root", "", "iwp_proj");

  if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
  }

  $sql = "INSERT INTO dinner VALUES ('$dFoodAdd', '$dCalAdd')";
  if(!mysqli_query($conn, $sql)){
    echo "Not inserted";
  }
  else{
    echo "Successfully inserted";
  }

  header("refresh:1; url=../index.php");

?>
