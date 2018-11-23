<?php
		include 'includes/db.php';
			$get_email=$_SESSION['customer_email'];

			$run_pro=$con->query("select * from customer where customer_email='$get_email'");
			$i=0;
			$row=mysqli_fetch_array($run_pro);
						$name=$row['customer_name'];
						$contact=$row['customer_contact'];
						$address=$row['customer_address'];
						$p_id=$row['customer_id'];



			
		?>
<div id="mastercard_container">
<h1 id="profile_heading" style="">Check Home Delivery Address</h1>
				<div id="details" >
					<form id="data_input" action="" method="post">
						<div class="row">
							<label for="uname" class="labels" >Receiver Name:</label>
							<input type="text" value="<?php echo $name; ?>" name="uname" id="uname" class="input_field" required>
						</div>
</br>	
						<div class="row">
									<label for="address" class="labels">Delivery Address:</label>
									<input type="text" name="address" id="address" value="<?php echo $address; ?>" class="input_field" required>
								</div>	
								</br>
						<div class="row">
							<label for="contact" class="labels">Contact No.:</label>
							<input type="text" value="<?php echo $contact; ?>" name="contact" id="contact" class="input_field" required>
						</div>
						</br>
						<input type="submit" name="submit" id="submit" value="Submit" style="display: table-cell; margin-left: 10px;">
						</br>
						</br>

						<?php
				if(isset($_POST['submit'])){
				$cardholder_name = $_POST['uname'];
				$billing_address = $_POST['address'];
				$ucontact=$_POST['contact'];
				$method='Cash';

				$ip=getIp();

				 $total_price=$_GET['product_price'];
				 $percentage = 15;
				$p_price = ($percentage / 100) * $total_price;
				$price_w_vat=$p_price+$total_price;
				$date=date("Y/m/d");
				if(($ucontact == null)||($cardholder_name == null)||($billing_address == null)){
									echo "One or more fields is empty<br>";
								}else{
					$result=$con->query("insert into invoice_info(customer_id,customer_ip,card_name,card_address,product_quantity,total_price,date,status,paid_via,phone) 
						values('$p_id','$ip','$cardholder_name','$billing_address','1',' $price_w_vat','$date','pending','$method','$ucontact')");
					if ($result) {
							 	echo "<script>alert('CheckOut Successful. Please Download The Invoice From Order List')</script>";
							 	$delete_cat=$con->query("delete from cart where ip_address='$ip'");
								echo "<script>window.open('index.php','_self')</script>";
							 }
							 }
					}
						?>
					</form>

					
				

</div>
</div>