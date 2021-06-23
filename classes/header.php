<?php
// Prepend a base path if Predis is not available in your "include_path".
require './config/configMongoDB.php';

$db = $con->TestSuccessPHP_mongoDB;
 	$collection = $db->Product;

	session_start();
//include('classes/manage_cart.php');
?>

<!DOCTYPE HTML>
<head>
<title>Free Smart Store Website Template</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="search-filter.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>

  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="Cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
  									<?php 
									  $count=0;
									  if(isset($_SESSION['cart'])){
										  $count=count($_SESSION['cart']);
									  }
									?>
									<span class="no_product">(<?php echo $count; ?>)</span>
							</a>
						</div>
			      </div>
		   <div>
			   <?php if(isset($_SESSION['success'])): ?>
					<div class="error success">
						<h3>
							<?php 
								unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>
				
				<form action="login.php" method="POST">
					<div class="search"><div><button class="grey" name="logout">Log out</button></div></div>
            	</form>
				
		   </div>
		   
		 <div class="clear"></div>
	 </div>
	<?php if(isset($_SESSION['username'])): ?>
					<p><?php echo $_SESSION['username']; ?></p>
	<?php endif ?>
	 <div class="clear"></div>
	 
 </div>

<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>