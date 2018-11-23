<!DOCTYPE>

<?php 

include("includes\db.php"); 
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{


	if (isset($_GET['edit_product'])) {
		$get_id=$_GET['edit_product'];

		$run_pro=$con->query("select * from products where product_id='$get_id'");

			$i=0;
		$row=mysqli_fetch_array($run_pro);

					$pro_id=$row['product_id'];

					$pro_title=$row['product_title'];
					$pro_image=$row['product_image'];
					$pro_price=$row['product_price'];
					$pro_des=$row['product_description'];
					$pro_keywords=$row['product_keyword'];
					$pro_cat=$row['product_cat'];
					$pro_brnd=$row['product_brand'];

					$get_cat=$con->query("select * from categories where category_id='$pro_cat'");
					$row_cat=mysqli_fetch_array($get_cat);
					$cat_title=$row_cat['category_title'];

					$get_brnd=$con->query("select * from brands where brand_id='$pro_brnd'");
					$row_brnd=mysqli_fetch_array($get_brnd);
					$brnd_title=$row_brnd['brand_title'];
	}

?>

<html>
<head>
	<title>Admin: Update Post</title>


</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		
		<table align="center" width="795px" bgcolor="#228B22" border="5">
			<tr align="center">
				<td colspan="7"><h2>Update Post</h2></td>
			</tr>	
			<tr>
				<td align="right"><b>Product Title</b></td>
				<td><input type="text" name="product_title" size="60" value="<?php echo $pro_title; ?>"></td>
			</tr>


			<tr>
				<td align="right"><b>Product Category</b></td>
				<td>
					<select name="product_cat" required>
						
							<option><?php echo $cat_title; ?></option>
							<?php

									$run_categories = $con->query("select * from categories");

									while($row_categories=mysqli_fetch_assoc($run_categories)){
											$category_id = $row_categories['category_id'];
											$category_title = $row_categories['category_title'];

											echo "<option value='$category_id'>$category_title</option>";

										}

							?>	


					</select>
				</td>
			</tr>


			<tr>
				<td align="right"><b>Product Brand</b></td>
				<td>

					<select name="product_brand" required>
						
							<option><?php echo $brnd_title; ?></option>
							<?php

									$run_brands = $con->query("select * from brands");

											while($row_brands=mysqli_fetch_assoc($run_brands)){
													$brand_id = $row_brands['brand_id'];
													$brand_title = $row_brands['brand_title'];
													echo "<option value='$brand_id'>$brand_title</option>";

											}

							?>	


					</select>	

				</td>
			</tr>


			<tr>
				<td align="right"><b>Product Image</b></td>
				<td><input type="file" name="product_image"/><img src="product_images/<?php echo $pro_image; ?>" width="100" height="100px"/></td>
			</tr>


			<tr>
				<td align="right"><b>Product Price</b></td>
				<td><input type="text" name="product_price" value="<?php echo $pro_price; ?>"/></td>
			</tr>


			<tr>
				<td align="right"><b>Product Description</b></td>
				<td><textarea name="product_description" cols="30" rows="10"><?php echo $pro_des; ?></textarea></td>
			</tr>


			<tr>
				<td align="right"><b>Product Keywords</b></td>
				<td><input type="text" name="product_keyword" size="50" value="<?php echo $pro_keywords; ?>"/></td>
			</tr>


			<tr align="center" >
				<td colspan="7"><input type="submit" name="update_post" value="Update Post"></td>
			</tr>
			
		</table>

	</form>


</body>
</html>


<?php
	
	if (isset($_POST['update_post'])) {

		$update_id=$pro_id;
		//Getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brands = $_POST['product_brndelopers'];
		$product_price = $_POST['product_price'];
		$product_des= $_POST['product_description'];
		$product_keyword= $_POST['product_keyword'];

		//Getting the text data from the fields
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		//$product_null_image=$_FILES['$pro_image']['name'];


		move_uploaded_file($product_image_tmp, "product_images/$product_image");
		
			$result=$con->query("update products set product_cat='$product_cat',product_brands='$product_brands',product_title='$product_title',product_price='$product_price',product_description='$product_des',product_image='$product_image',product_keyword='$product_keyword' where product_id='$update_id'");
	
		if ($result) {
				 	echo "<script>alert('Post has been Updated!')</script>";
				 	echo "<script>window.open('index.php?view_product','_self')</script>";
				 }
		}
	

}
?>