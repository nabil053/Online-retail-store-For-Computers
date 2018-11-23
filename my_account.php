
<!DOCTYPE html>
<?php
session_start();

?>

<head>
	<Title>VPN Computers</Title>
	<link rel="stylesheet" href="styles/style.css" media="all">
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
					<div class="slide_wrapper">
				
				<!--Sidebar starts -->
				<div id="Adsbar">
						<?php
								if (!isset($_SESSION['customer_email'])) {
											$loginShow=1;
										}else{
											$loginShow=0;
											?>
											<div id="stitle"><center>My Account:</center></div>
											<center><ul id="brnds">
													<?php
														$user=$_SESSION['customer_email'];
														$get_img=$con->query("select * from customer where customer_email='$user'");
														$row_image=mysqli_fetch_array($get_img);
														$c_img=$row_image['customer_image'];
														$c_id=	$row_image['customer_id'];
														echo "<img src='customer/customer_images/$c_img' width='80' height='80'/>";
													?>
													<li style="margin-bottom: 25px;margin-top: 20px;"><a href="my_account.php?view_account" style="font-size: 15px;">View Account</a></li>	
													<li style="margin-bottom: 25px;margin-top: 20px;"><a href="my_account.php?my_orders" style="font-size: 15px;">My Orders</a></li>
													<li style="margin-bottom: 25px;"><a href="my_account.php?edit_account=<?php echo $c_id; ?>" style="font-size: 15px;">Edit Account</a></li>
													<!-- <li style="margin-bottom: 25px;"><a href="my_account.php?change_password" style="font-size: 15px;">Change Password</a></li> -->
													<li style="margin-bottom: 25px;"><a href="my_account.php?delete_account=<?php echo $c_id; ?>" style="font-size: 15px;">Delete Account</a></li>
											</ul></center>
											<?php
										}
						?>

						
						
				</div>
				<div id="slide_area">
						

  				</div>
			</div>

				<!--Content Area starts -->
				<div id="content_area">
						


						<div id="products_box">
								<?php
									if ($loginShow==1) {
										include "customer_login.php";
									}else{
										
							if (isset($_GET['view_account'])) {	
							include ("view_account.php");
						}

							if (isset($_GET['my_orders'])) {
							include ("my_orders.php");
						}

						if (isset($_GET['edit_account'])) {
							include ("edit_account.php");
						}

						if (isset($_GET['delete_account'])) {
							include ("delete_account.php");
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

<body>

</html>
