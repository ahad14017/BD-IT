
<?php 
ob_start();
session_start();

	$mysqli =new mysqli("localhost", "root", "", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");
		


if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = $mysqli -> query("SELECT * FROM user WHERE id='$user'");
		$get_user_email =$result -> fetch_assoc();
			$uname_db = $get_user_email['firstName'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SAREE</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to ebuybd online shop</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="/js/homeslideshow.js"></script>
		
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Create a column layout with Flexbox */
.row {
  display: flex;
}

/* Left column (menu) */
.left {
  flex: 20%;
  padding: 15px 0;
}

.left h2 {
  padding-left: 8px;
}

/* Right column (page content) */
.right {
  flex: 80%;
  padding: 15px;
}

/* Style the search box */
#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

/* Style the navigation menu inside the left column */
#myMenu {
  list-style-type: none;
  padding: 0;
  margin: 0;
  
}

#myMenu li a {
  padding: 12px;
  text-decoration: none;
  color: black;
  display: block
}

#myMenu li a:hover {

 background-color: #4CAF50;
 
}



#myMenu a.active {
  background-color: #4CAF50;
  color: white;
}

.footer {
   position: relative;
   left: 0;
   bottom: 0;
  
   background-color: black;
   color: white;
   text-align: center;
}

.home-prodlist-img:hover {
    background-color: #696969;
    border-radius: 8px;
    color: #fff;
}

		</style>
</head>
<body>
	
	<div class="homepageheader" style="position: relative; background-color: #000000;">
			<div class="signinButton loginButton">
				
				
				
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="../image/ebuybdlogo.png">
				</a>
			</div>
			<div class="">
				<div id="srcheader" style="float: right; ">
					<form id="newsearch" method="get" action="../search.php">
					        <input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
	<div class="home-welcome">
			<div class="home-welcome-text" style="background-image: url(../image/homebackgrndimg.png); height: 380px; ">
				<h1 style="margin: 0px; font-size: 50px;">Welcome To BD-IT SHOP</h1>
				<h2 style="margin: 0px; font-size: 20px;">Largest Online Shopp for Electronics Products</h2>
			</div>
		</div>
	
	
	<div class="row">
  <div class="left" style="background-color:#000000; color:white;">
    <h2>Menu</h2>
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category" >
    <ul id="myMenu" >
      <li ><a href="../index1.php"  style = "color: white;">All</a></li>
      <li><a href="../women/saree.php" style = "color: white;">CSS</a></li>
      <li><a href="../women/ornament.php" style = "color: white;">JavaScript</a></li>
      <li><a href="../women/watch.php" class="active"style = "color: white;">PHP</a></li>
      <li><a href="../women/perfume.php" style = "color: white;">Python</a></li>
      <li><a href="../women/hijab.php" style = "color: white;">jQuery</a></li>
      <li><a href="../women/tshirt.php" style = "color: white;">SQL</a></li>
      <li><a href="../women/footwear.php" style = "color: white;">Bootstrap</a></li>
      <li><a href="../women/toilatry.php" style = "color: white;">Node.js</a></li>
    </ul>
  </div>
  
  <div class="right" style="background-color:white;">
    
    <!-- products -->
   
		<div>
		<?php 
			$getposts = $mysqli -> query("SELECT * FROM products WHERE available >='1' AND item ='watch'  ORDER BY id DESC LIMIT 10") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = $getposts -> fetch_assoc()) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 10px 10px 10px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
										<img style = "height: 200px; 
    width: 200px; " src="../image/product/watch/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 12px;">'.$pName.'</span><br> Price: '.$price.' Tk</div>
									</div>
									
								</li>
							</ul>
						';

						}
				}
		?>
			
		</div>
	</div>
	
    
    <!-- end products -->
    
  </div>
  
  
</div>
</div>

<div class="footer">
  <p>Footer</p>
</div>
	
	
	
	
	
	
	
	
	
</body>
</html>