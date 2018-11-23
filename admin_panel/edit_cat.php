<?php
	include 'includes/db.php';

	if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{


	$cat_id=$_GET['edit_cat'];

	$get_cat=$con->query("select * from categories where category_id='$cat_id'");
	$row_cat=mysqli_fetch_array($get_cat);
	$cat_id=$row_cat['category_id'];
	$cat_title=$row_cat['category_title'];
?>


<form action="" method="post" style="margin-top: 300px;">
<b>Update Category:</b>
<input type="text" name="new_cat" value="<?php echo $cat_title; ?>"><br><br>
<input type="submit" name="update_cat" value="Update Category"/>
</form>

<?php
		
	if (isset($_POST['update_cat'])) {
		$update_id=$cat_id;
		$new_cat=$_POST['new_cat'];

	$update_cat=$con->query("update categories set category_title='$new_cat' where category_id='$update_id'");
	if ($update_cat) {

				 	echo "<script>alert('Category Updated!')</script>";
				 	echo "<script>window.open('index.php?view_category','_self')</script>";
				 }
	}


}
?>