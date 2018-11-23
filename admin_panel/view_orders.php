
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>

<table width="795" align="center" height="300" bgcolor="#1E90FF" border="2px groove black">
		<tr align="center">
			<td colspan="6"><h2>View All Orders</h2></td>
		</tr>
		<tr align="center">
			<td>Id</td>
			<td>Customer Id</td>
			<td>Customer Ip</td>
			<td>Card No</td>
			<td>Card Name</td>
			<td>Card Address</td>
			<td>Month</td>
			<td>Year</td>
			<td>Cvc</td>
				<td>Product Quantity</td>
			<td>Total Price</td>
				<td>Order Date</td>
			<td>Status</td>
			<td>Status Edit</td>
			<td>Delete</td>

		</tr>
		
		<?php
			include 'includes/db.php';
			$run_c=$con->query("SELECT * FROM invoice_info ");

			$i=0;
			while ($row=mysqli_fetch_array($run_c)) {
					$id=$row['id'];
					$c_id=$row['customer_id'];
					$c_ip=$row['customer_ip'];
					$c_num=$row['card_num'];
					$c_name=$row['card_name'];
					$c_address=$row['card_address'];
					$c_mm=$row['card_mm'];
					$c_yy=$row['card_yy'];
					$c_cvc=$row['card_cvc'];
					$c_quantity=$row['product_quantity'];
					$c_price=$row['total_price'];
					$c_date=$row['date'];
					$c_status=$row['status'];
					$i++;
				
		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $c_id; ?></td>
			<td><?php echo $c_ip; ?></td>
			<td><?php echo $c_num; ?></td>
			<td><?php echo $c_name; ?></td>
			<td><?php echo $c_address; ?></td>
			<td><?php echo $c_mm; ?></td>
			<td><?php echo $c_yy; ?></td>
			<td><?php echo $c_cvc; ?></td>
			<td><?php echo $c_quantity; ?></td>
			<td><?php echo $c_price; ?></td>
			<td><?php echo $c_date; ?></td>
			<td><?php echo $c_status; ?></td>
			<td><a href="index.php?edit_orders=<?php echo $id; ?>">Status Edit</a></td>
			<td><a href="delete_orders.php?delete_orders=<?php echo $id; ?>">Delete</a></td>

		</tr>

		<?php
			}
		?>




</table>

<?php
}

?>
