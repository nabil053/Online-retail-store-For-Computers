

<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{

?>
<form action="" method="post" style="margin-top: 300px;">
<b>Insert New Category:</b>
<input type="text" name="new_cat" required><br><br>
<input type="submit" name="add_cat" value="Add Category"/>
</form>

<?php
	include 'includes/db.php';


	if (isset($_POST['add_cat'])) {
	$new_cat=$_POST['new_cat'];

	$insert_cat=$con->query("insert into categories(category_title) values('$new_cat')");
	if ($insert_cat) {

				 	echo "<script>alert('New Category Inserted!')</script>";
				 	echo "<script>window.open('index.php?view_category','_self')</script>";
				 }
	}



?>

<?php
}
?>