<?php
$page = $_SERVER['PHP_SELF'];
$sec = "300";
?>

<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php 
echo  "<h1>if any order recived, notification sound will play</h1> ";


$mysqli =new mysqli("localhost", "estiak", "19941818", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");


	$query = $mysqli -> query("SELECT id FROM orders");
	
$row = mysqli_num_rows($query); 

//echo $row;





$old_orders = file_get_contents ("old_orders_ratul.txt");

if ($old_orders< $row)
{
    echo "<br> <br><h1>recived new order</h1> <br> 
    <audio controls autoplay>
  
  <source src='notification.mp3' type='audio/mpeg'>
  
</audio>
    
    ";
    
}

file_put_contents ("old_orders_ratul.txt",$row);
?>
    </body>
</html>



