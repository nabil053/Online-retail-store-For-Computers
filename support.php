
<!DOCTYPE html>
<?php
session_start();

?>

<head>
	<Title>VPN Computers</Title>
	

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/reset.css">
    <!-- CSS reset -->
    
    <!-- Resource style -->
    
    <link rel="stylesheet" href="styles/style.css" media="all">
	<link  href="js/slide.js" >

	<script src="js/modernizr.js"></script>
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
							
							<center><h2 style="color: lightgrey;font-size: 30px;">Frequently Asked Questions</h2></center>
							
								<section class="cd-faq">
							        <div class="cd-faq-items">
							            <ul id="basics" class="cd-faq-group">
							                <li class="cd-faq-title">
							                    <h1>Basics</h1>
							                </li>
							                <li>
							                    <a class="cd-faq-trigger black" href="#0">Are you open on weekends?</a>
							                    <div class="cd-faq-content">
							                        <p>Unfortunately all of our showrooms are closed on weekends. You may still place orders via our website and these orders will be attended to on the next available weekday.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>

							                <li>
							                    <a class="cd-faq-trigger black" href="#0">Do you sell to the public?</a>
							                    <div class="cd-faq-content">
							                        <p>Yes we certainly do sell to the public!.Whether you are a large department store or would simply like some product for your home, Shop For Shops is happy to assist you and your business with your requirements.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>

							                <li>
							                    <a class="cd-faq-trigger black" href="#0">Is everything in stock?</a>
							                    <div class="cd-faq-content">
							                        <p>Once we have received your order and checked for stock availability, we will email you a confirmation and advise you of any items that might be out of stock, and when they are due back in stock.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>
							            </ul>


							            <ul id="payments" class="cd-faq-group">
							                <li class="cd-faq-title">
							                    <h1>Payments</h1>
							                </li>
							                <li>
							                    <a class="cd-faq-trigger black" href="#0">Do I need to pay via credit card or PayPal?</a>
							                    <div class="cd-faq-content">
							                        <p>No, you also have the option to pay for your order via EFT/direct deposit. Furthermore if you are a holder of a 30-day credit account with us, you may wish to place the order onto your account (subject to your credit limit). If you choose to make payment via EFT/direct deposit, you will receive an email with our banking details included. Customers who wish to pick up their order from one of our showrooms are also welcome to pay in-store.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>

							                <li>
							                    <a class="cd-faq-trigger black" href="#0">When is my credit card charged?</a>
							                    <div class="cd-faq-content">
							                        <p>We charge your credit card when we enter your order into our ERP system to ensure the stock is reserved. This also better allows you to have full visibility over your charges, as you know the payment is processed within 24 hours of receiving your order.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>

							            </ul>
							            <!-- cd-faq-group -->


							            <!-- cd-faq-group -->

							            <ul id="delivery" class="cd-faq-group">
							                <li class="cd-faq-title">
							                    <h1>Delivery</h1>
							                </li>
							                <li>
							                    <a class="cd-faq-trigger black" href="#0">How do I know you have received my order?</a>
							                    <div class="cd-faq-content">
							                        <p>After you have completed your order you will receive a confirmation email. Once we have reviewed the order and checked for stock availability, we will send you a follow-up email confirming your order. Please make sure to check your junk mail.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>

							                <li>
							                    <a class="cd-faq-trigger black" href="#0">What locations do you deliver to?</a>
							                    <div class="cd-faq-content">
							                        <p>We deliver all around Dhaka city</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>

							                <li>
							                    <a class="cd-faq-trigger black" href="#0">When will I receive my order?</a>
							                    <div class="cd-faq-content">
							                        <p>Approximately in 2 to 3 hours,if we have all the required items in the stock.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>

							                <li>
							                    <a class="cd-faq-trigger black" href="#0">Do I need to sign for delivery?</a>
							                    <div class="cd-faq-content">
							                        <p>Yes, all deliveries need to be signed for. You may however request for goods to be left without obtaining a signature at your own risk.</p>
							                    </div>
							                    <!-- cd-faq-content -->
							                </li>
							            </ul>
							            <!-- cd-faq-group -->
							        </div>
							        <!-- cd-faq-items -->
							        <a href="#0" class="cd-close-panel">Close</a>
							    </section>

							</center>
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
	 <script src="js/jquery-2.1.1.js"></script>
    <script src="js/jquery.mobile.custom.min.js"></script>
    <script src="js/main.js"></script>
<body>

</html>
