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
        html, body {
            overflow: hidden;
        height: 100%;
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
        }.box{
            margin-top: 5%;
            position: relative;
            padding: 0;   
            display: flex;
            z-index: 0;
            
        }
        .Left{
            text-align:center;
            width: 50%;
            
            padding-top:60px;
        }
        .Right{
            width: 50%;
            background-color:#DDD9D9;
            padding: 20px;
            padding-top:80px;
            height:90vh;
        }
        .size{
            display:flex;
        }
        .item{
            width: 70%;
        }
        .size > div{
            margin:5px;
            font-size:20px;
        }
    @media only screen and (max-width: 700px) {
        .item{
            width: 70%;
            margin:30px;
        }
        .Title{
            font-size: 4vw;
        }
        header{
            height: 60px;
        }
        .box{
            margin-top: 60px;
            flex-direction:column;
        }
        .box>div{
            width: 100%;
            padding:10px;
            height: 500px;
        }
        
        .Right{
            margin-top:50px;
            
            text-align:center;
        }
        .Right h1{
            margin-left: 30px;
            margin:10px
        }
        
    }  
    @media only screen and (max-width: 520px) {
        
        .Title{
            font-size: 5vw;
        }
        header{
            height: 15vw;
        }
        .box{
            flex-direction:column;
        }
        
        
        .item{
            width: 70%;
            margin-bottom:100px;
        }
    } 
    </style>
</head>
<body>
    <header>
        <a href="info.php"><h2 class="Title">Info</h2></a>
        <a href="Catalog.php"><h2 class="Title">Catalog</h2></a>
        <a href="index.php"><h1 class="Title">SDU STORE</h1></a>
        <a href="Basket.php"><h2 class="Title">Basket</h2></a>
        <a href="reg.php"><h2 class="Title">Account</h2> </a>
        
    </header>
    <div class="box">
        <div class="Left">
            <div>
            <?php
            $name= $_COOKIE['name'];
            include "Temp/Conn.php";
                    $stmt = $pdo->prepare("SELECT * FROM item where name = '$name' ");
                    $stmt->execute();
                    $res = $stmt->fetchAll();
                    $price = $res[0]['Price'];
                    $Com =$res[0]['Comment'];
            echo '<img src=IMAGE/'. $name.' width="400vw" class ="item">';

            ?>
            </div>
            
            
        </div>
        <div class="Right">
            <div>
                <?php
                echo '<h1 style="font-size:48px;">'.ucfirst(substr($name ,0,strlen($name) - 4)).'</h1>';
                echo '<h1 style="font-size:48px;">'.$price.' KZT</h1>';
                ?>
                <a href="#"><h1 style="font-size:36px; color:#C84B31" id ="buy">Buy now </h1> </a>
                <?php
                echo '<h1 style="font-size:48px;">'.ucfirst($Com).'</h1>';
            
                ?> 
            </div>
          

            
        </div>
    </div>
    <?php 
    
            function buy (){
                $login = 'null';
                try{
                    $login =  $_COOKIE['Login'];
                }catch(Exception $e) {
                    $login = null;
                    
                }
                if($login!=null){
                    include "Temp/Conn.php";
                    $q = $_COOKIE['q'];
                    $sql = "INSERT INTO login 
                    VALUES ('$login','$Pass')";
                    $pdo->exec($sql);
                    echo '1';
                }else{
                    echo'2';
                }
                
                    
            }   
               ?>
    <script type="text/javascript"> 


        $('#buy').click(function(){
            <?php buy();?>
        });
        
        
    </script>
    <?php 
        
        
    ?>
    
    
    
</body>
</html>