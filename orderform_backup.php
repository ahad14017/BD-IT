<?php 
	$mysqli =new mysqli("localhost", "estiak", "19941818", "estShop");
		$mysqli-> select_db("estShop") or die("Couldn'ttt select DB");
		
		
if (isset($_REQUEST['poid'])) {
	
	$poid = $mysqli -> real_escape_string($_REQUEST['poid']);
}else {
	include_once('index.php');
}




$getposts = $mysqli -> query("SELECT * FROM products WHERE id ='$poid'") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
						$row = $getposts -> fetch_assoc();
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						$item = $row['item'];
						$category = $row['category'];
						$available =$row['available'];
						$sold = '<div style="background: #ff4141!important;" class="moto-widget-store-main_item-label moto-text_219"><center>SOLD!</center> </div>';
						
						
						if($available==0)
                            {
                                
                               $sold_item =  $sold ; 
                                
                            }
                            else {$sold_item = " ";}
						
						
						
						
					}	

//order

if (isset($_POST['order'])) {
//declere veriable
$mbl = $_POST['mobile'];
$addr = $_POST['address'];
$quan = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];


//triming name
	try {
		if(empty($_POST['mobile'])) {
			throw new Exception('Mobile can not be empty');
			
		}
		if(empty($_POST['address'])) {
			throw new Exception('Address can not be empty');
			
		}
		if(empty($_POST['quantity'])) {
			throw new Exception('Address can not be empty');
			
		}
        if(empty($_POST['name'])) {
			throw new Exception('name can not be empty');
			
		}
		if(empty($_POST['email'])) {
		//	throw new Exception('email can not be empty');
			$email = "no_email";
		}
		
		// Check if email already exists
		
		
						$d = date("Y-m-d"); //Year - Month - Day
						$timestamp = time();
						$date = strtotime("+7 day", $timestamp);
						$date = date('Y-m-d', $date);
						
						// send email
						$msg = "
						Assalamu Alaikum...
						Your Order successfull. Very soon we will send you a verification call.
						
						";
						//if (@mail($uemail_db,"eBuyBD Product Order",$msg, "From:eBuyBD <no-reply@ebuybd.xyz>")) {
						
						
						//// decrement product  quantity db 
					
$query = $mysqli -> query("SELECT * FROM products WHERE id ='$poid'");
	
$row_quantity = $query -> fetch_assoc(); 

$product_quantity = $row_quantity['available'];
//echo $product_quantity;

if 	($product_quantity>=$quan)			
{
    
    $product_quantity = $product_quantity-$quan;
    
    
$query = $mysqli -> query("UPDATE products SET available='$product_quantity' WHERE id = '$poid'");
	
}						
else {
    
    $product_quantity = "blank";
}

					
$query = $mysqli -> query("SELECT * FROM products WHERE id ='$poid'");
	
$row_quantity = $query -> fetch_assoc(); 

$product_quantity2 = $row_quantity['available'];


						
						
						
						///// end decrement product  quantity db 
						
						
						
					if ($product_quantity == $product_quantity2)	
						
						{
							
						if($mysqli -> query("INSERT INTO orders (uid,pid,quantity,oplace,mobile,odate,ddate,name,email) VALUES ('$user','$poid',$quan,'$_POST[address]','$_POST[mobile]','$d','$date','$_POST[name]','$email')")){
						    
						    
						    
						    
						    
						    
						    
						    

							//success message
						$success_message = '
						<div class="signupform_content" style=" text-align: center;"><h1><font face="bookman">Your order successfull!</font></h2>
						<div class="signupform_text" style="font-size: 25px; text-align: center;">
						<font face="bookman">
							We send you a verification <br> call very soon.
						</font></div></div>';
						}else{
							$error_message = 'Something goes wrong!';
						}
					}
						
						else{
							$error_message = "Sorry we dont have enough product";
						}
						
						
						
						
						
						//}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}


?>





<?php 
ob_start();

	$mysqli =new mysqli("localhost", "estiak", "19941818", "estShop");
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
        
        
        
        
     .uisignupbutton {
    color: #ffffff;
    cursor: pointer;
    display: inline-block;
    font-size: 18px;
    font-weight: bold;
    line-height: 13px;
    padding: 14px 0;
    width: 300px;
    text-align: center;
    text-decoration: none;
    border-width: 2px;
    border: 1px solid #169E8F;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1)
}
.uisignupbutton:hover {
  background-color: #24bfae;
}   
    .signupbutton {
    background-color: #00CED1;
    border: 2px solid #FFFFFF;
    border-radius: 6px;
    margin: 10px 0px;
}    
    
   .signupbox {
  font-size: 20px;
  font-style: italic;
  margin-bottom: 3px;
  margin-top: 0px;
  padding: 14px;
  line-height: 25px;
  border-radius: 4px;
  border: 1px solid #169E8F;
  color: #169E8F;
  margin-left: 0;
  width: 270px;
  height: 20px;
  background-color: transparent;
} 
    
    
        
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic|Raleway:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Roboto:regular,100,100italic,300,300italic,italic,500,500italic,700,700italic,900,900italic&amp;subset=latin-ext,greek-ext,greek,latin,vietnamese,cyrillic-ext,cyrillic);


.home-prodlist-img img div {
    font-size: 20px;
}
.home-prodlist-img:hover {
    background-color: #9a3489;
    border-radius: 8px;
    color: #fff;
}
.home-prodlist-imgi {
    height: 350px; 
    width: 300px; 
    padding: 2px;
    border: 1px solid #847b7b;
    border-radius: 8px;
}


.home-prodlist-img:hover {
    background-color: #696969;
    border-radius: 8px;
    color: #fff;
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
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_system_1"><a target="_self" data-action="home_page" data-anchor="" class="moto-link" href="index.html"></a><span class="moto-content-image-plugin-wrapper moto-spacing-top-zero moto-spacing-right-zero moto-spacing-bottom-zero moto-spacing-left-zero"><span class="moto-content-image-container"><img class="moto-content-image" data-path="2017/05/mt-953_header_logo01.png" data-id="1182" alt="" width="51" height="43" src="mt-demo/59500/59527/mt-content/uploads/2017/05/mt-953_header_logo01.png"></span></span><a target="_self" data-action="home_page" data-anchor="" class="moto-link" href="index1.php">Resilient-IT Bazar</a></p></div>
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
           
	
		
		<div class="container signupform_content ">
			<div>

				
				
				
				<div>
				<?php
					 echo '
						 <ul style="float: left; padding: 10px 10px 10px 10px;">
								
    
    <div >
                    <div class="moto-widget-store-main_item moto-widget-store-image-block ">

                                                    <div class="moto-widget moto-widget-image moto-preset-default" data-preset="default"  data-widget="image">
                                <a class="moto-widget-image-link  moto-link" >
                                                                                                                        <img  style = "height: 400px; 
    width: 400px; " data-src="image/product/'.$item.'/'.$picture.'" class="moto-widget-image-picture lazyload"> '.$sold_item.'
                                                                                                                                                </a>
                            </div>
                                                <div class="moto-text_system_13 moto-widget moto-widget-text" data-widget="text">
                            <div class="moto-text_system_13">
                                <a  class="moto-widget-store-main_item-title ">
                                    <span style = "font-size: 16px;">'.$pName.'</span>
                                </a>
                            </div>


                        </div>

                        <div class="store-product-element-container">
                            
                            
                                                                    <div class="moto-widget-store-main_item-price moto-widget moto-widget-text" data-widget="text">
                                        <span class="moto-text_system_14">Price: '.$price.' Tk</span>
                                    </div>
                                                            

                                                    </div>
                                                    <div class="moto-widget moto-widget-button moto-preset-4 store-product-element-container"  data-widget="button"
                                 data-store-product-add-to-cart="" data-product-id="15" data-location="/store/cart/"  data-autoredirect="1">
                                
                            </div>
                                            </div>
                </div>
                
               
							</ul>
                
                
                ';
				?>
			</div>
				
				
				<?php 
					if(isset($success_message)) {echo $success_message;}
					else {
					echo '
						<div class="">
						<div class="signupform_text""></div>
						<div>
							<form action="" method="POST" class="registration">
								<div class="signup_form" style="    margin-top: 10px;">
								
								
								
								<div>
									<br>
										<td>
											<input name="name" placeholder="Your name" required="required" class="email signupbox" type="text" size="30" value="'.$uname_db.'">
										</td>
									</div>
								
								
								
								
								
									<div>
									<br>
										<td>
											<input name="mobile" placeholder="Your mobile number" required="required" class="email signupbox" type="text" size="30" value="'.$umob_db.'">
										</td>
									</div>
									
									
									
									<div>
									<br>
										<td>
											<input name="email" placeholder="Your email if have any"  class="email signupbox" type="text" size="30" value="'.$uemail_db.'">
										</td>
									</div>
									
									
									
									
									
									
									
									
									
									<div>
									<br>
									
										<td>
											<input name="address" id="password-1" required="required"  placeholder="Write your full address" class="password signupbox " type="text" size="20" value="'.$uadd_db.'">
										</td>
										<p> #house no, #area </p>
									</div>
									
									
									
									
									
									
									
									
									
									
									<div>
									<br>
										<td>
											<select onchange="changeAmount()" name="quantity" required="required" id="productAmount" style=" font-size: 20px;
										font-style: italic; margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #169E8F;color: #169E8F;margin-left: 0;width: 300px;background-color: transparent;" class="">';

					

				 ?>
				 
				 
				 
				 <?php
												for ($i=1; $i<=$available; $i++) { 
													echo '<option  value="'.$i.'">Quantity: '.$i.'</option>';
												}
											?>
											<?php echo '
											</select>
										</td>
									</div>
									<div>
										<input name="order" class="uisignupbutton signupbutton" type="submit" value="Confirm Order">
									</div>
									<div class="signup_error_msg"> '; ?>
										<?php 
											if (isset($error_message)) {echo $error_message;}
											
										?>
									<?php echo '</div>
								</div>
							</form>
							
						</div>
					</div>

					';

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
                                                        <p class="moto-text_normal">Quality is our first priority so.Resilient-IT Bazar provides the best quality of products all over the country and all our products are truly authentic. We believe in the quality of our products and all our products go through our quality control process. So you can have faith in our products and and all our products are from verified vendors. Our products are worth it to buy. We genuinely care about our customers and we always try to sell the best quality products to our customers.</p>                                                    </div>
                    
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
                                                        <p class="moto-text_normal">Resilient-IT Bazar provides warranty service of 7 days return policy for all our products if there is a manufacturing problem.so if there is any manufacturing problem we will replace our product as soon as possible.</p>                                                    </div>
                    
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
                                                        <p class="moto-text_normal">Resilient-IT Bazar always tries to deliver our products to our customers as soon as they place their order on our website. We contact our customers immediately after placing the order. We care about our customer needs so we always try to deliver our products as soon as possible.</p>                                                    </div>
                    
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
    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_224">Resilient-IT Bazar</p><p class="moto-text_224"><a href="" data-action="call" class="moto-link"><?php
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
    <div class="moto-widget-text-content moto-widget-text-editable" aria-multiline="true"><p class="moto-text_225">© 2016&nbsp;Resilient-IT Bazar. All Right Reserved.</p></div>
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