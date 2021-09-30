<?php 
ob_start();
session_start();

	$mysqli =new mysqli("localhost", "root", "", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");
		
if (!isset($_SESSION['admin_login'])) {
	include_once('login.php');
	$user = "";
	exit();
	
}
else {
	$user = $_SESSION['admin_login'];
	$result = $mysqli -> query("SELECT * FROM admin WHERE id='$user'");
		$get_user_email = $result -> fetch_assoc();
			$uname_db = $get_user_email['firstName'];
}

?>


<!doctype html>
<html>
	<head>
		<title>Welcome to ebuybd online shop</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body class="home-welcome-text" style="background-image: url(../image/homebackgrndimg2.png);">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="../image/ebuybdlogo.png">
				</a>
			</div>
			<div class="">
				<div id="srcheader" style="background-color: black">
					<form id="newsearch" method="get" action="search_order.php">
					        <?php 
				        	echo '<input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..." value="'.$search_value.'"><input type="submit" value="search" class="srcbutton" >';
				         ?>
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="categolis">
			<table>
				<tr>
					<th>
				<!--		<a href="index.php" style="text-decoration: none;color: #fff;padding: 4px 12px;background-color: #c7587e;border-radius: 12px;">Home</a> -->
					</th>
					<th><a href="addproduct.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #c7587e;border-radius: 12px;">Add Product</a></th>
					<th><a href="newadmin.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #c7587e;border-radius: 12px;">New Admin</a></th>
					<th><a href="allproducts.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #c7587e;border-radius: 12px;">All Products</a></th>
					<th><a href="orders.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;">Orders</a></th>
				</tr>
			</table>
		</div>
		<div>
			<table class="rightsidemenu">
				<tr style="font-weight: bold;" colspan="10" bgcolor="#4DB849">
					<th>Id</th>
					<th>User Id</th>
					<th>Product Id</th>
					<th>Q*P=T</th>
					<th>Order Place</th>
					<th>Mobile</th>
					<th>Order Status</th>
					<th>Order Date</th>
					<th>Delevery Date</th>
					<th>User Name</th>
					<th>User Mobile</th>
					<th>User Email</th>
					<th>Invoice No</th>
					<th>Edit</th>
				</tr>
				<tr>
					<?php include ( "../inc/connect.inc.php");
					$query = "SELECT * FROM orders ORDER BY id DESC";
					$run = $mysqli -> query($query);
					while ($row=$run -> fetch_assoc()) {
						$oid = $row['id'];
						$ouid = $row['uid'];
						$opid = $row['pid'];
						$oquantity = $row['quantity'];
						$oplace = $row['oplace'];
						$omobile = $row['mobile'];
						$odstatus = $row['dstatus'];
						$odate = $row['odate'];
						$ddate = $row['ddate'];
						//getting user info
					//	$query1 = "SELECT * FROM user WHERE id='$ouid'";
					//	$run1 = $mysqli -> query($query1);
					//	$row1=$run1 -> fetch_assoc();
					//	$ofname = $row1['firstName'];
					//	$oumobile = $row1['mobile'];
					//	$ouemail = $row1['email'];
					    $ofname = $row['name'];
						$oumobile = $row['mobile'];
						$ouemail = $row['email'];
							$ouinvoice_no = $row['invoice_no'];

						//product info
						$query2 = "SELECT * FROM products WHERE id='$opid'";
						$run2 = $mysqli -> query($query2);
						$row2=$run2 -> fetch_assoc();
						$opcate = $row2['category'];
						$opitem = $row2['item'];
						$oppicture = $row2['picture'];
						$oprice = $row2['price'];

					
					 ?>
					<th><?php echo $oid; ?></th>
					<th><?php echo $ouid; ?></th>
					<th><?php echo $opid; ?></th>
					<th><?php echo ''.$oquantity.' * '.$oprice.' = '.$oquantity*$oprice.''; ?></th>
					<th><?php echo $oplace; ?></th>
					<th><?php echo $omobile; ?></th>
					<th><?php echo $odstatus; ?></th>
					<th><?php echo $odate; ?></th>
					<th><?php echo $ddate; ?></th>

					<th><?php echo $ofname; ?></th>
					<th><?php echo $oumobile; ?></th>
					<th><?php echo $ouemail; ?></th>
					<th><?php echo $ouinvoice_no; ?></th>
					<th><?php echo '<div class="home-prodlist-img"><a href="editorder.php?eoid='.$oid.'">
									<img src="../image/product/'.$opitem.'/'.$oppicture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
									</a>
								</div>' ?></th>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>