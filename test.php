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
</style>
        <link rel="stylesheet" href="mt-demo/59500/59527/mt-content/assets/stylesffb1.css?_build=1591958657" id="moto-website-style"/>
            
    
    
    
    
    
    
    <link href="mt-demo/59500/59527/mt-content/plugins/moto-store-plugin/src/public/assets/css/main1b96.css?v=1.5.3" rel="stylesheet" type="text/css" />
    
    
</head>
<body class="moto-background moto-website_live">
        
  
                
    
    <?php 
    	
			$getposts = $mysqli -> query("SELECT * FROM products WHERE available >='1' AND item ='saree'  ORDER BY id DESC LIMIT 10") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
				echo ' <div class="row">';
					while ($row = $getposts -> fetch_assoc()) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						 echo '
    
    <div class="col-sm-3">
                    <div class="moto-widget-store-main_item moto-widget-store-image-block ">

                                                    <div class="moto-widget moto-widget-image moto-preset-default" data-preset="default"  data-widget="image">
                                <a class="moto-widget-image-link  moto-link" href="women/view_product.php?pid='.$id.'">
                                                                                                                        <img  data-src="image/product/saree/'.$picture.'" class="moto-widget-image-picture lazyload">
                                                                                                                                                </a>
                            </div>
                                                <div class="moto-text_system_13 moto-widget moto-widget-text" data-widget="text">
                            <div class="moto-text_system_13">
                                <a href="store/product/48-inch-1080p-60hz-smart-led-tv/index.html" class="moto-widget-store-main_item-title ">
                                    <span>'.$pName.'</span>
                                </a>
                            </div>


                        </div>

                        <div class="store-product-element-container">
                            
                            
                                                                    <div class="moto-widget-store-main_item-price moto-widget moto-widget-text" data-widget="text">
                                        <span class="moto-text_system_14">'.$price.'</span>
                                    </div>
                                                            

                                                    </div>
                                                    <div class="moto-widget moto-widget-button moto-preset-4 store-product-element-container"  data-widget="button"
                                 data-store-product-add-to-cart="" data-product-id="15" data-location="/store/cart/"  data-autoredirect="1">
                                <a  class="moto-widget-button-link moto-size-medium">
                                    <span class="fa moto-widget-theme-icon"></span>
                                    <span class="moto-widget-button-label">ADD TO CART</span>
                                </a>
                            </div>
                                            </div>
                </div>';

						}
						echo '</div>';
				}
		?>
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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