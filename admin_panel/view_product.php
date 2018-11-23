<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>

<table width="795" align="center" bgcolor="#1E90FF">
		<tr align="center">
			<td colspan="6"><h2>View All Products Here</h2></td>
		</tr>
		<tr align="center">
			<td>Sno.</td>
			<td>Title</td>
			<td>Iamge</td>
			<td>Price</td>
			<td>Edit</td>
			<td>Delete</td>

		</tr>
		<?php
			include 'includes/db.php';
			$run_pro=$con->query("select * from products");

			$i=0;
			while ($row=mysqli_fetch_array($run_pro)) {
					$pro_id=$row['product_id'];
					$pro_title=$row['product_title'];
					$pro_image=$row['product_image'];
					$pro_price=$row['product_price'];
					$i++;
				
		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $pro_title; ?></td>
			<td><img src="product_images/<?php echo $pro_image; ?>" width="100" height="100"/></td>
			<td><?php echo $pro_price; ?></td>
			<td><a href="index.php?edit_product=<?php echo $pro_id; ?>">Edit</a></td>
			<td><a href="delete_product.php?delete_product=<?php echo $pro_id; ?>">Delete</a></td>

		</tr>

		<?php
			}
		?>




</table>

<?php
}

?>