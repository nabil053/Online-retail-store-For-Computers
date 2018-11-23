<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>


<table width="795" align="center" bgcolor="#1E90FF">
		<tr align="center">
			<td colspan="6"><h2>View All Customers</h2></td>
		</tr>
		<tr align="center">
			<td>Sno.</td>
			<td>Name</td>
			<td>Image</td>
			<td>email</td>
			<td>Delete</td>

		</tr>
		<?php
			include 'includes/db.php';
			$run_c=$con->query("SELECT * FROM `customer` ");

			$i=0;
			while ($row=mysqli_fetch_array($run_c)) {
					$c_id=$row['customer_id'];
					$c_name=$row['customer_name'];
					$c_email=$row['customer_email'];
					$c_image=$row['customer_image'];
					$i++;
				
		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $c_name; ?></td>
			<td><img src="../customer/customer_images/<?php echo $c_image; ?>" width="100" height="100"/></td>
			<td><?php echo $c_email; ?></td>
			<td><a href="delete_customer.php?delete_customer=<?php echo $c_id; ?>">Delete</a></td>

		</tr>

		<?php
			}
		?>




</table>

<?php
}

?>