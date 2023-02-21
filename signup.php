<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <style media="screen">
                *,
            *:before,
            *:after{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            body{
                background-color: #080710;
            }
            .background{
                width: 430px;
                height: 520px;
                position: absolute;
                transform: translate(-50%,-50%);
                left: 50%;
                top: 50%;
            }
            .background .shape{
                height: 200px;
                width: 200px;
                position: absolute;
                border-radius: 50%;
            }
            .shape:first-child{
                background: linear-gradient(
                    #1845ad,
                    #23a2f6
                );
                left: -80px;
                top: -80px;
            }
            .shape:last-child{
                background: linear-gradient(
                    to right,
                    #ff512f,
                    #f09819
                );
                right: -30px;
                bottom: -80px;
            }
            form{
                height: 520px;
                width: 400px;
                background-color: rgba(255,255,255,0.13);
                position: absolute;
                transform: translate(-50%,-50%);
                top: 50%;
                left: 50%;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                border: 2px solid rgba(255,255,255,0.1);
                box-shadow: 0 0 40px rgba(8,7,16,0.6);
                padding: 50px 35px;
            }
            form *{
                font-family: 'Poppins',sans-serif;
                color: #ffffff;
                letter-spacing: 0.5px;
                outline: none;
                border: none;
            }
            form h3{
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                text-align: center;
            }

            label{
                display: block;
                margin-top: 30px;
                font-size: 16px;
                font-weight: 500;
            }
            input{
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(255,255,255,0.07);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }
            ::placeholder{
                color: #e5e5e5;
            }
            button{
                margin-top: 50px;
                width: 100%;
                background-color: #ffffff;
                color: #080710;
                padding: 15px 0;
                font-size: 18px;
                font-weight: 600;
                border-radius: 5px;
                cursor: pointer;
            }
            .social{
            margin-top: 30px;
            display: flex;
            }
            .social div{
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255,255,255,0.27);
            color: #eaf0fb;
            text-align: center;
            }
            .social div:hover{
            background-color: rgba(255,255,255,0.47);
            }
            .social .fb{
            margin-left: 25px;
            }
            .social i{
            margin-right: 4px;
            }
        </style>
    </head>
    <script>
        function validate()  
        {  
            var x = document.myform.email.value;  
            var at_pos = x.indexOf("@");  
            var dot_pos = x.lastIndexOf(".");  
            if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2>=x.length)
            {  
                document.getElementById("email_msg").innerHTML = "Please enter a valid e-mail address";
                return false;  
            }  
            var pw = document.myform.password.value;  
            
            if(pw == "")
            {  
                document.getElementById("pass_msg").innerHTML = "Fill the password please!";  
                return false;  
            }  
            
            if(pw.length < 8) 
            {  
                document.getElementById("pass_msg").innerHTML = "Password length must be atleast 8 characters";  
                return false;  
            }  

            if(pw.length > 15)
            {  
                document.getElementById("pass_msg").innerHTML = "Password length must not exceed 15 characters";  
                return false;  
            }
        }  
    </script>
    <body>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <div style = "text-align: center;">
            <form name="myform" action="#" method = "POST" onsubmit="return validate();">
                <label for="uname">Enter Username: </label>
                <input type="text" placeholder="Username" id="uname" name="username" required>
                <span id = "uname_msg" style="color:red"> </span>
                
                <label for="email">Enter Email:</label>
                <input type="text" placeholder="email" id="email" name="email" required>
                <span id = "email_msg" style="color:red"> </span>
                
                <label for="pass">Enter Password: </label>
                <input type="password" placeholder="Password" id="password" name="password" required>
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <span id = "pass_msg" style="color:red"> </span>                    
                
                <label for="repass">Re-Enter Password: </label>
                <input type="password" placeholder="Re-Enter Password" id="repass" name="repass" required>
                <span id = "repass_msg" style="color:red"> </span>
                    
                <button>Log In</button>
                <div class="social">
                    <div class="go"><i class="fab fa-google"></i>  Google</div>
                    <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
                </div>
            </form>
        </div>
        <?php
            if ($_SERVER['REQUEST_METHOD']=='POST')
            {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $repass = $_POST['repass'];
                $conn = mysqli_connect("localhost", "root", "", "iwp_proj");
                if($conn===false)
                {
                    die("ERROR: Could Not Connect To DB" . mysqli_connect_error());
                }
                $sql1= "SELECT * FROM login_det WHERE email = '$email'";
                $result = mysqli_query($conn, $sql1);
                $check = mysqli_fetch_array($result);
                
                $sql2= "SELECT * FROM login_det WHERE username = '$username'";
                $result = mysqli_query($conn, $sql2);
                $check = mysqli_fetch_array($result);
                if(isset($check))
                {
                    echo '<h2>Email ID Already Exists!</h2>';
                }
                elseif(isset($check2))
                {
                    echo '<h2>Username Already In Use!</h2>';
                }
                else
                {
                    $sql = "INSERT INTO login_det VALUES ('$username', '$email', '$password', '1')";
                    if(mysqli_query($conn,$sql))
                    {
                        echo '<h2>"Account Created!"</h2>';
                        sleep(3);
                        header('Location: login.php');
                        exit;
                    }
                    else
                    {
                        echo '<h2>Unexpected Error Occured! Please Try Again After Some Time!</h2>';
                    }
                }
            }
        ?> 
        <script src="js/script_login.js"></script>
    </body>
</html>