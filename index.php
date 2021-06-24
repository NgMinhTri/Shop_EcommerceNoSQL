
<?php include 'inc/header.php';?>
<?php include 'inc/headerbottom.php';?>
<?php require 'vendor/autoload.php'?>

 <div class="main">
 	
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>SẢN PHẨM NỔI BẬC </h3>
    
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				
 				<?php
                    $con = new MongoDB\Client("mongodb://localhost:27017");     
                    $db = $con->ShopEcommerceNoSQL;
                    $collection = $db->Product;
                    $document = $collection->find(["type"=>"1"]);
                    foreach ($document as $doc) 
                    {                                                              
                ?>
				<div class="grid_1_of_4 images_1_of_4">
					<img src="admin/uploads/<?php print_r($doc->image) ?>" alt="" />
					 <h2><?php print_r($doc->name) ?></h2>
					 
					 <p><span class="price"><?php print_r($doc->price) ?></span></p>  
				     <div class="button"><span><a href="preview.php?productid=<?php echo $doc->_id ?>" class="details">Chi tiết</a></span></div>			     
				</div>
				<?php
					}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    			<h3>Sản phẩm</h3>
    		</div>
    		<div class="clear"></div>
    		</div>
			<div class="section group">
				<?php
                    $con = new MongoDB\Client("mongodb://localhost:27017");     
                    $db = $con->ShopEcommerceNoSQL;
                    $collection = $db->Product;
                    $document = $collection->find();
                    foreach ($document as $doc) 
                    {                                                              
                ?>
				<div class="grid_1_of_4 images_1_of_4">
					<img src="admin/uploads/<?php print_r($doc->image) ?>" alt="" />
					 <h2><?php print_r($doc->name) ?></h2>
					 
					 <p><span class="price"><?php print_r($doc->price) ?></span></p>  
				     <div class="button"><span><a href="preview.php?productid=<?php echo $doc->_id ?>" class="details">Chi tiết</a></span></div>			     
				</div>	
				<?php
					}
				?>		
			</div>
    </div>
 </div>
</div>
<?php include 'inc/footer.php';?>
