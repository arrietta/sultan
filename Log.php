<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        *{
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
        }
        body{
            margin: 0px;
        }
        
        header{
            position: fixed;
            top: 0;
            height: 5.2vw;
            width:100%;
            margin: 0;
            background-color: #2D4263;
            display: flex;
            z-index: 1;
            justify-content: space-around;

        }
        
        .Title{
            color: white;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            margin-left: 10px;
            font-size: 2vw;
        }
        .a{
            text-decoration-line:none ;
        }
        .box{
            margin-top: 7%;
            text-align: center;
            color: black;
        }
        #reg input{
            font-size: 30px;
           margin: 10px;
        }
        #reg label{
            font-size: 30px;
            margin: 10px;
        }
        
        
        
    </style>
</head>
<body>
    <header>
        <a href="info.php"><h2 class="up">Info</h2></a>
        <a href="Catalog.php"><h2 class="up">Catalog</h2></a>
        <a href="index.php"><h1 class="Title">SDU STORE</h1></a>
        <a href="Basket.php"><h2 class="up">Basket</h2></a>
        <a href="reg.php"> <h2 class="up">Account</h2> </a>
    </header>
    <div class="box">
        
        <form action="" method="post" id="reg">
            <label for="login">Login</label><br>
            <input type="text" name="login" id="login" ><br>
            <label for="password">Password</label><br>
            <input type="text" name="password" id="password"><br>
            <input type="submit" value="Submit"><br>
        </form>
        <a href="Reg.php">Register</a>
    </div>
    <?php
        session_start();
        try{
            $id = $_SESSION['ID'];
        }catch(Exception $e) {
            $id = 'null';        
        }
        if($id != 'null'){
            header("location: acc.php");
            exit();
        }
    
        $Pass =$login= "";
        $is = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["password"])) {
            $is = false;
          } else {
            $Pass = test_input($_POST["password"]);
          }
          if (empty($_POST["login"])) {
            $is = false;
          } else {
            $login = test_input($_POST["login"]);
          }

      
          if($is){
            include 'Temp/Conn.php';
            try {
      
    
                $stmt = $pdo->prepare("SELECT * FROM user where Login='$login'and Password = '$Pass'");
                $stmt->execute();
                $res = $stmt->fetchAll();
                echo count($res)==1;
                if (count($res)==1){
                  session_start();
                  $_SESSION['ID'] = $login;
                  $_COOKIE['n'] = $login;






















                    echo 'good';
                  header("location: acc.php");
                  exit();
                }
                
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  $conn = null;
                  echo "</table>";
                  }
                  
                }
      
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
    
    
  
  ?>
    
</body>
</html>