<?php
            $con = mysqli_connect("localhost", "root", "", "iwp_proj");
            if($con===false)
            {
                die("ERROR: Could Not Connect To DB" . mysqli_connect_error());
            }
            $username = $_POST['username'];  
            $password = $_POST['password'];  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  
              
            $sql = "select * from login_det where username = '$username' and passwords = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
                  
            if($count == 1){  
                include 'calsi.html';
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";                  
            }     
?>