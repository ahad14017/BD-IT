<?php 
 	mysqli_connect("localhost","root","") or die("Couldn't connet to SQL server");
 	
	$mysqli =new mysqli("localhost", "root", "", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");
//	echo "done";
//	mysqli_select_db($con, "estShop") or die("Couldn'ttt select DB");
	

?>
