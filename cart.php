<?php

include 'classes/header.php';
?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							
							<?php 
								if(isset($_SESSION['cart'])){
									foreach($_SESSION['cart'] as $key=>$value){
										echo"
										<tr>
										<td>$value[name]</td>
										<td>a</td>
										<td>$value[Price]<input type='hidden' class = 'iprice' value='$value[Price]'></td>
										<td>
										<form method='POST' action='classes/manage_cart.php'>
											<input class='text-center iquantity' name ='Mod_Quantity' onchange ='this.form.submit()' type ='number' value='$value[Quantity]' min='1' max='10'>
											<input type='hidden' name = 'name' value='$value[name]'>
										</form>
										</td>
										<td class = 'itotal'></td>
										<form action ='classes/manage_cart.php' method ='POST'>
											<td><button class = 'btn btn-outline-danger' name ='Remove'>Remove</button></td>
											<input type='hidden' name = 'name' value='$value[name]'>

										</form>
										</tr>
										";
									}
								}
							?>
								
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Grand Total :</th>
								
								<td id='gtotal'></td>
							
								
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="Products.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
						<form action="classes/manage_cart.php" method="post">
							<button class="btn btn-primary" type="submit" name ="order">Order</button>
							<input type='hidden' name = 'total' id ='mytotal'>
						</form>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include 'classes/footer.php'; ?>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});

		var gt=0;
		var iprice=document.getElementsByClassName('iprice');
		var iquantity=document.getElementsByClassName('iquantity');
		var itotal=document.getElementsByClassName('itotal');
		var gtotal=document.getElementById('gtotal');
		function subTotal(){
			gt=0;
			for(i=0;i<iprice.length;i++){
				itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
				gt=gt+(iprice[i].value)*(iquantity[i].value);
			}
			gtotal.innerText=gt;
			document.getElementById('mytotal').value= gt;
		}
		
		subTotal();
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

