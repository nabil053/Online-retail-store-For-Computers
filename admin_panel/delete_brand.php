<?php
session_start();

	include 'includes/db.php';	
	if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{				
						
	if (isset($_GET['delete_brand'])) {
		$delete_id=$_GET['delete_brand'];


		$delete_brnd=$con->query("delete from brands where brand_id='$delete_id'");

		if ($delete_brnd) {
			echo "<script>alert('Brand has been Deleted!')</script>";
				 	echo "<script>window.open('index.php?view_brand','_self')</script>";
		}

	}

}


?>