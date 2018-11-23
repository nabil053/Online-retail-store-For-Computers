
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>

<table width="795" align="center" bgcolor="#1E90FF" >
		<tr align="center">
			<td colspan="6"><h2>View All Brands Here</h2></td>
		</tr>
		<tr align="center">
			<td>Brand Id</td>
			<td>Brand Title</td>
			<td>Edit</td>
			<td>Delete</td>

		</tr>
		<?php
			include 'includes/db.php';
			$run_brnd=$con->query("select * from brands");

			$i=0;
			while ($row=mysqli_fetch_array($run_brnd)) {
					$brnd_title=$row['brand_title'];
					$brnd_id=$row['brand_id'];
					$i++;
				
		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $brnd_title; ?></td>
			<td><a href="index.php?edit_brand=<?php echo $brnd_id; ?>">Edit</a></td>
			<td><a href="delete_brand.php?delete_brand=<?php echo $brnd_id; ?>">Delete</a></td>

		</tr>

		<?php
			}
		?>




</table>

<?php
}

?>