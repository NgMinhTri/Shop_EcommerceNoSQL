
<?php include 'classes/header.php'; ?>

<div class="main">
	<div class="content">
		<div class="row">
			<div class="col-md-3">
				<div class="row searchFilter" >
					<div class="col-sm-12">
						<form action="" method="get">
  							<h4>Nơi bán</h4>
							<ul class="category_filters" >
		
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="All" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										All
									</label>
									</div></li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Hồ Chí Minh" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Hồ Chí Minh
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Hà Nội" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Hà Nội
									</label>
								</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Đà Nẵng" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Đà Nẵng
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Hải Phòng" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Hải Phòng
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Cà Mau" id="flexCheckDefault" name="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Cà Mau
									</label>
									</div></li>
								</li>
							</ul>
							
							<h4>Theo danh mục</h4>
							<ul class="category_filters" >
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="All" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
										All
									</label>
									</div></li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Điện thoại thông minh" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
										Điện thoại thông minh
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Hàng điện tử" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
										Hàng điện tử
									</label>
								</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Thời trang" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
									Thời trang
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Laptop" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
									Laptop
									</label>
									</div></li>
								</li>
	
							</ul>
							<h4>Khoảng giá</h4>
							<ul class="category_filters" >
		
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1000000" id="flexCheckDefault" name ="gia[]">
									<label class="form-check-label" for="flexCheckDefault">
										Thấp hơn 1tr
									</label>
									</div></li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="10000000" id="flexCheckDefault" name ="gia[]">
									<label class="form-check-label" for="flexCheckDefault">
										Thấp hơn 10tr
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="20000000" id="flexCheckDefault" name ="gia[]">
									<label class="form-check-label" for="flexCheckDefault">
										Thấp hơn 20tr
									</label>
								</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="30000000" id="flexCheckDefault" name ="gia[]">
									<label class="form-check-label" for="flexCheckDefault">
										Thấp hơn 30tr
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="40000000" id="flexCheckDefault" name ="gia[]">
									<label class="form-check-label" for="flexCheckDefault">
										Thấp hơn 40tr
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="50000000" id="flexCheckDefault" name="gia[]">
									<label class="form-check-label" for="flexCheckDefault">
										Thấp hơn 50tr
									</label>
									</div></li>
								</li>
							</ul>
							<h4>Đánh giá</h4>
							<ul class="category_filters" >
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="5" id="flexCheckDefault" name ="rating[]">
									<label class="form-check-label" for="flexCheckDefault">
										5
									</label>
									</div></li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="4" id="flexCheckDefault" name ="rating[]">
									<label class="form-check-label" for="flexCheckDefault">
										4
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="3" id="flexCheckDefault" name ="rating[]">
									<label class="form-check-label" for="flexCheckDefault">
										3
									</label>
								</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="2" id="flexCheckDefault" name ="rating[]">
									<label class="form-check-label" for="flexCheckDefault">
									2
									</label>
									</div></li>
								</li>
								</li>
							</ul>
						<button id="searchBtn" type="submit" class="btn btn-secondary btn-search" ><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Search</span></button>
						</form>
				</div></div>
    	</div>
		<?php 
		if (isset($_GET['radios'])||isset($_GET['country'])||isset($_GET['rating'])||isset($_GET['gia'])){
			if(!isset($_GET['radios'])||($_GET['radios'][0] =="All")){
				$radios=[];
				$temp=$collection->find();
				foreach($temp as $sin){
					array_push($radios,$sin->category);
				}
				
			}
			else {
				$radios = $_GET['radios'];
			}

			if(!isset($_GET['country'])||($_GET['country'][0] =="All")){
				$country=[];
				$temp=$collection->find();
				foreach($temp as $sin){
						array_push($country,$sin->Inventory->City);
				}
			}
			else {
				$country = $_GET['country'];
			}
			if(!isset($_GET['gia'])){
				$gia=[100000000];
			}
			else {
				$gia = $_GET['gia'];
			}
			$gia1 =100000000;
			foreach($gia as $singia){
				if($singia<=$gia1){
					$gia1 = $singia;
				}
			}

			if(!isset($_GET['rating'])){
				$rating=[0];
			}
			else {
				$rating = $_GET['rating'];
			}
			
			
			$rate =0;
			foreach($rating as $sinrate){
				if($sinrate>=$rate){
					$rate = $sinrate;
				}
			}
			$filterproduct = $collection->find(array('Inventory.City' => array('$in' => $country), 'category' => array('$in' => $radios), 'Rating' => array('$gte'=>intval($rate)),'price' => array('$lte'=>intval($gia1))));
			// foreach($country as $sincountry){
			// 	foreach($radios as $sinradios){
					foreach ($filterproduct as $doc){ ?>
					<form action="classes/manage_cart.php" method="POST">
						<div class="grid_1_of_4 images_1_of_4">
							<a href="preview-3.html"><img src="images/feature-pic1.png" alt="" /></a>
							<h2> 
								<?php echo $doc->name; ?>
							</h2>
							<p><?php echo $doc->Inventory->City; ?>
							</p></br>
							<p><?php
								echo $doc->description; ?>
							</p>
							<p><?php
							foreach($doc->category as $sincat){
								echo $sincat; ?></br><?php }?>
							</p>
							<p><?php 
								echo $doc->price; ?></p>
							<input type="hidden" name="name" value="<?php echo $doc->name; ?>">
							<input type="hidden" name="price" value="<?php echo $doc->price; ?>">
							<button type="submit" name ='add_to_cart'>Add to Cart</button>
						</div>
					</form>
			<?php }}
			
			else{
			foreach ($collection->find() as $doc){ ?>
			<form action="classes/manage_cart.php" method="post">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="images/feature-pic1.png" alt="" /></a>
					 <h2> 
						<?php echo $doc->name; ?>
					 </h2>
					 <p><?php
							foreach($doc->category as $sincat){
								echo $sincat; ?></br><?php }?>
							</p>
							<p><?php echo $doc->Inventory->City; ?>
							</p></br>
					 <p><?php
						echo $doc->description; ?>
					</p>

					 <p><?php 
						echo $doc->price; ?></p>
				     <button type="submit" name ='add_to_cart'>Add to Cart</button>
					 <input type="hidden" name="name" value="<?php echo $doc->name; ?>">
					 <input type="hidden" name="price" value="<?php echo $doc->price; ?>">
				</div>
			</form>
		<?php }} ?>
 </div>
</div></div> </div></div>
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
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

