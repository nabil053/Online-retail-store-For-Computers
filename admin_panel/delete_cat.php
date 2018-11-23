<?php
session_start();

	include 'includes/db.php';

	if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{					
						
	if (isset($_GET['delete_cat'])) {
		$delete_id=$_GET['delete_cat'];


		$delete_cat=$con->query("delete from categories where category_id='$delete_id'");

		if ($delete_cat) {
			echo "<script>alert('Category has been Deleted!')</script>";
				 	echo "<script>window.open('index.php?view_category','_self')</script>";
		}

	}



}
?>