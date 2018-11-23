<?php

		include 'includes/db.php';
		if (isset($_GET['edit_account'])) {
			$get_id=$_GET['edit_account'];

			$run_pro=$con->query("select * from customer where customer_id='$get_id'");
			$i=0;
		
			$row=mysqli_fetch_array($run_pro);

						$pro_id=$row['customer_id'];

						$name=$row['customer_name'];
						$email=$row['customer_email'];
						$pass=$row['customer_pass'];
						$country=$row['customer_country'];
						$city=$row['customer_city'];
						$contact=$row['customer_contact'];
						$address=$row['customer_address'];
						$gender=$row['customer_gender'];
						$image=$row['customer_image'];
		}


		if(isset($_POST['update_submit'])){
							
							
							$c_id=$get_id;
							$username = $_POST['username'];
							$password = $_POST['password'];
							$country = $_POST['country'];
							$city = $_POST['city'];
							$email = $_POST['email'];
			
							$contact = $_POST['contact'];
							$address = $_POST['address'];
				
							$gender = $_POST['maleorfemale'];
							//Getting the text data from the fields
			$pimage = $_FILES['pimage']['name'];
		$pimage_tmp = $_FILES['pimage']['tmp_name'];


		move_uploaded_file($pimage_tmp, "customer/customer_images/$pimage");
		
			
							if($username != null){
								$query = "UPDATE customer SET customer_name= '$username' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							if($password != null){
								$query = "UPDATE customer SET customer_pass='$password' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							if($country != null){
								$query = "UPDATE customer SET customer_country='$country' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							if($city != null){
								$query = "UPDATE customer SET customer_city='$city' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							if($email != null){
								$query = "UPDATE customer SET customer_email='$email' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							if($contact != null){
								$query = "UPDATE customer SET customer_contact='$contact' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							if($address != null){
								$query = "UPDATE customer SET customer_address='$address' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							
						if($gender != null){
								$query = "UPDATE customer SET customer_gender='$gender' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}
							if ($pimage!=null) {
						
								$query = "UPDATE customer SET customer_image='$pimage' WHERE customer_id='$c_id'";
								$result=mysqli_query($con,$query);
							}

							echo "<script>alert('User Details Updated!')</script>";

			
}
	?>
	<h1 id="profile_heading" style="">Update User's Profile</h1>
				<div id="details" >
					<form id="details_input" action=""  method="post"  enctype="multipart/form-data">
						<div class="row">
							<label for="username" class="labels" >Username:</label>
							<input type="text" value="<?php echo $name; ?>" name="username" id="username" class="input_field_update" required>
						</div>

</br>

						<div class="row">
							<label for="password" class="labels" >Password:</label>
							<input type="text" value="<?php echo $pass; ?>" name="password" id="password" class="input_field_update" required>
						</div>
</br>
						<div class="row">
							<label for="country" class="labels">Country:</label>
							<input type="text" value="<?php echo $country; ?>" name="country" id="country" class="input_field_update" required>
						</div>
</br>
						<div class="row">
							<label for="city" class="labels">City:</label>
							<input type="text" value="<?php echo $city; ?>" name="city" id="city" class="input_field_update" required>
						</div>
</br>
						<div class="row">
							<label for="email" class="labels">Email:</label>
							<input type="text" value="<?php echo $email; ?>" name="email" id="email" class="input_field_update" required>
						</div>
						</br>
						<div class="row">

									<label for="profile_image" class="labels">Profile Image: </label>

								<input type="file" class='button button2' name="pimage"  required>
									<!-- <input type="file" id="profile_image" name="profile_image"/>
									<img src="customer/customer_images/<?php echo $image; ?>" width="100" height="100px"> -->
									
								</div>
</br>	
						<div class="row">
									<label for="address" class="labels">Address:</label>
									<input type="text" name="address" id="address" value="<?php echo $address; ?>" class="input_field_register" required>
								</div>
								</br>
						<div class="row">
									<label for="gender" class="labels">Gender:</label>
									<div id="gender" class="input_field_register"> 
										<input type="radio" name="maleorfemale" value="Male" >Male
										<input type="radio" name="maleorfemale" value="Female">Female
									</div>
								</div>	
								</br>
						<div class="row">
							<label for="contact" class="labels">Contact No.:</label>
							<input type="text" value="<?php echo $contact; ?>" name="contact" id="contact" class="input_field_update" required>
						</div>
						</br>
						<input type="submit" name="update_submit" value="Update" class="buttons">
						</br>
						</br>
					</form>

					
				

</div>