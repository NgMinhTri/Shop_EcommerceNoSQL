<head>
<link href="css/order.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<?php include 'classes/header.php'; ?>


<div class="wrapper">
    <div class="h5 large">Billing Address</div>
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
            <div class="mobile h5">Billing Address</div>
            <div id="details" class="bg-white rounded pb-5">
                <form method="POST" action ="classes/manage_cart.php">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"> <label>Thành Phố</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" name="city" required> <span class="fas fa-check text-success pr-2"></span> </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"> <label>Zip code</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" name="zipcode" required> <span class="fas fa-check text-success pr-2"></span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"> <label>Địa chỉ</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" name="address" required> <span class="fas fa-check text-success pr-2"></span> </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"> <label>Phường</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" name="ward" required> <span class="fas fa-check text-success pr-2"></span> </div>
                            </div>
                        </div>
                    </div> 
                    <button class="btn btn-primary" type="submit" name ="finish"> Finish shopping</button>
                </form>
            </div> 
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
            <div id="cart" class="bg-white rounded">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h6">Cart Summary</div>
                    <div class="h6"> <a href="cart.php">Edit</a> </div>
                </div>
                <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                <?php 
                $count =1;
                $total=0;
                if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key=>$value){
					echo"
                    <h6>Sản phẩm $count </h6>
                    <div class='item pr-2'> <img src='https://images.unsplash.com/photo-1569488859134-24b2d490f23f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60' alt='' width='80' height='80'>
                    </div>
                    <div class='d-flex flex-column px-3'> <b class='h5'>$value[name]</b></div>
                    <div class='ml-auto'> <b class='h5'>$value[Quantity]</b> </div>
                    <div class='ml-auto'> <b class='h5'>$$value[Price]</b> </div>"
                    ; 
                    $count++;
                    $total=$total+$value['Price']*$value['Quantity'];
                    }} ?>
                </div>
                <div class="my-3"> <input type="text" class="w-100 form-control text-center" placeholder="Gift Card or Promo Card"> </div>
                <div class="d-flex align-items-center">
                    <div class="display-5">Subtotal</div>
                    <div class="ml-auto font-weight-bold"><?php echo $total; ?></div>
                </div>
                <div class="d-flex align-items-center py-2 border-bottom">
                    <div class="display-5">Shipping</div>
                    <div class="ml-auto font-weight-bold"><?php $shipping= 12000; echo $shipping; ?></div>
                </div>
                <div class="d-flex align-items-center py-2">
                    <div class="display-5">Total</div>
                    <div class="ml-auto d-flex">
                        <div class="text-primary text-uppercase px-3">VND</div>
                        <div class="font-weight-bold"><?php echo ($shipping+$total); ?></div>
                    </div>
                </div>
            </div>
            <p class="text-muted"><a href="#" class="text-danger">Hotline:</a>+314440160 (International)</p>
            
            <div class="row pt-lg-3 pt-2 buttons mb-sm-0 mb-2">
                <div class="col-md-6">
                    <div class="btn text-uppercase"><a href="Products.php" class="text-danger">back to shopping</div>
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                </div>
            </div>
            <div class="text-muted pt-3" id="mobile"> <span class="fas fa-lock"></span> Your information is save </div>
        </div>
    </div>
    <div class="text-muted"> <span class="fas fa-lock"></span> Your information is save </div>
</div>

<?php include 'classes/footer.php'; ?>