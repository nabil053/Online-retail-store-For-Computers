<?php

session_start();
?>

<!DOCTYPE html>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/login.css" media="all"/>
</head>
<body>

<div class="login">

	<h2 style="color: red;text-align: center;"><?php echo @$_GET['not_admin']; ?></h2>
	<h2 style="color: white;text-align: center;"><?php echo @$_GET['logged_out']; ?></h2>


	<h1>Admin Login</h1>
    <form method="post" action="login.php">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
</div>

</html>

<?php

include 'includes/db.php';

	if (isset($_POST['login'])) {

		$email=mysqli_real_escape_string($con,$_POST['email']);
		$pass=mysqli_real_escape_string($con,$_POST['pass']);
		$user=$con->query("select * from admins where admin_email='$email' and admin_pass='$pass'");
		
		if (mysqli_num_rows($user)==1) {
			$_SESSION['admin_email']=$email;
			echo "<script>window.open('index.php?logged_in=You Have Successfully Logged in!!!','_self')</script>";
		}else{
			
		echo "<script>alert('Password or Email is Wrong!!!!'+$email)</script>";

		}

	}


?>