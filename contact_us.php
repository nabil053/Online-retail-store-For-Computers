<!DOCTYPE html>
<?php
session_start();

?>

<head>
	<Title>VPN Computers</Title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/reset.css">
    <!-- CSS reset -->
    
    <!-- Resource style -->
    
    <link rel="stylesheet" href="styles/style.css" media="all">
	<!--===============================================================================================-->
</head>

<body>
	<?php
	include 'includes/db.php';
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
					<?php
						if (isset($_SESSION['customer_email'])){
							echo "<b>Welcome:<b/>".$_SESSION['customer_email'];
						}
					?>
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
				
				<!--Content Area starts -->
				<div id="content_area">
						<div id ="products_box">
								

								<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="" method="post">
				<span class="contact100-form-title">
					Contact Us
				</span>

				<label class="label-input100" for="fname">Tell us your name *</label>
				<div class="wrap-input100 validate-input" data-validate="Type first name">
					<input id="fname" class="input100" type="text" name="fname" placeholder="Full Name">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					
					
				<?php

					if (!isset($_SESSION['customer_email'])) {

						?>
							<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
						
									<?php
					}else{
						$email=$_SESSION['customer_email'];
						?>

<input id="email" class="input100" value="<?php echo $email ?>" type="text" name="email" placeholder="Eg. example@email.com">
<?php
					}
					?>
					<span class="focus-input100"></span>
				</div>
				

				<label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="message">Subject *</label>
				<div class="wrap-input100 validate-input" data-validate="Subject is required">
					<input type="text" id="subject" class="input100" name="subject" placeholder="Write a subject"/>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate="Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<input class="contact100-form-btn" type="submit" name="submitNow" id="submitNow" value="Send Message" style="display: table-cell; margin-left: 10px;">

				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							VPN computers,Gauchia Market,Fokirapul
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							01789785323
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							vpncomputers@gmail.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

								<?php
									include 'includes/db.php';

									if(isset($_POST['submitNow'])){
										$ip=getIp();
										$name = $_POST['fname'];
										$message = $_POST['message'];
										$email=$_POST['email'];
										$phone=$_POST['phone'];
										$subject=$_POST['subject'];

								

					$result=$con->query("insert into messages(customer_ip,customer_name,customer_phone,customer_email, subject,message)values('$ip','$name',$phone,'$email','$subject','$message')");

										if ($result) {
											echo "<script>alert('Message Sent To Admin.')</script>";
										}
									}
								?>
							
						</div>

				</div>
				<!--Content Area starts -->
			
			<!--Footer starts -->
			<div class="footer_wrapper">
					<center><h3>&copy;2018 VPN Computers. All rights reserved.<b> | </b><a href="contact_us.php" id="contact_us">Contact Us</a></center>
			</div>

			<!--Footer Ends -->

	</div>
	<!--Main Container Ends Here -->


	
	


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>

</body>

</html>