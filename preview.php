<?php require 'vendor/autoload.php'?>
<?php include 'inc/header.php';?>
<?php include 'classes/cart.php';?>
<?php 
	$cart = new Cart();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL)
	{
         echo "<script> window.location = '404.php' </script>";       
    }
    else
     {
        $id = $_GET['productid']; 
		$con = new MongoDB\Client("mongodb://localhost:27017");		
		$db = $con->ShopEcommerceNoSQL;
		$collection = $db->Product;
		$document = $collection->findOne( array( '_id' => new MongoDB\BSON\ObjectId ($id )) );
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
		$addToCart = $cart->addProductToCart($id, $quantity);
	}

 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php print_r($document->image) ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php print_r($document->name) ?> </h2>
								
					<div class="price">
						<p>Giá: <span><?php print_r($document->price) ?></span></p>
						<p>Danh mục: <span><?php print_r($document->category) ?></span></p>
						<p>Nhãn hiệu:<span><?php print_r($document->brand) ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" name="quantity" class="buyfield"  value="1" min="1" />
						<input type="submit" class="buysubmit" name="submit" value="Thêm vào giỏ hàng"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Chi tiết sản phẩm</h2>
			<p><?php print_r($document->description) ?></p>
	        
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>DANH MỤC</h2>
					<ul>
					<?php
						$con = new MongoDB\Client("mongodb://localhost:27017");		
						$db = $con->ShopEcommerceNoSQL;
			 			$collection = $db->CategoryProduct;
			 			$document = $collection->find();
			 			foreach ($document as $doc) 
			 			{
		 						 		
					?>
				      <li><a href="productbycat.php"><?php print_r($doc->Name) ?></a></li>
				    <?php
						}
					?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
<?php include 'inc/footer.php';?>

