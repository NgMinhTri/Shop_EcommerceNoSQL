<!-- <?php	
	// require './vendor/autoload.php';			
?> -->

<!-- <?php 
	// class Cart{
		// public function addProductToCart($id, $quantity)
		// {
		// 	//Mongo
		// 	$con = new MongoDB\Client("mongodb://localhost:27017");		
		// 	$db = $con->ShopEcommerceNoSQL;
 	// 		$collection = $db->Product;
 	// 		//Redis
 	// 		Predis\Autoloader::register();
		// 	$redis = new Predis\Client();


		// 	$quantity = $_POST['quantity'];
		// 	$sessionId = session_id();
		//     $doc = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID( $id )]);
		// 	$key = 'PRODUCTS';
		// 	if(!$redis->get($key))
		// 	{					
		// 		$productSet = $doc;										
		// 		$redis->set($key, serialize($productSet));

		// 		$redis->expire($key, 50);   //THỜI GIAN LƯU GIỮ THÔNG TIN ADMIN LÀ BAO NHIÊU S(10S)
		// 		$productGet = unserialize($redis->get($key));
		// 		echo print_r($productGet);							
		// 	}
			
		// 	header('Location:cart.php');
			
		// }

	

	// }
?>
