<html>

<head>
  <title> Calorie Counter </title>
  <link href="style.css" type="text/css" rel="stylesheet">
  <style>
            .btn_sty {
                padding: 0.6em 2em;
                border: none;
                outline: none;
                color: rgb(255, 255, 255);
                background: #111;
                cursor: pointer;
                position: relative;
                z-index: 0;
                border-radius: 10px;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
            }

            .btn_sty:before {
                content: "";
                background: linear-gradient(
                    45deg,
                    #ff0000,
                    #ff7300,
                    #fffb00,
                    #48ff00,
                    #00ffd5,
                    #002bff,
                    #7a00ff,
                    #ff00c8,
                    #ff0000
                );
                position: absolute;
                top: -2px;
                left: -2px;
                background-size: 400%;
                z-index: -1;
                filter: blur(5px);
                -webkit-filter: blur(5px);
                width: calc(100% + 4px);
                height: calc(100% + 4px);
                animation: glowing-btn_sty 20s linear infinite;
                transition: opacity 0.3s ease-in-out;
                border-radius: 10px;
            }

            @keyframes glowing-btn_sty {
                0% {
                    background-position: 0 0;
                }
                50% {
                    background-position: 400% 0;
                }
                100% {
                    background-position: 0 0;
                }
            }

            .btn_sty:after {
                z-index: -1;
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                background: #222;
                left: 0;
                top: 0;
                border-radius: 10px;
            }
            .container {
                font-family: arial;
                font-size: 24px;
                margin: 25px;
                width: 350px;
                height: 200px;
              }
        </style>
</head>
 
<body>
  <div id="title">
    <h2>Calorie Counter</h2>
  </div>

  <div id="box">

   <div id="breakfast">
     <h2>Breakfast</h2>

     <form action="insert/insert.php" method="POST">
       ADD breakfast food <input type="text" name="bFoodAdd"><br>
       ADD calorie <input type="number" name="bCalAdd">
       <input type="submit">
     </form>

     <form action="delete/deleteB.php" method="POST">
       DELETE breakfast food
       <select name="bFoodDe">
         <option>Select</option>

         <?php
         $conn = mysqli_connect("localhost", "root", "", "iwp_proj");
         if ($conn->connect_error){
           die("Connection failed: ". $conn->connect_error);
         }

         $sqli = "SELECT * FROM breakfast";
         $result = mysqli_query($conn, $sqli);
         while($row = mysqli_fetch_array($result)){
           echo '<option>'.$row['item'].'</option>';
         }
          ?>
       </select>

       <input type="submit" value="Delete">

     </form>

   </div>

   <div id="lunch">
     <h2>Lunch</h2>
     <form action="insert/insertL.php" method="POST">
       ADD lunch food <input type="text" name="lFoodAdd"><br>
       ADD calorie <input type="number" name="lCalAdd">
       <input type="submit" value="Go">
     </form>

     <form action="delete/deleteL.php" method="POST">
       DELETE lunch food
       <select name="lFoodDe">
         <option>Select</option>

         <?php
         //conn
         $conn = mysqli_connect("localhost", "root", "", "iwp_proj");
         if ($conn->connect_error){
           die("Connection failed: ". $conn->connect_error);
         }

         $sqli = "SELECT * FROM lunch";
         $result = mysqli_query($conn, $sqli);
         while($row = mysqli_fetch_array($result)){
           echo '<option>'.$row['item'].'</option>';
         }
          ?>
       </select>

       <input type="submit" value="Delete">

     </form>
   </div>

   <div id="dinner">
     <h2>Dinner</h2>
     <form action="insert/insertD.php" method="POST">
       ADD dinner food <input type="text" name="dFoodAdd"><br>
       ADD calorie <input type="number" name="dCalAdd">
       <input type="submit" value="Go">
     </form>


     <form action="delete/deleteD.php" method="POST">
       DELETE dinner food
       <select name="dFoodDe">
         <option>Select</option>

         <?php
         //conn
         $conn = mysqli_connect("localhost", "root", "", "iwp_proj");
         if ($conn->connect_error){
           die("Connection failed: ". $conn->connect_error);
         }

         $sqli = "SELECT * FROM dinner";
         $result = mysqli_query($conn, $sqli);
         while($row = mysqli_fetch_array($result)){
           echo '<option>'.$row['item'].'</option>';
         }
          ?>
       </select>

       <input type="submit" value="Delete">

     </form>
   </div>
  <div class="container"> 
   <button onclick="location.href='selectPage.php'" class="btn_sty">Next</button>
  </div>
</body>
</html>
