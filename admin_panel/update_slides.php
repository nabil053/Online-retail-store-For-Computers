<?php
include 'includes/db.php';
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{
?>


<center><form action="" method="post" enctype="multipart/form-data" style="background-color: #1E90FF;">
<b style="font-size: 20px;margin-top: 10px;">Update Slide1 :</b><br><br>
<input type="file" name="product_image1" value="" required/> <input type="submit" name="update_slide1" value="Update Slide 1"/><br>
<br>
</form>

<form action="" method="post" style="background-color: #1E90FF;">

<b style="font-size: 20px;margin-top: 10px;">Update Slide2 :</b><br><br>
<input type="file" name="product_image2" required/> <input type="submit" name="update_slide2" value="Update Slide 2"/><br>
<br>
</form>

<form action="" method="post" style="background-color: #1E90FF;">

<b style="font-size: 20px;margin-top: 10px;">Update Slide3 :</b><br><br>
<input type="file" name="product_image3" required/> <input type="submit" name="update_slide3" value="Update Slide 3"/><br>
<br>
</form>

<form action="" method="post" style="background-color: #1E90FF;">

<b style="font-size: 20px;margin-top: 10px;">Update Slide4 :</b><br><br>
<input type="file" name="product_image4" required/> <input type="submit" name="update_slide4" value="Update Slide 4"/><br>
<br>
</form>

<form action="" method="post" style="background-color: #1E90FF;">

<b style="font-size: 20px;margin-top: 10px;">Update Slide5 :</b><br><br>
<input type="file" name="product_image5" required/> <input type="submit" name="update_slide5" value="Update Slide 5"/><br>
<br>
</form>

<form action="" method="post" style="background-color: #1E90FF;">

<b style="font-size: 20px;margin-top: 10px;">Update Slide6 :</b><br><br>
<input type="file" name="product_image6" required/> <input type="submit" name="update_slide6" value="Update Slide 6"/><br>
<br>
</form>

<form action="" method="post" style="background-color: #1E90FF;">

<b style="font-size: 20px;margin-top: 10px;">Update Slide7 :</b><br><br>
<input type="file" name="product_image7" required/> <input type="submit" name="update_slide7" value="Update Slide 7"/><br>

<br>
</form>
</center>

<?php

	//Slide 1
	if (isset($_POST['update_slide1'])) {
	
		$slide_image1 = $_FILES['product_image1']['name'];
		$product_image1_tmp = $_FILES['product_image1']['tmp_name'];

		move_uploaded_file($product_image1_tmp, "../images/slide_images/$slide_image1");

		$result=$con->query("Update others SET slide_image_1 ='$slide_image1'");
		if ($result) {
				 	echo "<script>alert('Slide1 Updated!')</script>";
				 	echo "<script>window.open('index.php?update_slides','_self')</script>";
				 }
	}

	//Slide 2
	if (isset($_POST['update_slide2'])) {
	
		$slide_image2 = $_FILES['product_image2']['name'];
		$product_image2_tmp = $_FILES['product_image2']['tmp_name'];

		move_uploaded_file($product_image2_tmp, "../images/slide_images/$slide_image2");

		$result=$con->query("Update others SET slide_image_2 ='$slide_image2'");
		if ($result) {
				 	echo "<script>alert('Slide2 Updated!')</script>";
				 	echo "<script>window.open('index.php?update_slides','_self')</script>";
				 }
	}

	//Slide 3
	if (isset($_POST['update_slide3'])) {
	
		$slide_image3 = $_FILES['product_image3']['name'];
		$product_image3_tmp = $_FILES['product_image3']['tmp_name'];

		move_uploaded_file($product_image3_tmp, "../images/slide_images/$slide_image3");

		$result=$con->query("Update others SET slide_image_3 ='$slide_image3'");
		if ($result) {
				 	echo "<script>alert('Slide3 Updated!')</script>";
				 	echo "<script>window.open('index.php?update_slides','_self')</script>";
				 }
	}

	//Slide 4
	if (isset($_POST['update_slide4'])) {
	
		$slide_image4 = $_FILES['product_image4']['name'];
		$product_image4_tmp = $_FILES['product_image4']['tmp_name'];

		move_uploaded_file($product_image4_tmp, "../images/slide_images/$slide_image4");

		$result=$con->query("Update others SET slide_image_4 ='$slide_image4'");
		if ($result) {
				 	echo "<script>alert('Slide4 Updated!')</script>";
				 	echo "<script>window.open('index.php?update_slides','_self')</script>";
				 }
	}

	//Slide 5
	if (isset($_POST['update_slide5'])) {
	
		$slide_image5 = $_FILES['product_image5']['name'];
		$product_image5_tmp = $_FILES['product_image5']['tmp_name'];

		move_uploaded_file($product_image5_tmp, "../images/slide_images/$slide_image5");

		$result=$con->query("Update others SET slide_image_5 ='$slide_image1'");
		if ($result) {
				 	echo "<script>alert('Slide5 Updated!')</script>";
				 	echo "<script>window.open('index.php?update_slides','_self')</script>";
				 }
	}

	//Slide 6
	if (isset($_POST['update_slide6'])) {
	
		$slide_image6 = $_FILES['product_image6']['name'];
		$product_image6_tmp = $_FILES['product_image6']['tmp_name'];

		move_uploaded_file($product_image6_tmp, "../images/slide_images/$slide_image6");

		$result=$con->query("Update others SET slide_image_6 ='$slide_image6'");
		if ($result) {
				 	echo "<script>alert('Slide6 Updated!')</script>";
				 	echo "<script>window.open('index.php?update_slides','_self')</script>";
				 }
	}

	//Slide 7
	if (isset($_POST['update_slide7'])) {
	
		$slide_image7 = $_FILES['product_image7']['name'];
		$product_image7_tmp = $_FILES['product_image1']['tmp_name'];

		move_uploaded_file($product_image7_tmp, "../images/slide_images/$slide_image7");

		$result=$con->query("Update others SET slide_image_7 ='$slide_image7'");
		if ($result) {
				 	echo "<script>alert('Slide7 Updated!')</script>";
				 	echo "<script>window.open('index.php?update_slides','_self')</script>";
				 }
	}


?>

<?php
}

?>