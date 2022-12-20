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
        .up{
            color: white;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            margin-left: 10px;
            font-size: 2vw;
        }a{
            text-decoration-line:none ;
        }
        .box{
            margin: 7%;
            text-align: center;
            color: black;
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
    <?php
        session_start(); 
        $login= $_SESSION['ID'];
        include'Temp/Conn.php';
        $stmt = $pdo->prepare("SELECT * FROM user where login = '$login' ");
        $stmt->execute();
        $res = $stmt->fetchAll();
        print_r ('<H1>Login: '.$res[0]['Login']."</H1><br>");
        print_r ('<H1>Password: '.$res[0]['Password']."</H1><br>");
        print_r ('<H1>Password: '.$res[0]['Name']."</H1><br>");
        print_r ('<H1>Password: '.$res[0]['Surname']."</H1><br>");
        print_r ('<H1>Password: '.$res[0]['Number']."</H1><br>");
        ?>
        <a href="#"><h1 style="font-size:36px; color:#C84B31" id ="buy">Buy now </h1> </a>
                
    </div>
    <?php 

            $n = $name= $_COOKIE['n'];
            function buy (){
                session_start();
                $_SESSION['ID'] = 'null';
                header("location: reg.php");
                  exit();
                    
            }   
            if($n=='null'){
                buy();
            }
               ?>
            
        <script type="text/javascript"> 


        $('#buy').click(function(){
            document.cookie = "n = null" ;
        });
        
        
    </script>
    
</body>
</html>