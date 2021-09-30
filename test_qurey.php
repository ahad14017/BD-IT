<?php 



/// number of products query /// 

	$mysqli =new mysqli("localhost", "estiak", "19941818", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");
		
	$query = $mysqli -> query("SELECT id FROM products");
	
$row = mysqli_num_rows($query); 

echo $row;

///end  number of products query /// 
?>

<?php
$number = file_get_contents("phone_number.txt");
echo $number;

?>

<?php
$number = file_get_contents("email.txt");
echo $number;

?>


<?php 

$poid = 66;

/// number of products query /// 

	$mysqli =new mysqli("localhost", "estiak", "19941818", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");
		
	$query = $mysqli -> query("SELECT * FROM products WHERE id ='$poid'");
	
$row_quantity = $query -> fetch_assoc(); 

$product_quantity = $row_quantity['available'];
echo $product_quantity;

///end  number of products query /// 

// update product query // 

$query = $mysqli -> query("UPDATE products SET available=210 WHERE id = 67");
	


/// end update product // 










?>











