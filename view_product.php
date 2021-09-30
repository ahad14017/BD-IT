
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





if (isset($_REQUEST['pid'])) {
	
	$pid = $mysqli -> real_escape_string($_REQUEST['pid']);
}else {
	include_once('index.php');
}


	// save rating of the produce // 




if (isset($_REQUEST['rat'])) {
	
	$rating = $mysqli -> real_escape_string($_REQUEST['rat']);
}

else {
	
	$rating = 0;
}


//$rating = $_GET['rat'];

if ($rating == 5 )
{
    
    
    $data_base_rating =  $mysqli -> query("SELECT * FROM products WHERE id ='$pid'");
    
    
    $db_rating_result = $data_base_rating -> fetch_assoc(); 

$db_rating = $db_rating_result['rate5'];
    
    $db_rating=$db_rating+1;
    
 $update_rating = $mysqli -> query("UPDATE `products` SET `rate5`=".$db_rating." WHERE `id` = ".$pid."")or die(mysql_error());
 
    
    
}



else if ($rating == 4 )
{
    
    
    $data_base_rating =  $mysqli -> query("SELECT * FROM products WHERE id ='$pid'");
    
    
    $db_rating_result = $data_base_rating -> fetch_assoc(); 

$db_rating = $db_rating_result['rate4'];
    
    $db_rating=$db_rating+1;
    
 $update_rating = $mysqli -> query("UPDATE `products` SET `rate4`=".$db_rating." WHERE `id` = ".$pid."")or die(mysql_error());
 
    
    
}


else if ($rating == 3 )
{
    
    
    $data_base_rating =  $mysqli -> query("SELECT * FROM products WHERE id ='$pid'");
    
    
    $db_rating_result = $data_base_rating -> fetch_assoc(); 

$db_rating = $db_rating_result['rate3'];
    
    $db_rating=$db_rating+1;
    
 $update_rating = $mysqli -> query("UPDATE `products` SET `rate3`=".$db_rating." WHERE `id` = ".$pid."")or die(mysql_error());
 
    
    
}

else if ($rating == 2 )
{
    
    
    $data_base_rating =  $mysqli -> query("SELECT * FROM products WHERE id ='$pid'");
    
    
    $db_rating_result = $data_base_rating -> fetch_assoc(); 

$db_rating = $db_rating_result['rate2'];
    
    $db_rating=$db_rating+1;
    
 $update_rating = $mysqli -> query("UPDATE `products` SET `rate2`=".$db_rating." WHERE `id` = ".$pid."")or die(mysql_error());
 
    
    
}


else if ($rating == 1 )
{
    
    
    $data_base_rating =  $mysqli -> query("SELECT * FROM products WHERE id ='$pid'");
    
    
    $db_rating_result = $data_base_rating -> fetch_assoc(); 

$db_rating = $db_rating_result['rate1'];
    
    $db_rating=$db_rating+1;
    
 $update_rating = $mysqli -> query("UPDATE `products` SET `rate1`=".$db_rating." WHERE `id` = ".$pid."")or die(mysql_error());
 
    
    
}


	// end save rating of the produce // 





$getposts = $mysqli -> query("SELECT * FROM products WHERE id ='$pid'") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
						$row = $getposts -> fetch_assoc();
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						$item = $row['item'];
						$available =$row['available'];
						$rate1 = $row['rate1'];
						$rate2 = $row['rate2'];
						$rate3 = $row['rate3'];
						$rate4 = $row['rate4'];
						$rate5 = $row['rate5'];
						
						$total_rate= $rate1+$rate2+$rate3+$rate4+$rate5;
						
						
$avarage_user_rating = (($rate1*1)+($rate2*2)+($rate3*3)+($rate4*4)+($rate5*5))/$total_rate;						
						
						
						
						
						
					
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						if ($total_rate==0)
						{
						    
						    $avg_of_5=0;
						    $avg_of_4=0;
						    $avg_of_3=0;
						    $avg_of_2=0;
						    $avg_of_1=0;
						    
						    $avarage_user_rating=0;
						    
						}
						else if ($total_rate>0){
						$avg_of_5 = (100/$total_rate)*$rate5;
							$avg_of_4 = (100/$total_rate)*$rate4;
								$avg_of_3 = (100/$total_rate)*$rate3;
									$avg_of_2 = (100/$total_rate)*$rate2;
										$avg_of_1 = (100/$total_rate)*$rate1;
						}
						
				
					$avarage_user_rating=	round($avarage_user_rating, 1);	
				
				
				
			
				
				
				
						
						if ($avarage_user_rating==5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>';
						    
						}
					else	if ($avarage_user_rating>4.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>';
						    
						}
					else if ($avarage_user_rating>4)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>';
						    
						}
						else if ($avarage_user_rating==4)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>';

						    
						}
						
							else if ($avarage_user_rating>3.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating>3)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating==3)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating>2.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating>2)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating==2)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						
						else if ($avarage_user_rating>1.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
					else if ($avarage_user_rating>1)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}	
else if ($avarage_user_rating==1)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						else if ($avarage_user_rating>0.5)
						{
						    
						    $star = '<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						else if ($avarage_user_rating>0)
						{
						    
						    $star = '<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						else if ($avarage_user_rating==0)
						{
						    
						    $star = '<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
					
				
					
					
					
			
						
						$sold = '<div style="background: #ff4141!important;" class="moto-widget-store-main_item-label moto-text_219"><center> OUT OF STOCK!</center> </div>';
						
						
						if($available==0)
                            {
                                
                               $sold_item =  $sold ; 
                                
                            }
                            else {$sold_item = " ";}
						
						
						
						
						
					}	

?>

<?php 
ob_start();

	$mysqli =new mysqli("localhost", "root", "", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");
		
		

//session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = $mysqli -> query("SELECT * FROM user WHERE id='$user'");
		$get_user_email = $result -> fetch_assoc();
			$uname_db = $get_user_email['firstName'];
}
?>



<!DOCTYPE html>
<html lang="en" data-ng-app="website">

<!-- Mirrored from template59527.motopreview.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jun 2020 19:03:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    
    <meta charset="UTF-8">
  <title>BD-IT SHOP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
            <meta charset="utf-8">
        <title>Store Home</title>
        <link rel="SHORTCUT ICON" href="mt-demo/59500/59527/mt-content/uploads/2017/05/favicon8f93.ico?_build=1592075016" type="image/vnd.microsoft.icon" />

                                    
<link rel="canonical" href="store/index.html" />
<meta property="og:title" content="Store Home"/>
<meta property="og:url" content="store/index.html"/>
<meta property="og:type" content="website"/>
                            <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    
            <link rel="stylesheet" href="mt-includes/css/assets.min6365.css?_build=1591956512"/>
        <style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic|Raleway:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Roboto:regular,100,100italic,300,300italic,italic,500,500italic,700,700italic,900,900italic&amp;subset=latin-ext,greek-ext,greek,latin,vietnamese,cyrillic-ext,cyrillic);


 @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }

h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }







* {
  box-sizing: border-box;
}



.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}














.srcbutton {
	color: #fff !important;
text-transform: uppercase;
text-decoration: none;
background: #60a3bc;
padding: 20px;
border-radius: 50px;
display: inline-block;
border: none;
transition: all 0.4s ease 0s;
}
.srcbutton:hover {
    
    
    text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.4s ease 0s;
    
    
    
	text-decoration: none;
	background: #DC143C;
}

</style>
        <link rel="stylesheet" href="mt-demo/59500/59527/mt-content/assets/stylesffb1.css?_build=1591958657" id="moto-website-style"/>
            
    
    
    
    
    
    
    <link href="mt-demo/59500/59527/mt-content/plugins/moto-store-plugin/src/public/assets/css/main1b96.css?v=1.5.3" rel="stylesheet" type="text/css" />
    
    
</head>
<body class="moto-background moto-website_live">
        
    
             

    <div class="page">

        <header id="section-header" class="header moto-section" data-widget="section" data-container="section">
                                    <div class="moto-widget moto-widget-row row-fixed moto-justify-content_center moto-bg-color3_5 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="" data-bg-position="left top" data-draggable-disabled="">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-6" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="" data-draggable-disabled="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_system_2"><a href="" data-action="call" class="moto-link">
<?php
$number = file_get_contents("phone_number.txt");
echo $number;

?></a></p></div>
</div>
































</div><div class="moto-widget moto-widget-row__column moto-cell col-sm-6" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div id="wid_1547716638_scu7akicq" data-widget-id="wid_1547716638_scu7akicq" class="moto-widget moto-widget-social-links-extended moto-preset-default moto-align-right moto-align-left_mobile-h moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="social_links_extended" data-preset="default">
        <ul class="moto-widget-social-links-extended__list">
                <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-1">
            <a href="#" class="moto-widget-social-links-extended__link" target="_self" >
                <span class="moto-widget-social-links-extended__icon fa fa-facebook"></span>
            </a>
        </li>
                <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-2">
            <a href="#" class="moto-widget-social-links-extended__link" target="_self" >
                <span class="moto-widget-social-links-extended__icon fa fa-twitter"></span>
            </a>
        </li>
                <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-3">
            <a href="#" class="moto-widget-social-links-extended__link" target="_self" >
                <span class="moto-widget-social-links-extended__icon fa fa-pinterest"></span>
            </a>
        </li>
            </ul>
    <style type="text/css">
                                            </style>
    </div></div>

                
            
        </div>
    </div>
</div><div class="moto-widget moto-widget-container moto-container_header_5c404c7e2" data-widget="container" data-container="container" data-css-name="moto-container_header_5c404c7e2" data-bg-position="top">
    
    
    
<div class="moto-widget moto-widget-row row-fixed moto-justify-content_center moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="sasa" style="" data-bg-position="left top">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-4" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-visible-on="-" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_system_1"><a target="_self" data-action="home_page" data-anchor="" class="moto-link" href="index.html"></a><span class="moto-content-image-plugin-wrapper moto-spacing-top-zero moto-spacing-right-zero moto-spacing-bottom-zero moto-spacing-left-zero"><span class="moto-content-image-container"><img class="moto-content-image" data-path="2017/05/mt-953_header_logo01.png" data-id="1182" alt="" width="51" height="43" src="mt-demo/59500/59527/mt-content/uploads/2017/05/mt-953_header_logo01.png"></span></span><a target="_self" data-action="home_page" data-anchor="" class="moto-link" href="index1.php">BD-IT SHOP</a></p></div>
</div></div><div class="moto-widget moto-widget-row__column moto-cell col-sm-4" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div data-widget-id="wid__store_search__5c3f4e3ac2af8" class="moto-widget moto-widget-store_search moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-preset="default" data-type=""
    data-widget="store_search" >
        <div store-search-widget>
        <form id="newsearch" method="get" action="search.php" class="search-form on">
            

<label class="search-form_label">
                <input type="text" name="keywords" autocomplete="off" value="" placeholder= "SEARCH YOUR PRODUCT" class="search-form_input"><span
                        class="search-form_liveout"></span>
            </label>
            <span class="search-form_submit fa-search"></span>
        </form>
        
        
        
        
        
        
    </div>
</div>




</div><div class="moto-widget moto-widget-row__column moto-cell col-sm-4" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    



<div data-widget-id="wid__store_cart_and_profile__5c3f4e3ac3246" class="moto-widget moto-widget-store_cart_and_profile moto-preset-default moto-align-right moto-align-center_mobile-h moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto moto-widget-empty" data-widget="store_cart_and_profile">
        <ul class="moto-widget-store_cart_and_profile-container moto-widget" data-store-cart-widget data-widget="text">
        <li class="moto-widget-store_cart_and_profile-item moto-widget-store_cart_and_profile-item__cart moto-widget-text " >
            <a class="moto-widget-store_cart_and_profile-link" ng-click="handleToCart()" >
                <i class="fa fa-shopping-cart"></i>
                                <span class="moto-widget-store_cart_and_profile-text moto-text_system_13" data-widget="text">My Cart (<span ng-bind="widget.items_in_cart">0</span>)</span>
                                </a>
        </li>
                    <li class="moto-widget-store_cart_and_profile-item moto-widget-store_cart_and_profile-item__compare">
                <a class="moto-widget-store_cart_and_profile-link" ng-click="handleToCompare()">
                    <i class="fa fa-balance-scale"></i>
                    <span class="moto-widget-store_cart_and_profile-text moto-text_system_13">(<span ng-bind="widget.items_in_compare">0</span>)</span>
                </a>
            </li>
        
        <li class="moto-widget-store_cart_and_profile-item moto-widget-store_cart_and_profile-item__compare" ng-if="widget.items_in_wish > 0">
            <a class="moto-widget-store_cart_and_profile-link" ng-click="handleToWish()">
                <i class="fa fa-heart"></i>
                <span class="moto-widget-store_cart_and_profile-text moto-text_system_13">(<span ng-bind="widget.items_in_wish">0</span>)</span>
            </a>
        </li>

        <li class="moto-widget-store_cart_and_profile-item moto-widget-store_cart_and_profile-item__profile">
            <a class="moto-widget-store_cart_and_profile-link" ng-click="handleTargetPage()">
                <i class="fa fa-user"></i>
                <span ng-if="widget.customer" class="moto-widget-store_cart_and_profile-username moto-text_system_13">
                    <span ng-bind="widget.customer.first_name"></span> <span ng-bind="widget.customer.last_name"></span>
                </span>
            </a>
        </li>
        <li class="moto-widget-store_cart_and_profile-item moto-widget-store_cart_and_profile-item__logout" ng-if="widget.customer">
            <a class="moto-widget-store_cart_and_profile-link" ng-click="logout()">
                <i class="fa fa-sign-out"></i>
            </a>
        </li>

    </ul>

                
</div></div>

                
            
        </div>
    </div>
</div><div class="moto-widget moto-widget-container moto-container_header_59117bce68904" data-widget="container" data-container="container" data-css-name="moto-container_header_59117bce68904" data-bg-position="left top" data-moto-sticky="{}">
    
    
<div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="" data-bg-position="left top">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-12" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div data-widget-id="wid__menu__5c3f4e3ac4e8f" class="moto-widget moto-widget-menu moto-preset-default moto-align-center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-preset="default" data-widget="menu">
            <a href="#" class="moto-widget-menu-toggle-btn"><i class="moto-widget-menu-toggle-btn-icon fa fa-bars"></i></a>
        <ul class="moto-widget-menu-list moto-widget-menu-list_horizontal">
            <li class="moto-widget-menu-item">
            	 
            	 <a href="index1.php"   data-action="store.category" class="moto-widget-menu-link moto-widget-menu-link-level-1 moto-link">Home</a>
            	 
            	 
            	 
        </li><li class="moto-widget-menu-item">
            
            <a href="index1.php"   data-action="store.category" class="moto-widget-menu-link moto-widget-menu-link-level-1 moto-link">All Products</a>
            
   
        </li><li class="moto-widget-menu-item">
    <a href="delivery-information/index.php"   data-action="store.category" class="moto-widget-menu-link moto-widget-menu-link-level-1 moto-link">Delivery Information</a>
        </li>
        
        
        <li class="moto-widget-menu-item">
    <a href="terms-conditions/index.php"   data-action="store.category" class="moto-widget-menu-link moto-widget-menu-link-level-1 moto-link">Terms & Conditions</a>
        </li>
        
        
        
        <li class="moto-widget-menu-item">
            
            
    <a href="contact-us/index.php"   data-action="store.category" class="moto-widget-menu-link moto-widget-menu-link-level-1 moto-link">Contact Us</a></li>
    
    <li class="moto-widget-menu-item">
    <a href="about-us/index.php"   data-action="store.category" class="moto-widget-menu-link moto-widget-menu-link-level-1 moto-link">About Us</a>
        </li>
              </ul>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>

                
            
        </div>
    </div>
</div></div><div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="" data-bg-position="left top">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-3" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    


</div>





<div class="moto-widget moto-widget-row__column moto-cell col-sm-9" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div id="wid_1581610070_xbumv76vq" class="moto-widget moto-widget-content_slider moto-widget_interactive moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto   moto-widget-content_slider-pager-visible-on_tablet_hidden moto-widget-content_slider-pager-visible-on_mobile-h_hidden moto-widget-content_slider-pager-visible-on_mobile-v_hidden moto-widget__state_loading" data-widget="content_slider" data-preset="default"  data-moto-content-slider="{&quot;preferences&quot;:{&quot;startAnimation&quot;:&quot;onArriving&quot;},&quot;options&quot;:{&quot;auto&quot;:true,&quot;pause&quot;:3000,&quot;mode&quot;:&quot;fade&quot;,&quot;controls&quot;:false,&quot;pager&quot;:true,&quot;autoControls&quot;:false}}">
            <div id="wid_1581610070_xbumv76vq__loader" class="moto-widget-loader">
            <div class="moto-widget-loader__indicator"></div>
        </div>
        <div class="moto-widget__content-wrapper">
        
            </div>
</div></div>

                
            
        </div>
    </div>
</div></div>            
        </header>

        <section id="section-content" class="content page-9 moto-section" data-widget="section" data-container="section">
                                    <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="maaa" style="" data-bg-position="left top">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                


                
            
        </div>
    </div>
</div>






<div class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="mama" style="" data-bg-position="left top">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-12" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aama" data-visible-on="-" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><h2 class="moto-text_system_8"></h2></div>
</div>







<div data-widget-id="wid_1581608300_5swfujjtg" class="moto-widget moto-widget-store-product-grid_custom moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto "
     data-widget="store_product_grid" data-preset="default" >
            
            

		
		<?php 
			echo '
		<div style="float: left;">
				<div>
					<img src="image/product/'.$item.'/'.$picture.'" style="height: 350px; width: 350px; padding: 2px; border: 2px solid;">'.$sold_item.'
				</div>
		</div>
				<div style="float: left;width: 70%;color:black;background-color: white;padding: 10px;">
					<div style="">
					<br>
						<h3 style="font-size: 25px; font-weight: bold; ">'.$pName.'</h3><hr>
						<h3 style="padding: 1px 0 0 0; font-size: 20px; color:#FF0000;">Price: '.$price.' &#2547; </h3><hr>
						
						</div>
					
					
					<!-- here was the code --> 	
					
					<h3 style="padding: 20px 0 5px 0; font-size: 20px;">Want to buy this product? </h3>
							<div id="srcheader">
								<form id="" method="post" action="orderform.php?poid='.$pid.'">
								        <input type="submit" value="Order Now"  class="srcbutton">
								</form>
								<div class="srcclear"></div>
							</div>
					
					

			</div>
					
		
		


<div style="padding: 0px 20px;  margin: 0 auto; display: table; width: 98%;">

<br>
<h3 style="padding: 1px 0 0 0; font-size: 22px; ">Description:</h3>
						<p style = "text-align: justify;text-justify: inter-word;"><!-- <span style = "user-select: none;"> -->
							'.$description.'
						</span></p>

	
	
	
	<!-- adding rating -->
	
	
	<br> 
	

<span class="heading">User Rating</span>



'.$star.'





<p>  '. $avarage_user_rating.' average based on '.$total_rate.' reviews.</p>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div style = "width: '.$avg_of_5.'%; height: 18px; background-color: #4CAF50;"></div>
    </div>
  </div>
  <div class="side right">
    <div>'.$rate5.'</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div style = "width: '.$avg_of_4.'%; height: 18px; background-color: #2196F3;"></div>
    </div>
  </div>
  <div class="side right">
    <div>'.$rate4.'</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div style = "width: '.$avg_of_3.'%; height: 18px; background-color: #00bcd4;"></div>
    </div>
  </div>
  <div class="side right">
    <div>'.$rate3.'</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div style = "width: '.$avg_of_2.'%; height: 18px; background-color: #ff9800;"></div>
    </div>
  </div>
  <div class="side right">
    <div>'.$rate2.'</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div style = "width: '.$avg_of_1.'%; height: 18px; background-color: #f44336;"></div>
    </div>
  </div>
  <div class="side right">
    <div>'.$rate1.'</div>
  </div>
</div>

	
	
	
	
	
	
	<!-- end adding rating --> 
	
	
	
	<br> 
	
	<br> 
	
	<h1>Rate This Product.</h1>

<form method = "get"   action="view_product.php?pid=">
<fieldset class="rating">
<input type="text" id="star6" name="pid" value="'.$pid.'"  />
    <input type="submit" id="star5" name="rat" value="5"  /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    
    
    <input type="submit" id="star4" name="rat" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    
    <input type="submit" id="star3" name="rat" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    
    <input type="submit" id="star2" name="rat" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    
    <input type="submit" id="star1" name="rat" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    
</fieldset>

</form>
	
	
	
	
	

</div> 








			';
		?>
		
		
		
		
		
		
		
		
		
		
		
		

	
	<div style="padding: 0px 20px; font-size: 25px; margin: 0 auto; display: table; width: 98%;">
	    </br> </br> 
	    
		<h3 style="padding-bottom: 20px">Recommand Product For You:</h3>
		<div>
		<?php 
		
		
$sold = '<div style="background: #ff4141!important;" class="moto-widget-store-main_item-label moto-text_219">SOLD!</div>';

		
			$getposts = $mysqli -> query("SELECT * FROM products WHERE available >='0' AND id != '".$pid."' AND item ='".$item."'  ORDER BY RAND() LIMIT 100") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					echo ' <div class="row">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						$available = $row['available'];
							$rate1 = $row['rate1'];
						$rate2 = $row['rate2'];
						$rate3 = $row['rate3'];
						$rate4 = $row['rate4'];
						$rate5 = $row['rate5'];
						
						$total_rate= $rate1+$rate2+$rate3+$rate4+$rate5;
						
		
if (isset($_REQUEST['rat'])) {
	
	$avarage_user_rating = (($rate1*1)+($rate2*2)+($rate3*3)+($rate4*4)+($rate5*5))/$total_rate;
}	
		
						
						
				
						
						if ($total_rate==0)
						{
						    
						    $avg_of_5=0;
						    $avg_of_4=0;
						    $avg_of_3=0;
						    $avg_of_2=0;
						    $avg_of_1=0;
						    
						    $avarage_user_rating=0;
						    
						}
						else if ($total_rate>0){
						$avg_of_5 = (100/$total_rate)*$rate5;
							$avg_of_4 = (100/$total_rate)*$rate4;
								$avg_of_3 = (100/$total_rate)*$rate3;
									$avg_of_2 = (100/$total_rate)*$rate2;
										$avg_of_1 = (100/$total_rate)*$rate1;
						}
						
				
					$avarage_user_rating=	round($avarage_user_rating, 1);	
				
				
				
			
				
				
				
						
						if ($avarage_user_rating==5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>';
						    
						}
					else	if ($avarage_user_rating>4.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>';
						    
						}
					else if ($avarage_user_rating>4)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>';
						    
						}
						else if ($avarage_user_rating==4)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>';

						    
						}
						
							else if ($avarage_user_rating>3.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating>3)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating==3)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating>2.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating>2)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
							else if ($avarage_user_rating==2)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						
						else if ($avarage_user_rating>1.5)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
					else if ($avarage_user_rating>1)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}	
else if ($avarage_user_rating==1)
						{
						    
						    $star = '<span class="fa fa-star checked"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						else if ($avarage_user_rating>0.5)
						{
						    
						    $star = '<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						else if ($avarage_user_rating>0)
						{
						    
						    $star = '<span class="fa fa-star-half-full checked" ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						else if ($avarage_user_rating==0)
						{
						    
						    $star = '<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star "></span>';
						    
						}
						
						
						
						if($available==0)
                            {
                                
                               $sold_item =  $sold ; 
                                
                            }
                            else {$sold_item = " ";}
						
						
						
						
						echo '
						 <ul style="float: left; padding: 10px 20px 20px 20px;">
								
    
    <div >
                    <div class="moto-widget-store-main_item moto-widget-store-image-block ">

                                                    <div class="moto-widget moto-widget-image moto-preset-default" data-preset="default"  data-widget="image">
                                <a class="moto-widget-image-link  moto-link" href="view_product.php?pid='.$id.'">
                                                                                                                        <img  style = "height: 240px; 
    width: 240px; " data-src="image/product/'.$item.'/'.$picture.'" class="moto-widget-image-picture lazyload">'.$sold_item .'
                                                                                                                                                </a>
                            </div>
                                                <div class="moto-text_system_13 moto-widget moto-widget-text" data-widget="text">
                            <div class="moto-text_system_13">
                                <a href="view_product.php?pid='.$id.'" class="moto-widget-store-main_item-title ">
                                    <span style = "font-size: 16px;">'.$pName.'</span>
                                </a>
                            </div>


                        </div>

                        <div class="store-product-element-container">
                            
                            
                                                                    <div class="moto-widget-store-main_item-price moto-widget moto-widget-text" data-widget="text">
                                        <span class="moto-text_system_14">Price: '.$price.' &#2547; </span>
                                        <br>
                                        <p>&nbsp;</p>'.$star.'
                                    </div>
                                                            

                                                    </div>
                                                    <div class="moto-widget moto-widget-button moto-preset-4 store-product-element-container"  data-widget="button"
                                 data-store-product-add-to-cart="" data-product-id="15" data-location="/store/cart/"  data-autoredirect="1">
                                <a  class="moto-widget-button-link moto-size-medium" href="view_product.php?pid='.$id.'">
                                    <span class="fa moto-widget-theme-icon"></span>
                                    <span class="moto-widget-button-label">PURCHASE</span>
                                </a>
                            </div>
                                            </div>
                </div>
                
               
							</ul>
                
                
                ';
						
						
						
						
						
						

						}
					echo '</div>';	
				}
		?>
		
		
		
		
		
		
		</div>
		</div> 
		
		
		
		
		
		
		
		
		
		
		
		

            <div class="row">
                            
                      <!-- here to add product -->       
                           
                            
                    </div>
    </div>




</div>

                
            
        </div>
    </div>
</div><div class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="mama" style="" data-bg-position="left top">
    
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
    
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="mama" data-visible-on="-" data-animation="">
   
</div><div data-widget-id="wid_1548065666_0uagn29w5" class="moto-widget moto-widget-store-product-grid_custom moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto "
     data-widget="store_product_grid" data-preset="default" >
            
            <div class="row">
                            
                            
                            
                            
                    </div>
    </div>












</div>

                
            
        </div>
    </div>
</div><div class="moto-widget moto-widget-row row-fixed moto-bg-color5_3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="" data-bg-position="left top" data-draggable-disabled="">
    
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
    
    
<div class="moto-widget moto-widget-row row-gutter-0 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="" data-bg-position="left top" data-draggable-disabled="">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-4" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-container moto-container_content_5911982623" data-widget="container" data-container="container" data-css-name="moto-container_content_5911982623" data-bg-position="left top">
    
    
<div class="moto-widget moto-widget-container moto-container_content_5911995726" data-widget="container" data-container="container" data-css-name="moto-container_content_5911995726" data-bg-position="right">
    
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-lefWorldwidet-auto" data-widget="text" data-preset="default" data-spacing="lala" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><h2 class="moto-text_system_6"><a data-action="page" data-id="8" class="moto-link" href="0901-1000/mt-0953/index.html">Free Shipping</a></h2><h2 class="moto-text_system_8"><span class="moto-color5_5">on orders over &#2547; 5000</span></h2></div>
</div>










</div></div></div><div class="moto-widget moto-widget-row__column moto-cell col-sm-4" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-container moto-container_content_5911992524" data-widget="container" data-container="container" data-css-name="moto-container_content_5911992524" data-bg-position="left top" data-draggable-disabled="">
    
    
<div class="moto-widget moto-widget-container moto-container_content_5911996e27" data-widget="container" data-container="container" data-css-name="moto-container_content_5911996e27" data-bg-position="right" data-draggable-disabled="">
    
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="lala" data-animation="" data-draggable-disabled="">
    <div class="moto-widget-text-content moto-widget-text-editable"><h2 class="moto-text_system_6"><a data-action="page" data-id="8" class="moto-link" href="0901-1000/mt-0953/index.html">Fast Delivery&nbsp;</a></h2><h2 class="moto-text_system_8"><span class="moto-color5_5">All over the Country</span></h2></div>
</div>









</div></div></div><div class="moto-widget moto-widget-row__column moto-cell col-sm-4" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-container moto-container_content_5911993325" data-widget="container" data-container="container" data-css-name="moto-container_content_5911993325" data-bg-position="right">
    
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="lala" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><h2 class="moto-text_system_6"><a data-action="page" data-id="8" class="moto-link" href="0901-1000/mt-0953/index.html">Big Choice </a></h2><h2 class="moto-text_system_8"><span class="moto-color5_5">of Products</span></h2></div>
</div>









</div></div>

                
            
        </div>
    </div>
</div></div>

                
            
        </div>
    </div>
</div>                                        <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aama" style="" data-bg-position="left top" data-visible-on="-">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-12" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div data-widget-id="wid_1581609594_ip81n3igv" class="moto-widget moto-widget-blog-recent_posts moto-preset-default moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto " data-widget="blog.recent_posts">
                        <div class="moto-widget-blog-recent_posts-title">
                <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto moto-align-left" data-preset="default" data-spacing="aasa">
                    <div class="moto-widget-text-content moto-widget-text-editable">
                        <p class="moto-text_system_8">Product features</p>
                    </div>
                </div>
            </div>
        
        <div class="moto-widget moto-widget-row" data-widget="row">
        <div class="container-fluid">
            <div class="row moto-widget-blog-recent_posts-list">
            
                <div class="moto-cell col-sm-4 moto-widget-blog-recent_posts-item">
                    <div class="moto-widget-blog-recent_posts-item__content  moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto">

                                            <div class="moto-widget-blog-recent_posts-item-preview">
                                                            <div data-widget-id="wid__image__5ee5230ce2faf" class="moto-widget moto-widget-image moto-preset-5 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="image">
                        <a href="#"   data-action="url" class="moto-widget-image-link moto-link">
                <img data-src="/mt-demo/59500/59527/mt-content/uploads/2017/05/mt-953_blog_img-08.jpg" class="moto-widget-image-picture lazyload" data-id="" title="Best quality" alt="">
            </a>
            </div>
                                                    </div>
                    
                    <div class="moto-widget-blog-recent_posts-item-title">
                        <div class="moto-widget moto-widget-text moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto moto-align-left" data-preset="default" data-spacing="aasa">
                            <div class="moto-widget-text-content moto-widget-text-editable">
                                <h2 class="blog-post-title moto-text_222">
                                    <a href="">Best quality</a>
                                </h2>
                            </div>
                        </div>
                    </div>

                                        <div class="moto-widget moto-widget-row" data-widget="row">
                        <div class="container-fluid">
                            <div class="row">

                                                                <div class="moto-cell col-sm" data-container="container">
                                                                            <div data-widget-id="wid__blog_post_published_on__5ee5230ce3573" class="moto-widget moto-widget-blog-post_published_on moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-preset="default" data-widget="blog.post_published_on" data-spacing="aasa">
    <div class="moto-text_289">
        <span class="fa fa-calendar moto-widget-blog-post_published_on-icon"></span><span class="moto-widget-blog-post_published_on-date">
                            01.06.2016
                    </span>
    </div>
</div>
                                                                    </div>
                                
                                                                <div class="moto-cell col-sm" data-container="container">
                                                                            <div data-widget-id="wid__blog_post_author__5ee5230ce3ce1" class="moto-widget moto-widget-blog-post-author moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-widget="blog.post_author" data-preset="default">
    <div class="moto-text_289">
       
    </div>
</div>
                                                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    

                                            <div class="moto-widget-blog-recent_posts-item__post_description moto-widget-text moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto">
                                                        <p class="moto-text_normal">Quality is our first priority so.BD-IT SHOP provides the best quality of products all over the country and all our products are truly authentic. We believe in the quality of our products and all our products go through our quality control process. So you can have faith in our products and and all our products are from verified vendors. Our products are worth it to buy. We genuinely care about our customers and we always try to sell the best quality products to our customers.</p>                                                    </div>
                    
                                                                        <div data-widget-id="wid__button__5ee5230ce55a7" class="moto-widget moto-widget-button moto-preset-2 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="button">
            
    </div>
                                            
                    </div>
                </div>

            
                <div class="moto-cell col-sm-4 moto-widget-blog-recent_posts-item">
                    <div class="moto-widget-blog-recent_posts-item__content  moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto">

                                            <div class="moto-widget-blog-recent_posts-item-preview">
                                                            <div data-widget-id="wid__image__5ee5230ce5a50" class="moto-widget moto-widget-image moto-preset-5 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="image">
                        <a href=""   data-action="url" class="moto-widget-image-link moto-link">
                <img data-src="/mt-demo/59500/59527/mt-content/uploads/2017/05/mt-953_blog_img-07.jpg" class="moto-widget-image-picture lazyload" data-id="" title="Warranty of products" alt="">
            </a>
            </div>
                                                    </div>
                    
                    <div class="moto-widget-blog-recent_posts-item-title">
                        <div class="moto-widget moto-widget-text moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto moto-align-left" data-preset="default" data-spacing="aasa">
                            <div class="moto-widget-text-content moto-widget-text-editable">
                                <h2 class="blog-post-title moto-text_222">
                                    <a href="">Warranty of products</a>
                                </h2>
                            </div>
                        </div>
                    </div>

                                        <div class="moto-widget moto-widget-row" data-widget="row">
                        <div class="container-fluid">
                            <div class="row">

                                                                <div class="moto-cell col-sm" data-container="container">
                                                                            <div data-widget-id="wid__blog_post_published_on__5ee5230ce5c81" class="moto-widget moto-widget-blog-post_published_on moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-preset="default" data-widget="blog.post_published_on" data-spacing="aasa">
    <div class="moto-text_289">
        <span class="fa fa-calendar moto-widget-blog-post_published_on-icon"></span><span class="moto-widget-blog-post_published_on-date">
                            01.06.2016
                    </span>
    </div>
</div>
                                                                    </div>
                                
                                                                <div class="moto-cell col-sm" data-container="container">
                                                                            <div data-widget-id="wid__blog_post_author__5ee5230ce5d10" class="moto-widget moto-widget-blog-post-author moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-widget="blog.post_author" data-preset="default">
    <div class="moto-text_289">
        
    </div>
</div>
                                                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    

                                            <div class="moto-widget-blog-recent_posts-item__post_description moto-widget-text moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto">
                                                        <p class="moto-text_normal">BD-IT SHOP provides warranty service of 7 days return policy for all our products if there is a manufacturing problem.so if there is any manufacturing problem we will replace our product as soon as possible.</p>                                                    </div>
                    
                                                                        <div data-widget-id="wid__button__5ee5230ce6a58" class="moto-widget moto-widget-button moto-preset-2 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="button">
            
    </div>
                                            
                    </div>
                </div>

            
                <div class="moto-cell col-sm-4 moto-widget-blog-recent_posts-item">
                    <div class="moto-widget-blog-recent_posts-item__content  moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto">

                                            <div class="moto-widget-blog-recent_posts-item-preview">
                                                            <div data-widget-id="wid__image__5ee5230ce6d9e" class="moto-widget moto-widget-image moto-preset-5 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="image">
                        <a href=""   data-action="url" class="moto-widget-image-link moto-link">
                <img data-src="/mt-demo/59500/59527/mt-content/uploads/2017/05/mt-953_blog_img-06.jpg" class="moto-widget-image-picture lazyload" data-id="" title="Fast delivery system" alt="">
            </a>
            </div>
                                                    </div>
                    
                    <div class="moto-widget-blog-recent_posts-item-title">
                        <div class="moto-widget moto-widget-text moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto moto-align-left" data-preset="default" data-spacing="aasa">
                            <div class="moto-widget-text-content moto-widget-text-editable">
                                <h2 class="blog-post-title moto-text_222">
                                    <a href="">Fast delivery systemt</a>
                                </h2>
                            </div>
                        </div>
                    </div>

                                        <div class="moto-widget moto-widget-row" data-widget="row">
                        <div class="container-fluid">
                            <div class="row">

                                                                <div class="moto-cell col-sm" data-container="container">
                                                                            <div data-widget-id="wid__blog_post_published_on__5ee5230ce6e57" class="moto-widget moto-widget-blog-post_published_on moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-preset="default" data-widget="blog.post_published_on" data-spacing="aasa">
    <div class="moto-text_289">
        <span class="fa fa-calendar moto-widget-blog-post_published_on-icon"></span><span class="moto-widget-blog-post_published_on-date">
                            01.06.2016
                    </span>
    </div>
</div>
                                                                    </div>
                                
                                                                <div class="moto-cell col-sm" data-container="container">
                                                                            <div data-widget-id="wid__blog_post_author__5ee5230ce6ec9" class="moto-widget moto-widget-blog-post-author moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-widget="blog.post_author" data-preset="default">
    <div class="moto-text_289">
        
    </div>
</div>
                                                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    

                                            <div class="moto-widget-blog-recent_posts-item__post_description moto-widget-text moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto">
                                                        <p class="moto-text_normal">BD-IT SHOP always tries to deliver our products to our customers as soon as they place their order on our website. We contact our customers immediately after placing the order. We care about our customer needs so we always try to deliver our products as soon as possible.</p>                                                    </div>
                    
                                                                        <div data-widget-id="wid__button__5ee5230ce7673" class="moto-widget moto-widget-button moto-preset-2 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="button">
            
    </div>
                                            
                    </div>
                </div>

                        </div>
        </div>
    </div>
    
        </div>









</div>

                
            
        </div>
    </div>
</div>            
        </section>
    </div>

    <footer id="section-footer" class="footer moto-section" data-widget="section" data-container="section" data-moto-sticky="{mode:'smallHeight', direction:'bottom', mobile: 0}">
                                <div class="moto-widget moto-widget-row row-fixed moto-bg-color3_3 moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="lama" style="" data-bg-position="left top">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-2" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aasa" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_223">Categories</p></div>
</div>
















<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sama" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_224"><a data-action="store.category" data-id="7" class="moto-link" data-keyword="laptops" href="index1.php">ALL CATEGORIES</a><br><a data-action="store.category" data-id="8" class="moto-link" data-keyword="cell-phones" href="PC_ACCESSORIES.php">PC ACCESSORIES</a><br><a data-action="store.category" data-id="9" class="moto-link" data-keyword="audio" href="MOBILE_ACCESSORIES.php">MOBILE ACCESSORIES</a><br><a data-action="store.category" data-id="10" class="moto-link" data-keyword="tablets" href="MUSIC_SYSTEMS.php">MUSIC SYSTEMS</a><br><a data-action="store.category" data-id="11" class="moto-link" data-keyword="tvs" href="TV_&_ANDROID_TV_BOX.php">TV & ANDROID TV BOX</a><br><a data-action="store.category" data-id="12" class="moto-link" data-keyword="wearable-tech" href="WIFI_ROUTER.php">WIFI ROUTER</a><br><a data-action="store.category" data-id="13" class="moto-link" data-keyword="computers-office" href="OTHERS.php">OTHERS</a></p></div>
</div>

















</div><div class="moto-widget moto-widget-row__column moto-cell col-sm-2" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aasa" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_223">Information</p></div>
</div>

















<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sama" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_224"><a href="about-us/index.html" data-action="page" data-id="30" class="moto-link">About Us</a><br><a href="delivery-information/index.html" data-action="page" data-id="22" class="moto-link">Delivery Information</a><br><a href="contact-us/index.html" data-action="page" data-id="25" class="moto-link">Contact Us</a><br></p></div>
</div>















</div><div class="moto-widget moto-widget-row__column moto-cell col-sm-3" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aasa" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_223">Contact Us</p></div>
</div>














<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sama" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_224">BD-IT SHOP</p><p class="moto-text_224"><a href="" data-action="call" class="moto-link"><?php
$number = file_get_contents("phone_number.txt");
echo $number;

?>
</a></p><p class="moto-text_224"><a data-action="mail" class="moto-link" href="mailto:"><?php
$number = file_get_contents("email.txt");
echo $number;

?></a><br>24 x 7 in a week </p></div>
</div>














</div><div class="moto-widget moto-widget-row__column moto-cell col-sm-3" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aasa" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_223">Send Message</p></div>
</div>













<div data-widget-id="wid__mail_chimp__5c3f4c270eead" class="moto-widget moto-widget-mail_chimp moto-widget-contact_form moto-preset-3 moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto  " data-widget="mail_chimp" data-preset="3">
    <div ng-controller="widget.MailChimp.Controller" ng-init="listId = '';actionAfterSubmission={&quot;action&quot;:&quot;none&quot;,&quot;url&quot;:&quot;&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;id&quot;:&quot;&quot;};resetAfterSubmission=false;">

        
        <form class="moto-widget-contact_form-form" role="form" name="subscribeForm" ng-submit="submit()" novalidate>
            <div ng-show="sending" class="contact-form-loading"></div>
                                                                        <div class="moto-widget-contact_form-group">
                            <label for="field_email_wid__mail_chimp__5c3f4c270eead" class="moto-widget-contact_form-label">Email</label>
                            <input type="text" class="moto-widget-contact_form-field moto-widget-contact_form-input" placeholder="Email *"  ng-blur="validate('email')" required  ng-model-options="{ updateOn: 'blur' }" name="email" id="field_email_wid__mail_chimp__5c3f4c270eead" ng-model="message.email"/>
                                                            <span class="moto-widget-contact_form-field-error ng-cloak" ng-cloak ng-show="subscribeForm.email.$invalid && !subscribeForm.email.$pristine && !subscribeForm.email.emailInvalid" >Field is required</span>
                                <span class="moto-widget-contact_form-field-error ng-cloak" ng-cloak ng-show="subscribeForm.email.emailInvalid && !subscribeForm.email.$pristine" >Incorrect email</span>
                                                    </div>
                                                                                                                                    
                            <input type="hidden" name="status" value="subscribed"/>
                <div class="moto-widget-contact_form-success ng-cloak" ng-cloak ng-show="showSuccessMessage">
                    You have successfully subscribed to the newsletter
                </div>
                <div class="moto-widget-contact_form-danger ng-cloak" ng-cloak ng-show="emailError && !isSubscribed">
                    You were not subscribed. Please try again
                </div>
                <div class="moto-widget-contact_form-danger ng-cloak" ng-cloak ng-show="emailError && isSubscribed">
                    You are already subscribed to this newsletter
                </div>
            
            <div class="moto-widget-contact_form-buttons">
                <div class="moto-widget moto-widget-button moto-preset-5 moto-align-right" data-preset="5" data-align="right">
                    <a ng-click="submit()" class="moto-widget-button-link moto-size-medium"
                       data-size="medium"><span class="fa moto-widget-theme-icon"></span><span class="moto-widget-button-label">Subscribe</span></a>
                </div>
                <button type="submit" class="hidden"></button>
            </div>
        </form>
    </div>
</div></div><div class="moto-widget moto-widget-row__column moto-cell col-sm-2" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aasa" data-animation="">
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_223">Follow us</p></div>
</div>













<div id="wid_1547652273_skr3tzryf" data-widget-id="wid_1547652273_skr3tzryf" class="moto-widget moto-widget-social-links-extended moto-preset-2 moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto  " data-widget="social_links_extended" data-preset="2">
        <ul class="moto-widget-social-links-extended__list">
                <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-1">
            <a href="#" class="moto-widget-social-links-extended__link" target="_self" >
                <span class="moto-widget-social-links-extended__icon fa fa-facebook"></span>
            </a>
        </li>
                <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-2">
            <a href="#" class="moto-widget-social-links-extended__link" target="_self" >
                <span class="moto-widget-social-links-extended__icon fa fa-twitter"></span>
            </a>
        </li>
                <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-3">
            <a href="#" class="moto-widget-social-links-extended__link" target="_self" >
                <span class="moto-widget-social-links-extended__icon fa fa-youtube"></span>
            </a>
        </li>
                <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-4">
            <a href="#" class="moto-widget-social-links-extended__link" target="_self" >
                <span class="moto-widget-social-links-extended__icon fa fa-pinterest"></span>
            </a>
        </li>
            </ul>
    <style type="text/css">
                        #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-1 .moto-widget-social-links-extended__link {
                                background-color: #3a5a9f;                            }
            #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-1 .moto-widget-social-links-extended__link:hover {
                color: rgba(255, 255, 255, 0.5);                background-color: rgba(58, 90, 159, 0.5);                            }
                                #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-2 .moto-widget-social-links-extended__link {
                                background-color: #45b0e3;                            }
            #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-2 .moto-widget-social-links-extended__link:hover {
                color: rgba(255, 255, 255, 0.5);                background-color: rgba(69, 176, 227, 0.5);                            }
                                #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-3 .moto-widget-social-links-extended__link {
                                background-color: #d61119;                            }
            #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-3 .moto-widget-social-links-extended__link:hover {
                color: rgba(255, 255, 255, 0.5);                background-color: rgba(214, 17, 25, 0.5);                            }
                                #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-4 .moto-widget-social-links-extended__link {
                                background-color: #bd2126;                            }
            #wid_1547652273_skr3tzryf .moto-widget-social-links-extended__item-4 .moto-widget-social-links-extended__link:hover {
                color: rgba(255, 255, 255, 0.5);                background-color: rgba(189, 33, 38, 0.5);                            }
                </style>
    </div></div>

                
            
        </div>
    </div>
</div><div class="moto-widget moto-widget-row row-fixed moto-bg-color3_2 moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="sasa" style="" data-bg-position="left top" data-draggable-disabled="">
    
    <div class="container-fluid">
        <div class="row" data-container="container">
            
                
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-12" data-widget="row.column" data-bgcolor-class="" data-container="container" style="" data-bg-position="left top">
    
<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="" data-draggable-disabled="" data-visible-on="-">
    <div class="moto-widget-text-content moto-widget-text-editable" aria-multiline="true"><p class="moto-text_225">© 2016&nbsp;BD-IT SHOP. All Right Reserved.</p></div>
</div>










</div>

                
            
        </div>
    </div>
</div>            
    </footer>

                     <div data-moto-back-to-top-button class="moto-back-to-top-button">
        <a ng-click="toTop($event)" class="moto-back-to-top-button-link">
            <span class="moto-back-to-top-button-icon fa"></span>
        </a>
    </div>
                    <script src="mt-includes/js/website.assets.mine8dd.js?_build=1591956539" type="text/javascript" data-cfasync="false"></script>
    <script type="text/javascript" data-cfasync="false">
        var websiteConfig = websiteConfig || {};
        websiteConfig.address = 'index.html';
        websiteConfig.addressHash = '202c4021bcee9624ff39cdd635f6774c';
        websiteConfig.apiUrl = 'api.php/index.html';
        websiteConfig.preferredLocale = 'en_US';
        websiteConfig.preferredLanguage = websiteConfig.preferredLocale.substring(0, 2);
                websiteConfig.back_to_top_button = {"topOffset":300,"animationTime":500,"type":"theme"};
                websiteConfig.popup_preferences = {"loading_error_message":"The content could not be loaded."};
        websiteConfig.lazy_loading = {"enabled":true};
        websiteConfig.cookie_notification = {"enabled":false,"content":"<p class=\"moto-text_normal\">This website uses cookies to ensure you get the best experience on our website.<\/p>","content_hash":"6610aef7f7138423e25ee33c75f23279","controls":{"visible":"close,accept","accept":{"label":"Got it","preset":"default","size":"medium","cookie_lifetime":365}}};
                angular.module('website.plugins', ["StoreWebsite"]);
    </script>
    <script src="mt-includes/js/website.mina858.js?_build=1591956526" type="text/javascript" data-cfasync="false"></script>
        <script type="text/javascript">$.fn.motoGoogleMap.setApiKey('AIzaSyCPbz3W389x_owB2TlrqPuMEYCTFVuRvMY');</script>
                <script src="mt-demo/59500/59527/mt-content/plugins/moto-store-plugin/src/public/assets/js/moto.store.site.min.js" type="text/javascript"  data-cfasync="false"></script>
    
    
</body>

<!-- Mirrored from template59527.motopreview.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jun 2020 19:04:37 GMT -->
</html>
