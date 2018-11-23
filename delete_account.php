<?php
session_start();

	include 'includes/db.php';

			
						
	if (isset($_GET['delete_account'])) {
		$delete_id=$_GET['delete_account'];


		$delete=$con->query("delete from customer where customer_id='$delete_id'");

		if ($delete) {
			echo "<script>alert('Your account is Deleted!')</script>";
			session_destroy();
				 	echo "<script>window.open('index.php','_self')</script>";
		}

	}




?>