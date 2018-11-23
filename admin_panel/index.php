<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="styles\style.css">
</head>
<body>

		<div class="main_wrapper">
			<a href="index.php"><div id="header"></div></a>
			<h2>Admin: <?php echo $_SESSION['admin_email'];?></h2>
			<div id="right">
				<h2 style="text-align: center;">Manage Content</h2>
				<a href="../index.php" target="_blank">View Site</a>
				<a href="index.php?insert_product">Insert New Product</a>
				<a href="index.php?view_product">View All Product</a>
				<a href="index.php?insert_category">Insert New Category</a>
				<a href="index.php?view_category">View All Categories</a>
				<a href="index.php?insert_brand">Insert New Brands</a>
				<a href="index.php?view_brand">View All Brands</a>
				<a href="index.php?view_customers">View Customers</a>
				<a href="index.php?view_orders">View Orders</a>
				<!-- <a href="index.php?view_payments">View Payments</a> -->
				<a href="index.php?update_3_image">Update 3 Image</a>
				<a href="index.php?update_slides">Update Slides</a>
				<a href="index.php?news_feed">Update News Feed</a>
				<a href="index.php?view_message">View Customer Message</a>
				<a href="logout.php">Admin Logout</a>


			</div>
			<div id="left">


					<h2 style="color: red;text-align: center;"><?php echo @$_GET['logged_in'];?></h2>
					<?php
						if (isset($_GET['insert_product'])) {
							include ("insert_product.php");
						}

						if (isset($_GET['view_product'])) {
							include ("view_product.php");
						}
						if (isset($_GET['edit_product'])) {
							include ("edit_product.php");
						}

						if (isset($_GET['insert_category'])) {
							include ("insert_cat.php");
						}

						if (isset($_GET['view_category'])) {
							include ("view_category.php");
						}

						if (isset($_GET['edit_cat'])) {
							include ("edit_cat.php");
						}


						if (isset($_GET['insert_brand'])) {
							include ("insert_brand.php");
						}

						if (isset($_GET['view_brand'])) {
							include ("view_brand.php");
						}

						if (isset($_GET['edit_brand'])) {
							include ("edit_brand.php");
						}

						if (isset($_GET['view_orders'])) {
							include ("view_orders.php");
						}

						if (isset($_GET['edit_orders'])) {
							include ("edit_orders.php");
						}

						if (isset($_GET['view_message'])) {
							include ("view_message.php");
						}

						if (isset($_GET['view_customers'])) {
							include ("view_customers.php");
						}
						if (isset($_GET['update_3_image'])) {
							include ("update_3_image.php");
						}
						if (isset($_GET['update_slides'])) {
							include ("update_slides.php");
						}
						if (isset($_GET['news_feed'])) {
							include ("news_feed.php");
						}


						echo '<br>'.'<br>'.'<br>';	
					?>



			</div>
		</div>


</body>
</html>

<?php

}
?>