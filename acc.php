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
        a{
            text-decoration-line:none ;
        }
        .box{
            margin-top: 7%;
            text-align: center;
            color: black;
        }
        #ex{
            font-size:30px;
        }
        .big{
            font-size:40px;
        }
        
        
        
        
    </style>
</head>
<body>
    <header>
        <a href="info.php"><h2 class="Title">Info</h2></a>
        <a href="Catalog.php"><h2 class="Title">Catalog</h2></a>
        <a href="index.php"><h1 class="Title">SDU STORE</h1></a>
        <a href="Basket.php"><h2 class="Title">Basket</h2></a>
        <a href="reg.php"> <h2 class="Title">Account</h2> </a>
    </header>
    <div class="box">
    <?php
        session_start(); 
        $login= $_SESSION['ID'];
        include'Temp/Conn.php';
        $stmt = $pdo->prepare("SELECT * FROM user where login = '$login' ");
        $stmt->execute();
        $res = $stmt->fetchAll();
        print_r ('<p class = "big">Login: '.$res[0]['Login']."</H2><br>");
        print_r ('<p class = "big">Password: '.$res[0]['Password']."</H2><br>");
        print_r ('<p class = "big">Password: '.$res[0]['Name']."</H2><br>");
        print_r ('<p class = "big">Password: '.$res[0]['Surname']."</H2><br>");
        print_r ('<p class = "big">Password: '.$res[0]['Number']."</H2><br>");
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <input type="submit" value="Exit" id ='ex'><br>
        </form>
           
        
                
    </div>
    <?php 

            
            function buy (){
                session_start();
                $_SESSION['ID'] = 'null';
                header("location: reg.php");
                  exit();
                    
            }   
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                buy();
            }
            
    ?>
            
        
    
</body>
</html>