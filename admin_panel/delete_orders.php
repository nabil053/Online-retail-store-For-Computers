<?php
session_start();

	include 'includes/db.php';

	if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{					
						
	if (isset($_GET['delete_orders'])) {
		$delete_id=$_GET['delete_orders'];


		$delete=$con->query("delete from invoice_info where id='$delete_id'");

		if ($delete) {
			echo "<script>alert('Orders has been Deleted!')</script>";
				 	echo "<script>window.open('index.php?view_category','_self')</script>";
		}

	}



}
?>