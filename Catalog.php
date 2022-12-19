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
            
            font-size: 2vw;
        }
        
        .box{
            margin-top: 5%;
            position: relative;
            padding: 0;
            padding-right:10%;
            padding-left: 10%;    
            display: flex;
            z-index: 0;
        }
        
        
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;
            margin: 10px;
            gap:0 2vw ;
            align-items: center;
            }

        .grid-container > div {
            text-align: center;
            align-items: center;
            font-size: 30px;
        }
        
        .item {
            position:static;
            padding: 5%;
        }
        .item:hover{
            padding: 5%;
            background-color: #b6c2d4;
            transition: 0.5s;
        }
        .left{
            
            margin-top: 3%;
            width: 60%;
            position: relative;
            border-right: 2px #2D4263 solid;
            padding: 5px;
            
        }
        
        ul{
            padding-left: 0px;
        }
        li{
            list-style-type:none;
        }
        
        .rm-price{
            width:4.5vw ;
        }
        .price{
            margin: 8px;
            margin-top: 10px;
            
            display: flex;
        }
        .Fname{
            font-size: 130%;
        
        }
        .type li{
            padding: 5px;
            font-size: 18px;
        }
        
        a{
            text-decoration-line:none ;
        }
        @media only screen and (max-width: 1000px) {
            .grid-container {
            
            grid-template-columns: auto auto ;
            
            }
        }   
        @media only screen and (max-width: 680px) {
            .grid-container {
            
            grid-template-columns: auto  ;
            
            }
            .price{
            display: inline;
        }
        .rm-price{
            margin:5px;
            width:15vw ;
        }
        }   
        
        
    </style>
</head>
<body>
<?php
    session_start();
    ?>
    <header>
        <a href="info.php"><h2 class="Title">Info</h2></a>
        <a href="Catalog.php"><h2 class="Title">Catalog</h2></a>
        <a href="index.php"><h1 class="Title">SDU STORE</h1></a>
        <a href="Basket.php"><h2 class="Title">Basket</h2></a>
        <a href="Account.php"> <h2 class="Title">Account</h2> </a>
    </header>
    <div class="box">
        <div class="left">
            <div class="fix">
                <div>
                    <strong class="Fname">Price</strong>
                    <div class="price">
                        <div style="padding:0 6px 0 0 ">от</div>
                        <input type="text" id="minPrice_" name="minPrice_" value="" class="rm-price" onkeyup="match_changeHandler(this, 1000)">
                        <div style="padding:0 6px">до</div>
                        <input type="text" id="maxPrice_" name="maxPrice_" value="" class="rm-price" onkeyup="match_changeHandler(this, 1000)">&nbsp;Тнг
                    </div>
                </div>
                <div>
                    <ul class="type">
                        <strong class="Fname" >Type</strong>
                        <li ><div ><input type="checkbox">Hoody</div> </li>
                        <li ><div ><input type="checkbox">Tshirt</div></li>
                        <li ><div ><input type="checkbox">SweetShirt</div></li>
                        <li ><div ><input type="checkbox">ZIP Hoody </div></li>
                        <li ><div ><input type="checkbox">Polo</div></li>
                        <li ><div ><input type="checkbox">Bag</div></li>
                        <li ><div ><input type="checkbox">Cup</div></li>
                        <li ><div ><input type="checkbox">Cap</div></li>
                        <li ><div ><input type="checkbox">Bottle</div></li>
                    </ul>
                </div>
            </div>
            
            
              
        </div>
        <div class="Mid">
            <div class="grid-container">
            <?php
                include "Temp/Conn.php";
                    $stmt = $pdo->prepare("SELECT * FROM item");
                    $stmt->execute();
                    $res = $stmt->fetchAll();
                    for($i = 0;$i<count($res);$i++){
                        echo '<div class="container"><img src=IMAGE/'. $res[$i]["Name"].' height="90%" width="300vw"  alt="'.$res[$i]["Name"].'" class="item"  ></div>';
                        
                    }
                    
                ?>
                
            </div>
        </div>
    </div>
    
    <script>
         
        $('.item').click(function(){
            var x = $(this).attr('src');
            
            document.cookie = "name = " + x.substring(6);
            setTimeout(function() { window.open("item.php" ,"_self");},500);
            
        });
        
        window.addEventListener('scroll',(event)=>{    
            $('.fix').css("margin-top",$(window).scrollTop());
            console.log($(window).scrollTop());
        })
        
    </script>
    
</body>
</html>