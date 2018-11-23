
<div>
	<br>
	<center><form method="post" action="">
		<table width="500" align="center" bgcolor="#1E90FF" style="border: 3px double white;border-spacing: 5px;">
				<tr>
					<td colspan="3"><h2 align="center">Login or Register To Buy!!!</h2></td>

				</tr>
				<tr>
					<td align="right"><b>Email:</b></td>
					<td><input type="text" name="email" placeholder="Enter Email" id="useremail" required></td>
				</tr>
				<tr>
					<td align="right"><b>Password:</b></td>
					<td><input type="password" name="password" placeholder="Enter Password" id="password" required></td>
					
				</tr>
				<!-- <tr align="center">
					<td colspan="3"><a href="checkout.php?forgot_pass" style="text-decoration: none;">Forgot Pass?</a></td>

				</tr> -->

				<tr align="center">
					<td colspan="3"><input class='button button2' type="submit"  id="login" name="login" value="Login"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
		</table>
		<br>
		<a href="customer_register.php" style="float: left;margin: 10px 10px 10px 250px;text-decoration: none;font-size: 20px;border: 2px solid black; background: black;color: white; padding: 2px;" > Register Now</a>

	</form></center>
	<br>

</div>
 <?php
 include("includes\db.php"); 



if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user=$con->query("select * from customer where customer_email='$email' and customer_pass='$password'");
		$check_customer=mysqli_num_rows($user);
		if ($check_customer==0) {
		// 	echo "<script>window.open('index.php','_self')</script>";
		// }else{
			echo "<script>alert('Password or Email is Wrong!!!!'+$email)</script>";
			//rest of the page will not execute
			exit();
		}


		$ip=getIp();
		$select_Cart = "select * from cart where ip_address='$ip'";
				$run_Cart=mysqli_query($con,$select_Cart);
				$check_Cart=mysqli_num_rows($run_Cart);

				//no orders
				if ($check_customer >0 AND $check_Cart==0) {
					$_SESSION['customer_email']=$email;
					echo "<script>alert('Login Successfully.')</script>";
					echo "<script>window.open('my_account.php','_self')</script>";
				}else{ //customer have select something to order
					$_SESSION['customer_email']=$email;
					echo "<script>alert('Login Successfully.')</script>";
					echo "<script>window.open('checkout.php','_self')</script>";
				}


	}
 ?>
