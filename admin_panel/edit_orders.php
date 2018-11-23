<?php
	include 'includes/db.php';

	if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{


	$id=$_GET['edit_orders'];

	$get_status=$con->query("select * from invoice_info where id='$id'");
	$row_cat=mysqli_fetch_array($get_status);
	$id=$row_cat['id'];
	$status=$row_cat['status'];
?>
<form action="" method="post" style="margin-top: 300px;">
<b>Update Category:</b>
<input type="text" name="new_status" value="<?php echo $status; ?>"><br><br>
<input type="submit" name="update_stat" value="Update Status"/>
</form>

<?php
	if (isset($_POST['update_stat'])) {
		$update_id=$id;
	$new_stat=$_POST['new_status'];

	$update_cat=$con->query("update `invoice_info` set status='$new_stat' where id='$id'");
	if ($update_cat) {
				 	echo "<script>alert('Status Updated!')</script>";
				 	echo "<script>window.open('index.php?view_orders','_self')</script>";
				 }
	}


}
?>