<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
include 'includes/db.php';

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{
?>


<center><form  action="" method="post" enctype="multipart/form-data" style="background-color: #1E90FF;">

<b style="font-size: 30px;margin-top: 10px;">Update Header Image:</b><br><br>

<input type="file" name="header_image"  required /> 
<input type="submit" name="header_img"  value="Update Header Image" /><br><br>
<br>
</form>
</center>


<center><form  action="" method="post" enctype="multipart/form-data" style="background-color: #1E90FF;">

<b style="font-size: 30px;margin-top: 10px;">Update Cover Image:</b><br><br>

<input type="file" name="ads_cover_image" required/>
 <input type="submit" name="cover_img"  value="Update Ads Cover"/><br><br>

<br>
</form>
</center>


<center><form  action="" method="post" enctype="multipart/form-data" style="background-color: #1E90FF;">

<b style="font-size: 30px;margin-top: 10px;">Update Center Image:</b><br><br>
<input type="file" name="ads_center_image" required/> 
<input type="submit" name="center_img" value="Update Ads Center"/><br><br>
<br>
</form>
</center>
</body>
</html>
<?php
		

	//Header	
	if (isset($_POST['header_img'])) {
		
		$header_image = $_FILES['header_image']['name'];
		$header_image_tmp = $_FILES['header_image']['tmp_name'];
		move_uploaded_file($header_image_tmp, "../images/$header_image");

	 	$update_header_img=$con->query("update others set header_image='$header_image'");

	  if ($update_header_img) {
	  			 	echo "<script>alert('HEader Image Updated!')</script>";
				 	echo "<script>window.open('index.php?update_3_image','_self')</script>";
				 }
	}

	//Cover

	if (isset($_POST['cover_img'])) {
		$cover_image = $_FILES['ads_cover_image']['name'];
		$cover_image_tmp = $_FILES['ads_cover_image']['tmp_name'];
		move_uploaded_file($cover_image_tmp, "../images/$cover_image");

	$update_cover_image=$con->query("update others set ads_cover_image='$cover_image'");
	if ($update_cover_image) {
					

				 	echo "<script>alert('Cover Image Updated!')</script>";
				 	echo "<script>window.open('index.php?update_3_image','_self')</script>";
				 }
	}

	//center

	if (isset($_POST['center_img'])) {
		$center_image = $_FILES['ads_center_image']['name'];
					$center_image_tmp = $_FILES['ads_center_image']['tmp_name'];
					move_uploaded_file($center_image_tmp, "../images/slide_images/$center_image");

	$update_center_image=$con->query("update others set ads_center_image='$center_image'");
	if ($update_center_image) {
				 	echo "<script>alert('Center Image Updated!')</script>";
				 	echo "<script>window.open('index.php?update_3_image','_self')</script>";
				 }
	}

?>


<?php
}
?>