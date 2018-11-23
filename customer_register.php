<?php
session_start();
?>


<!DOCTYPE html>


<head>
	<Title>VPN Computers</Title>
	<link rel="stylesheet" href="styles/style.css" media="all">
	<link rel="stylesheet" href="styles/register_design.css" media="all">
<head>
<body>


	<?php

	include("functions/functions.php");
	include("functions/functions2.php");
	
		?>

	<!--Main Container Starts From Here -->
	<div class="main_wrapper">
			
			<!--Header Starts From Here -->
			<div class="header_wrapper">

				<a href="index.php"><img id="header_logo" src="images/<?php getHeaderImg(); ?>"/></a>
				<img id="header_banner" src="images/<?php getCoverAdsImg(); ?>"/>
			</div>
			<!--Header Ends Here -->
			<?php getCart();?>
			<!--shopping cart starts -->
			<div id="shopping_cart">

					<span style="float: right; font-size: 18px; padding: 5px; line-height: 30px;">

					Welcome Guest! <b style="color: orange"> Shopping Cart -</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color: orange;"> Go To Cart</a><b> | </b><a href="checkout.php" style="text-decoration: none;color: white">Login</a>

				</span>

			</div>
			<!--shoppung carts Ends Here -->

			<!--Menubar starts -->
			<div class="menubar">

					<div id="form">
						
						<form method="get" action="results.php" enctype="multipart/form-data">
								<input type="text" name="user_query" placeholder="Search..." />
								<input type="submit" name="search" value="Search" />

						</form>

					</div>

					<ul id="menu">
						<li><a href="all.php">All</a></li>
						<li><a href="my_account.php">MyAccount</a></li>
						<li><a href="cart.php">Shopping Cart</a></li>

						<li><a href="support.php">FAQ</a></li>
						<li>
							<?php
					if (!isset($_SESSION['customer_email'])) {

						echo "<b><a href='checkout.php' style='text-decoration: none;color: orange'>Login</a></b>";

					}else{
						echo "<b><a href='logout.php' style='text-decoration: none;color:orange'>Logout</a></b>";

					}
					?>
						</li>
					</ul>



					
			</div>
			<!--Menubar Ends -->

			<!--Slide part starts -->
			<div class="slide_wrapper">
				
				<!--Sidebar starts -->
				<div id="Adsbar">
						<div id="stitle"><center>Brands</center></div>
						<ul id="brnds">
								<div class="tab">
							  <button class="tablinks" onclick="openCity(event, 'brnd_tab')">Brands</button>
							  <button class="tablinks" onclick="openCity(event, 'cat_tab')">Categories</button>
							</div>

							<div id="brnd_tab" class="tabcontent">
							 <?php getBrands(); ?>
							</div>

							<div id="cat_tab" class="tabcontent">
							  <?php getCats(); ?>
							</div>

						</ul>
						
				</div>
				<!--Sidebar ends -->

				<div id="slide_area">
					<img class="mySlides w3-animate-fading" src="images\slide_images\<?php getImgSlide1(); ?>" style="width:100%">
						<img class="mySlides w3-animate-fading" src="images\slide_images\<?php getImgSlide2(); ?>" style="width:100%">
 						 <img class="mySlides w3-animate-fading" src="images\slide_images\<?php getImgSlide3(); ?>" style="width:100%">
 						 <img class="mySlides w3-animate-fading" src="images\slide_images\<?php getImgSlide4(); ?>" style="width:100%">
  						<img class="mySlides w3-animate-fading" src="images\slide_images\<?php getImgSlide5(); ?>" style="width:100%">
  						<img class="mySlides w3-animate-fading" src="images\slide_images\<?php getImgSlide6(); ?>" style="width:100%">
  						<img class="mySlides w3-animate-fading" src="images\slide_images\<?php getImgSlide7(); ?>" style="width:100%">

  				</div>
  						<script>
							var myIndex = 0;
							carousel();

							function carousel() {
							    var i;
							    var x = document.getElementsByClassName("mySlides");
							    for (i = 0; i < x.length; i++) {
							       x[i].style.display = "none";  
							    }
							    myIndex++;
							    if (myIndex > x.length) {myIndex = 1}    
							    x[myIndex-1].style.display = "block";  
							    setTimeout(carousel, 4000);    
							}
						</script>
				
				
			</div>
			<!--Slide part Ends -->
			

				

				<!--Content Area starts -->
				<div id="register_area">
						<h1 style="text-align: center;">Sign Up here!</h1><br><br>
						<form id="data_input" action="" method="post" enctype="multipart/form-data">
							<div class="row">
								<label for="username" class="labels">Name:</label>
								<input type="text" name="username" id="username" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="email" class="labels">Email:</label>
								<input type="text" name="email" id="email" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="password" class="labels">Password:</label>
								<input type="password" name="password" id="password" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="retype_password" class="labels">Re-type Password:</label>
								<input type="password" name="retype_password" id="retype_password" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="country" class="labels">Country:</label>
								<input type="text" name="country" id="country" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="profile_image" class="labels">Profile Image: </label>
								<input type="file" class='button button2' name="profile_image" id="profile_image" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="city" class="labels">City:</label>
								<input type="text" name="city" id="city" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="contact" class="labels">Contact no:</label>
								<input type="text" name="contact" id="contact" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="address" class="labels">Address:</label>
								<input type="text" name="address" id="address" class="input_field_register" required>
							</div>

							<div class="row">
								<label for="gender" class="labels">Gender:</label>
								<div id="gender" class="input_field_register">
									<input type="radio" name="maleorfemale" value="Male" >Male
									<input type="radio" name="maleorfemale" value="Female">Female
								</div>
							</div>	

							<div class="row">
								<input class='button button2' type="submit" name="register" id="register" value="Register">
								
							</div>
						</form>

						<br>

				</div>
				<!--Content Area starts -->
			
			<!--Footer starts -->
			<div class="footer_wrapper">
					<center><h3>&copy;2018 VPN Computers. All rights reserved.</h3></center>
			</div>

			<!--Footer Ends -->

	</div>
	<!--Main Container Ends Here -->
	<!-- For Tab -->
	<script>
			function openCity(evt, cityName) {
			    var i, tabcontent, tablinks;
			    tabcontent = document.getElementsByClassName("tabcontent");
			    for (i = 0; i < tabcontent.length; i++) {
			        tabcontent[i].style.display = "none";
			    }
			    tablinks = document.getElementsByClassName("tablinks");
			    for (i = 0; i < tablinks.length; i++) {
			        tablinks[i].className = tablinks[i].className.replace(" active", "");
			    }
			    document.getElementById(cityName).style.display = "block";
			    evt.currentTarget.className += " active";
			}
	</script>
<body>

</html>

<?php
include("includes/db.php");

		if(isset($_POST['register'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$retype_password = $_POST['retype_password'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$gender = null;
		$ip=getIp();
		$gender = $_POST['maleorfemale'];
		//Getting the text data from the fields
		$profile_image = $_FILES['profile_image']['name'];
		$profile_image_tmp = $_FILES['profile_image']['tmp_name'];


		move_uploaded_file($profile_image_tmp, "customer/customer_images/$profile_image");
		
		$query = "SELECT * FROM customer WHERE customer_name = "."'$username'";
		$result=mysqli_query($con,$query);

		$username_database = null;
		while($row = $result->fetch_assoc()){
			if($username == $row['customer_name']){
				$username_database = $row['customer_name'];
				break;
			}
		}
		if($username_database != null){
			echo "<script>alert('This username already exists, please choose another one')</script><br>";
		}
		else{
			$query = "SELECT * FROM customer WHERE customer_email = "."'$email'";
			$result=mysqli_query($con,$query);

			$email_database = null;
			while($row = $result->fetch_assoc()){
				if($email == $row['customer_email']){
					$email_database = $row['customer_email'];
					break;
				}
			}
			if($email_database != null){
				echo "<script>alert('There already exists an account with this email')</script>";
			}
			else if($password != $retype_password){
				echo "<script>alert('The passwords don't match')</script>";
			}
			else{
				$query = "INSERT INTO customer(customer_ip,customer_name,customer_email, customer_pass,customer_country, customer_city,customer_contact,customer_address, customer_gender,customer_image) VALUES ('$ip','$username','$email','$password','$country','$city','$contact','$address','$gender','$profile_image')";
				 $result=mysqli_query($con,$query);
				// if($result) echo "<script>alert('Success')</script>";
				 //checking weather item is selected or not

				$select_Cart = "select * from cart where ip_address='$ip'";
				$run_Cart=mysqli_query($con,$select_Cart);
				$check_Cart=mysqli_num_rows($run_Cart);

				//no orders
				if ($check_Cart==0) {
					$_SESSION['customer_email']=$email;
					echo "<script>alert('Account has been created.')</script>";
					echo "<script>window.open('my_account.php','_self')</script>";
				}else{
					$_SESSION['customer_email']=$email;
					echo "<script>alert('Account has been created.')</script>";
					echo "<script>window.open('checkout.php','_self')</script>";
				}


			}
		}	

		
		
		}
		?>