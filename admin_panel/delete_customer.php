<?php
session_start();

	include 'includes/db.php';
	if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{					
						
	if (isset($_GET['delete_customer'])) {
		$delete_id=$_GET['delete_customer'];


		$delete_pro=$con->query("delete from customer where customer_id='$delete_id'");

		if ($delete_pro) {
			echo "<script>alert('Customer Deleted!')</script>";
				 	echo "<script>window.open('index.php?view_customers','_self')</script>";
		}

	}

}


?>