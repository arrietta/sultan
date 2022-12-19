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
            background-image:url("IMAGE/Back.png");
            background-size:cover;
            transition :0.5s;
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
        
        a{
            text-decoration-line:none ;
        }
        .vericaltext{
            writing-mode: vertical-lr;
            text-orientation: upright;
        }
        .box{
            transition :0.5s;
            text-align:center;
            margin-top: 90px;
            position: relative;
            padding: 0;   
            padding-top:20px;
            z-index: 0;
        }
        .box > h1{
            font-size: 8vw;
            line-height: 7vw;
            text-shadow: black 0 0 3px;
            color: #FFFFF1;
        }
        #start:hover{
            text-shadow: black 0 0 7px;
            cursor: pointer;
        }
        @media only screen and (max-width: 680px) {
            .Title{
            font-size: 4vw;
        }
        header{
            height: 10.4vw;
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
        <a href="Account.php"> <h2 class="Title">Account</h2> </a>
        
    </header>
    <div class="box">
        <H1 >WELCOME TO OUR</H1>
        <h1>SDU STORE</h1>
        <H1 id="start">Start</h1>
    </div>
    <script>
        $('#start').click(function(){
            $('body').css("opacity",0.0);
            setTimeout(function() { window.open("Catalog.php" ,"_self");},500);
            
            
            
        });
    </script>
    
    
</body>
</html>