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
	//must be used to use session in this page;
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
							echo "<b>Welcome:<b/>".$_SESSION['customer_email']." | <b style='color: orange'>Your </b>";
						}else{
							echo "<b>Welcome Guest!</b>";
						}
					?>
					<b style="color: black"> Shopping Cart -</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>  | <a href="index.php" style="color: black;"> Back To Buy</a>

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
				<div id="content_area">
						<div id="products_box">
							<br>
							<center><form action="" method="post" enctype="multipart/form-data">
									<table align="center" width="700" bgcolor="#1E90FF" style="border: 3px double white;border-spacing: 5px;">
										<tr align="center">
											<th>Remove</th>
											<th>Product(S)</th>
											<th>Quantity</th>
											<th>Total Price: </th>
										</tr>

										<?php
											$total=0;
											$quantity=1;
											global $con;

											$ip=getIp();

											$select_ip=$con->query("select * from cart where ip_address='$ip'");
											while ($p_ip=mysqli_fetch_array($select_ip)) {
												$p_id=$p_ip['product_id'];									
												$p_product=$con->query("select * from products where product_id='$p_id'");

												while ($pro_product=mysqli_fetch_array($p_product)) {
													$product_price=array($pro_product['product_price']);
													$product_title=$pro_product['product_title'];
													$product_image=$pro_product['product_image'];
													$single_price=$pro_product['product_price'];
													 $value=array_sum($product_price);;
													 $total+=$value;
										?>

										<tr align="center">
											<td><input type="checkbox" name="remove[]" value="<?php echo $p_id; ?>"></td>
											<td><?php echo $product_title; ?><br>
												<img src="admin_panel/product_images/<?php echo $product_image; ?>" width="100px" height="100px"/>
											</td>
											<td><input type="text" size="4" name="quantity" value="<?php echo $_POST['quantity'] ?>" /></td>
											<?php

												
												if (isset($_POST['update_cart'])) {
													$quantity=$_POST['quantity'];
													$update_quantity=$con->query("update cart set quantity='$quantity'");
													//to keep the quantity value in the session box 
													//default arrays $_POST,$_GET,S_files,S_seddion super global arrays predefined in php

													$_POST['quantity']=$quantity;

													$total=$total*intval($quantity);
												}

												global $con;
												$ip=getIp();



												if (isset($_POST['update_cart'])) {
													foreach ($_POST['remove'] as $removeID) {
														$delete_product=$con->query("delete from cart where product_id='$removeID' AND ip_address='$ip'");
														if($delete_product){
																//redirect the sam page	
															echo "<script>window.open('cart.php','_self')</script>";

														}

													}
												}

												if (isset($_POST['continue'])) {
													echo "<script>window.open('index.php','_self')</script>";
												}

											?>

											<td><?php echo '$'.$single_price; ?></td>
										</tr>

										<?php
												}
											}
										?>	

										<tr align="right">
											<td colspan="4"><h2 ><b>Sub Total: </b></h2></td>
											<td ><h2 style="margin-right: 10px"><?php echo '$'.$total; ?></h2></td>
										</tr>

										

										<tr align="center">

											<td ><input class='button button3' type="submit" name="update_cart" value="Update Cart"/></td>
											<td colspan="2"><input class='button button3' type="submit" name="continue" value="Continue Buying"/></td>
											<td colspan="2">  <a href="checkout.php?product_price=<?php echo $total; ?>&pmethod=card" style="text-decoration: none;font-size: 15px;border: 2px solid black;  padding: 2px;" class='button button2'> Checkout by Card</a>
											</br></br>
											<h5>Or</h5>
											</br>
											<a href="checkout.php?product_price=<?php echo $total; ?>&pmethod=cash" style="text-decoration: none;font-size: 15px;border: 2px solid black; padding: 2px;" class='button button2'> Checkout by Cash</a> </td>
										</tr>

									</table>

							</form></center>

							

							<br>
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
