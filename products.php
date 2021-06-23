
<?php include 'classes/header.php'; ?>

<div class="main">
	<div class="content">
		<div class="row">
			<div class="col-md-3">
				<div class="row searchFilter" >
					<div class="col-sm-12">
						<form action="" method="get">
  							<h4>Country</h4>
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
									<input class="form-check-input" type="checkbox" value="Vietnam" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Vietnam
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="America" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										America
									</label>
								</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Canada" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Canada
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="France" id="flexCheckDefault" name ="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										France
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Germany" id="flexCheckDefault" name="country[]">
									<label class="form-check-label" for="flexCheckDefault">
										Germany
									</label>
									</div></li>
								</li>
							</ul>
							
							<h4>Category</h4>
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
									<input class="form-check-input" type="checkbox" value="Book" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
										Book
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Computer" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
										Computer
									</label>
								</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Toy" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
									Toy
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Phone" id="flexCheckDefault" name ="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
									Phone
									</label>
									</div></li>
								</li>
								<li >
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Best Seller" id="flexCheckDefault" name="radios[]">
									<label class="form-check-label" for="flexCheckDefault">
										Best Seller
									</label>
									</div></li>
								</li>
							</ul>
							<h4>Rating</h4>
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
		if (isset($_GET['radios'])||isset($_GET['country'])||isset($_GET['rating'])){
			if(!isset($_GET['radios'])||($_GET['radios'][0] =="All")){
				$radios=[];
				$temp=$collection->find();
				foreach($temp as $sin){
					array_push($radios,$sin->Category);
				}
				
			}
			else {
				$radios = $_GET['radios'];
			}
			if(!isset($_GET['country'])||($_GET['country'][0] =="All")){
				$country=[];
				$temp=$collection->find();
				foreach($temp as $sin){
					foreach($sin->Inventory as $sin1){
						array_push($country,$sin1->Country);
					}
				}
			}
			else {
				$country = $_GET['country'];
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
			$filterproduct = $collection->find(array('Inventory.Country' => array('$in' => $country), 'Category' => array('$in' => $radios), 'Rating' => array('$gte'=>intval($rate))));
			// foreach($country as $sincountry){
			// 	foreach($radios as $sinradios){
					foreach ($filterproduct as $doc){ ?>
					<form action="classes/manage_cart.php" method="POST">
						<div class="grid_1_of_4 images_1_of_4">
							<a href="preview-3.html"><img src="images/feature-pic1.png" alt="" /></a>
							<h2> 
								<?php echo $doc->Name; ?>
							</h2>
							<p><?php
							foreach($doc->Inventory as $sincountry){
								echo $sincountry->Country;} ?>
							</p>
							<p><?php
								echo $doc->Description; ?>
							</p>
							<p><?php
							foreach($doc->Category as $sincat){
								echo $sincat; ?></br><?php }?>
							</p>
							<p><?php 
								echo $doc->Price; ?></p>
							<input type="hidden" name="name" value="<?php echo $doc->Name; ?>">
							<input type="hidden" name="price" value="<?php echo $doc->Price; ?>">
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
						<?php echo $doc->Name; ?>
					 </h2>
					 <p><?php
						echo $doc->Description; ?>
					</p>
					 <p><?php 
						echo $doc->Price; ?></p>
				     <button type="submit" name ='add_to_cart'>Add to Cart</button>
					 <input type="hidden" name="name" value="<?php echo $doc->Name; ?>">
					 <input type="hidden" name="price" value="<?php echo $doc->Price; ?>">
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

