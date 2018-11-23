
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>

<table width="795" align="center" bgcolor="#1E90FF" border="2px groove black">
		<tr align="center">
			<td colspan="6"><h2>View Customer Message</h2></td>
		</tr>
		<tr align="center">
			<td>Id </td>
			<td>Ip</td>
			<td>Name</td>
			<td>Email</td>
			<td>Subject</td>
			<td>Message</td>
			<td>Delete</td>

		</tr>
		<?php
			include 'includes/db.php';
			$run_c=$con->query("SELECT * FROM `messages` ");

			$i=0;
			while ($row=mysqli_fetch_array($run_c)) {
					$id=$row['id'];
					$c_ip=$row['customer_ip'];
					$c_name=$row['customer_name'];
					$c_email=$row['customer_email'];
					$c_sub=$row['subject'];
					$c_message=$row['message'];
					
					$i++;
				
		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $c_ip; ?></td>
			<td><?php echo $c_name; ?></td>
			<td><?php echo $c_email; ?></td>
			<td><?php echo $c_sub; ?></td>
			<td><?php echo $c_message; ?></td>
			
			<td><a href="delete_message.php?delete_message=<?php echo $id; ?>">Delete</a></td>

		</tr>

		<?php
			}
		?>

</table>

<?php
}

?>