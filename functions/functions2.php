<?php
$con = mysqli_connect("localhost","root","","retail_store");

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MYSQL: ".mysqli_connect_error();
	}



function getHeaderImg(){
	global $con;

	$get_header_img=$con->query("select header_image from others where id=2");

	while($row=mysqli_fetch_assoc($get_header_img)){
			$header_img_id=$row['header_image'];
			echo "$header_img_id";
	}
}

function getCoverAdsImg(){
	global $con;

	$get_cover_ads_img=$con->query("select ads_cover_image from others where id=2");

	while($row=mysqli_fetch_assoc($get_cover_ads_img)){
			$cover_ads_id=$row['ads_cover_image'];
			echo "$cover_ads_id";
	}
}

function getCenterAdsImg(){
	global $con;

	$get_center_ads_img=$con->query("select ads_center_image from others where id=2");

	while($row=mysqli_fetch_assoc($get_center_ads_img)){
			$center_ads_id=$row['ads_center_image'];
			echo "$center_ads_id";
	}
}

function getNewsFeed(){
	global $con;

	$get_news_feed=$con->query("select news_feed from others where id=2");

	while($row=mysqli_fetch_assoc($get_news_feed)){
			$news_feed_id=$row['news_feed'];
			echo "<a><center>$news_feed_id</center></a>";
	}
}



function getImgSlide1(){
	global $con;

	$get_img_slide1=$con->query("select slide_image_1 from others where id=2");

	while($row=mysqli_fetch_assoc($get_img_slide1)){
			$img_slide1_id=$row['slide_image_1'];
			echo "$img_slide1_id";
	}
}
function getImgSlide2(){
	global $con;

	$get_img_slide2=$con->query("select slide_image_2 from others where id=2");

	while($row=mysqli_fetch_assoc($get_img_slide2)){
			$img_slide2_id=$row['slide_image_2'];
			echo "$img_slide2_id";
	}
}

function getImgSlide3(){
	global $con;

	$get_img_slide3=$con->query("select slide_image_3 from others where id=2");

	while($row=mysqli_fetch_assoc($get_img_slide3)){
			$img_slide3_id=$row['slide_image_3'];
			echo "$img_slide3_id";
	}
}

function getImgSlide4(){
	global $con;

	$get_img_slide4=$con->query("select slide_image_4 from others where id=2");

	while($row=mysqli_fetch_assoc($get_img_slide4)){
			$img_slide4_id=$row['slide_image_4'];
			echo "$img_slide4_id";
	}
}

function getImgSlide5(){
	global $con;

	$get_img_slide5=$con->query("select slide_image_5 from others where id=2");

	while($row=mysqli_fetch_assoc($get_img_slide5)){
			$img_slide5_id=$row['slide_image_5'];
			echo "$img_slide5_id";
	}
}

function getImgSlide6(){
	global $con;

	$get_img_slide6=$con->query("select slide_image_6 from others where id=2");

	while($row=mysqli_fetch_assoc($get_img_slide6)){
			$img_slide6_id=$row['slide_image_6'];
			echo "$img_slide6_id";
	}
}

function getImgSlide7(){
	global $con;

	$get_img_slide7=$con->query("select slide_image_7 from others where id=2");

	while($row=mysqli_fetch_assoc($get_img_slide7)){
			$img_slide7_id=$row['slide_image_7'];
			echo "$img_slide7_id";
	}
}




?>