<?php
include 'includes/db.php';

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php?not_admin=Your are not an Admin!','_self')</script>";
}else{
?>


<form action="" method="post" enctype="multipart/form-data" style=" background-color: #1E90FF;height: 300px;">
<center><b style="font-size: 30px;margin-top: 10px;">Update News Feed:</b><br><br>
<textarea name="new_news_feed" required></textarea>
<br><br>
<input type="submit" name="update_news_feed" value="Update"/>
</form></center>

<?php
		
	if (isset($_POST['update_news_feed'])) {
		$news=$_POST['new_news_feed'];
	$update_cat=$con->query("update others set news_feed='$news'");
	if ($update_cat) {

				 	echo "<script>alert('News Feed Updated!')</script>";
				 	echo "<script>window.open('index.php?news_feed','_self')</script>";
				 
	}


}
?>

<?php
}

?>