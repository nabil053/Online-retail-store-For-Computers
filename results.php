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
							<!-- All Products will display here -->
								
							<?php
									if(isset($_GET['search'])){

										$search_query=$_GET['user_query'];
//select * from products where product_title like '%$search_query%'
							$run_products = $con->query("select * from products where product_title like '%$search_query%' OR product_cat IN (SELECT category_id FROM categories WHERE category_title like '%$search_query%') OR product_brand IN (select brand_id from brands where brand_title like '%$search_query%')");
									while($row_products=mysqli_fetch_assoc($run_products)){
											$product_id = $row_products['product_id'];
											$product_title = $row_products['product_title'];
											$product_cat = $row_products['product_cat'];
											$product_brands = $row_products['product_brand'];
											$product_price =$row_products['product_price'];
											$product_image = $row_products['product_image'];
											echo "													
												<div id='single_product_homepage'>
					<h4 id='homePageTitle'>$product_title</h4>
					<img src='admin_panel/product_images/$product_image' width='200' height='180' />
					<p id='price'><b>Price: $ $product_price</b></p></br>
				
					<a href='view.php?product_id=$product_id'><button class='button button1' style='float:left;'>View</button></a>
					<a href='index.php?add_cart=$product_id'><button class='button button2' style='float:right;'>Add to Cart</button></a>
					
				</div>
											";
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
