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

        a{
            text-decoration-line:none ;
        }

        .CartContainer{
            display: flex;
            flex-direction :column;
            justify-content:space-between;
	        width: 70%;
	        background-color: #d5dde8;
            border-radius: 20px;
            box-shadow: 0px 10px 20px #1687d933;
            margin: 7.5%;
        }

        .Header{
        	margin: auto;
	        width: 90%;
	        height: 15%;
            display: flex;
	        justify-content: space-between;
	        align-items: center;
        }

        .Heading{
	        font-size: 20px;
	        color: #2F3841;
        }

        .Action{
	        font-size: 14px;
	        color: #E44C4C;
	        cursor: pointer;
	        border-bottom: 1px solid #E44C4C;
        }

        .Cart-Items{
	        margin: auto;
	        width: 90%;
	        height: 30%;
	        display: flex;
	        justify-content: space-between;
	        align-items: center;
        }

        .image-box{
	        width: 15%;
	        text-align: center;
        }

        .about{
	        height: 100%;
	        width: 35%;
        }

        .title_2{
	        padding-top: 10px;
	        line-height: 10px;
	        font-size: 32px;
	        color: #202020;
        }

        .subtitle{
	        line-height: 10px;
	        font-size: 18px;
	        color: #909090;
        }

        .prices{
	        height: 100%;
	        text-align: right;
        }

        .amount{
	        padding-top: 20px;
	        font-size: 26px;
	        color: #202020;
        }

        .remove{
	        padding-top: 5px;
	        font-size: 14px;
	        color: #E44C4C;
	        cursor: pointer;
        }

        .pad{
	        margin-top: 5px;
        }

        hr{
        	width: 66%;
	        float: right;
	        margin-right: 5%;
        }

        .checkout{
	        float: right;
            margin-right: 5%;
	        width: 28%;
        }

        .total{
	        width: 100%;
	        display: flex;
	        justify-content: space-between;
        }

        .Subtotal{
	        font-size: 22px;
	        color: #202020;
        }

        .items{
	        font-size: 16px;
	        color: #909090;
        	line-height: 10px;
        }

        .total-amount{
	        font-size: 36px;
        	color: #202020;
        }

        .button{
        	margin-top: 10px;
        	width: 100%;
        	height: 40px;
	        border: none;
	        background: linear-gradient(to bottom right, #B8D7FF, #8EB7EB);
            border-radius: 20px;
            cursor: pointer;
	        font-size: 16px;
	        color: #202020;
        }

        @media only screen and (max-width: 680px){
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
    
        <?php session_start(); ?>
        <?php
        try {
            $login= $_SESSION['ID'];
            include 'Temp/Conn.php';
            $stmt = $pdo->prepare("SELECT i.Name ,i.price , i.Comment FROM item as i , basket as b where i.Name = b.Name and b.id = '$login';");
            $stmt->execute();
            $res = $stmt->fetchAll();        
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;           
  ?>
    <header>
        <a href="info.php"><h2 class="Title">Info</h2></a>
        <a href="Catalog.php"><h2 class="Title">Catalog</h2></a>
        <a href="index.php"><h1 class="Title">SDU STORE</h1></a>
        <a href="Basket.php"><h2 class="Title">Basket</h2></a>
        <a href="reg.php"> <h2 class="Title">Account</h2> </a> 
    </header>

    <div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Shopping Cart</h3>
   	   	<h5 class="Action">Remove all</h5>
   	   </div>
        <?php 
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        $sum = 0;
        
        for($i = 0;$i < count($res);$i++){
            $sum += $res[$i]['price'];
            echo '<div class="Cart-Items">
        <div class="image-box">
            <img src="IMAGE/'.$res[$i]['Name'].'" style={{ height="240px" }} />
        </div>

        <div class="about">
            <h1 class="title_2">'.substr( $res[$i]['Name'],0,strlen($res[$i]['Name'])-4).'</h1>
            <h3 class="subtitle">'.$res[$i]['Comment'].'</h3>
        </div>

        <div class="prices">
            <div class="amount">'.$res[$i]['price'].'KZT</div>
            
            <form action="" method="post">
            <input type="hidden" id="n" name="n" value="'.$res[$i]['Name'].'" />
            <input class="remove" type="submit" value="Remove"><br>
            </form>
        </div>
        </div>';
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nam = test_input($_POST["n"]);
            $sql = "delete from basket where Name = '$nam'";
            $pdo->exec($sql);
            
            
        }
  
        ?>
        
   	   

   	   
   	 <hr> 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Sub-Total</div>
   	 		<div class="items"><?php echo count($res) ?> items</div>
   	 	</div>
   	 	<div class="total-amount"><?php echo $sum;?></div>
   	 </div>
   	 <button class="button">Checkout</button></div>
    
        
</body>
</html>