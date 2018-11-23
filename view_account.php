


<table width="1000px" align="center" bgcolor="orange" >
		<tr align="center">
			<td colspan="6" ><h2 >View All Customers</h2></td>
		</tr>
		<tr align="center">
			<td>Sno.</td>
			<td>Name</td>
			<td>Image</td>
			<td>email</td>
			<td>Country</td>
			<td>City</td>
			<td>Contact</td>
			<td>Address</td>
			<td>Gender</td>
			<td>pass</td>
			<!-- <td>Edit</td> -->

		</tr>
		<?php

			$cname=$_SESSION['customer_email'];

			include 'includes/db.php';
			$run_c=$con->query("SELECT * FROM `customer` where customer_email='$cname'");

			$i=0;
			while ($row=mysqli_fetch_array($run_c)) {
					$c_id=$row['customer_id'];
					$c_name=$row['customer_name'];
					$c_email=$row['customer_email'];
					$c_image=$row['customer_image'];
					$c_country=$row['customer_country'];
					$c_city=$row['customer_city'];
					$c_contactl=$row['customer_contact'];
					$c_address=$row['customer_address'];
					$c_gender=$row['customer_gender'];
					$c_pass=$row['customer_pass'];
									
					$i++;
				
		?>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $c_name; ?></td>
			<td><img src="customer/customer_images/<?php echo $c_image; ?>" width="100" height="100"/></td>
			<td><?php echo $c_email; ?></td>
			<td><?php echo $c_country; ?></td>
			<td><?php echo $c_city; ?></td>
			<td><?php echo $c_contactl; ?></td>
			<td><?php echo $c_address; ?></td>
			<td><?php echo $c_gender; ?></td>
			<td><?php echo $c_pass; ?></td>
			<!-- <td><a href="index.php?edit_account=<?php //echo $c_id; ?>">Edit</a></td> -->
			

		</tr>

		<?php
			}
		?>




</table>
