<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>


<table width="795" align="center" bgcolor="#1E90FF">
		<tr align="center">
			<td colspan="6"><h2>View All Category Here</h2></td>
		</tr>
		<tr align="center">
			<td>Category Id</td>
			<td>Category Title</td>
			<td>Edit</td>
			<td>Delete</td>

		</tr>
		<?php
			include 'includes/db.php';
			$run_cat=$con->query("select * from categories");

			$i=0;
			while ($row=mysqli_fetch_array($run_cat)) {
					$cat_title=$row['category_title'];
					$cat_id=$row['category_id'];
					$i++;
				
		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $cat_title; ?></td>
			<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
			<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>

		</tr>

		<?php
			}
		?>




</table>

<?php
}

?>