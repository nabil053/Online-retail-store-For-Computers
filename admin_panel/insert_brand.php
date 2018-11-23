<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{
?>
<form action="" method="post" style="margin-top: 300px;">
<b>Insert New Brands:</b>
<input type="text" name="new_brnd" required><br><br>
<input type="submit" name="add_brnd" value="Add Brand"/>
</form>

<?php
	include 'includes/db.php';
	if (isset($_POST['add_brnd'])) {
	$new_brnd=$_POST['new_brnd'];

	$insert_brnd=$con->query("insert into brands(brand_title) values('$new_brnd')");
	if ($insert_brnd) {

				 	echo "<script>alert('New Brand Inserted!')</script>";
				 	echo "<script>window.open('index.php?view_brand','_self')</script>";
				 }
	}



?>

<?php
}

?>