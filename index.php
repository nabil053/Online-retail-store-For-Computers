<!DOCTYPE html>
<?php
session_start();

?>

<head>
	<Title>VPN Computers</Title>
	<link rel="stylesheet" href="styles/style.css" media="all">
	<link  href="js/slide.js" >
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
							echo "<b>Welcome:<b/>".$_SESSION['customer_email']." | <b style='color: black'>Your </b>";
						}else{
							echo "<b>Welcome Guest!</b>";
						}
					?>

					 <b style="color: black"> Shopping Cart -</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>  | <a href="cart.php" style="color: black;"> Go To Cart</a>
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
  						
			</div>
			<!--Slide part Ends -->
			

				<!--feature Area starts -->
				<div id="feature_area" style="height: 70px;background: black;color: white;">
						<h2 style="padding-top: 15px; "><marquee behavior='scroll' direction='left'><?php getNewsFeed(); ?></marquee></h2>

				</div>
				<!--feature Area starts -->
				<!--feature Area starts -->
				<div id="banner_area" >
						<img src="images\slide_images\<?php getCenterAdsImg(); ?>">
				</div>
				<!--feature Area starts -->

				<!--Content Area starts -->
				<div id="content_area">
						<div id="products_box">
							<?php getProducts(); ?>
							<?php getBrandProducts(); ?>	
							<?php getCategoryProducts(); ?>
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
