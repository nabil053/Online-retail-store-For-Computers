<?php
	include 'includes/db.php';

	if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

	$brnd_id=$_GET['edit_brnd'];

	$get_brnd=$con->query("select * from brands where brand_id='$brnd_id'");
	$row_brnd=mysqli_fetch_array($get_brnd);
	$brnd_id=$row_brnd['brndeloper_id'];
	$brnd_title=$row_brnd['brndeloper_title'];
?>


<form action="" method="post" style="margin-top: 300px;">
<b>Update brndeloper:</b>
<input type="text" name="new_brnd" value="<?php echo $brnd_title; ?>"><br><br>
<input type="submit" name="update_brnd" value="Update brndeloper"/>
</form>

<?php
		
	if (isset($_POST['update_brnd'])) {
		$update_id=$brnd_id;
	$new_brnd=$_POST['new_brnd'];

	$update_brnd=$con->query("update brands set brand_title='$new_brnd' where brand_id='$update_id'");
	if ($update_brnd) {

				 	echo "<script>alert('brndeloper Updated!')</script>";
				 	echo "<script>window.open('index.php?view_brnd','_self')</script>";
				 }
	}


}
?>