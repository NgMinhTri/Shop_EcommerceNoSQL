
<?php include 'inc/header.php';?>
<?php require './vendor/autoload.php';?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng tiền</th>
								<th width="10%">Xóa</th>
							</tr>
							<?php
								Predis\Autoloader::register();
								$redis = new Predis\Client();
								$key = 'PRODUCTS';
								if($redis->get($key))
								{
									
									$productList = unserialize($redis->get($key));
									//echo print_r($productGet);
								
									
							?>							
							<tr >
								<td><?php echo $productList['name'] ?></td>
								<td><img width="80" src="admin/uploads/<?php echo $productList['image'] ?>	" alt=""/></td>
								<td><?php echo $productList['price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="1" min="1" />
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php echo $productList['price'] ?></td>
								<td><a href="">X</a></td>
							</tr>
							<?php

								}
							?>
							
							
							
							
							
							
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng tiền : </th>
								<td><?php echo $productList['price'] ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Tiền thanh toán :</th>
								<td> </td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
 <?php include 'inc/footer.php';?>

