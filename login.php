<?php include 'server.php'; ?>
<?php include 'classes/header.php'; ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="login.php" method="POST">
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				<input type="password" name="pass" value="<?php echo $pass; ?>" placeholder="Password">
				<div class="search"><div><button class="grey" name="login">Log in</button></div></div>
            </form>
                 
                    
                    </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
			<?php include('classes/errors.php'); ?>
    		<form method="POST" action = "login.php">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="Name" value="<?php echo $name; ?>" placeholder="Username">
							</div>
							
							<div>
							   <input type="text" name="City" value="<?php echo $city; ?>" placeholder="City">
							</div>
							
							<div>
								<input type="text" name="Zip-Code" value="<?php echo $zipcode; ?>" placeholder="Zipcode">
							</div>
							<div>
								<input type="text" name="Email" value="<?php echo $email; ?>" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="Address" value="<?php echo $address; ?>" placeholder="Address">
						</div>
		    		<div>
						<select id="country" name="Country" value="<?php echo $country; ?>" placeholder="Country">
							<option value="null">Select a Country</option>         
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="Phone" value="<?php echo $phone; ?>" placeholder="Phone">
		          </div>
				  
				  <div>
					<input type="password" name="Password" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include 'classes/footer.php' ?>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

