<?php

	$con = mysqli_connect("localhost","root","","retail_store");

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MYSQL: ".mysqli_connect_error();
	}

// Getting the user ip Address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}
//Creating the shopping cart

 function getCart(){

 	if (isset($_GET['add_cart'])) {

		global $con;

		$ip=getIp();

 		$cart_product_id=$_GET['add_cart'];

 		//query for check if this product added by user or not for prevent duplicate insertion
 		$cart_run_check=$con->query("select * from cart where ip_address='$ip' AND product_id='$cart_product_id'");

 		if (mysqli_num_rows($cart_run_check)>0) {
 			echo "";
 		}else{
 				$run_products = $con->query("insert into cart(product_id,ip_address,quantity) values('$cart_product_id','$ip','1')");

 				echo "<script>window.open('index.php','_self')</script>";
 		}
 	}
 }

 //getting the total added items
 function total_items(){
 		if (isset($_GET['add_cart'])) {
	 			global $con;
	 			$ip=getIp();
	 			$run_items=$con->query("select * from cart where ip_address='$ip'");
	 			$count_items=mysqli_num_rows($run_items);
 			}else{
				global $con;
 				$ip=getIp();
	 			$select_items=$con->query("select * from cart where ip_address='$ip'");
	 			$count_items=mysqli_num_rows($select_items);
 			}
 			echo $count_items;
 }

 //getting the total price of the items
function total_price(){
						$total=0;

						global $con;

						$ip=getIp();

						$select_ip=$con->query("select * from cart where ip_address='$ip'");
						while ($p_ip=mysqli_fetch_array($select_ip)) {
							$p_id=$p_ip['product_id'];
							$p_price=$con->query("select * from products where product_id='$p_id'");
							while ($pro_price=mysqli_fetch_array($p_price)) {
								$product_price=array($pro_price['product_price']);
								$values=array_sum($product_price);
								$total+=$values;
							}
						}
			echo '$'.$total;
}

//getting the Brands

function getBrands(){
	global $con;

	$run_brands = $con->query("select * from brands limit 8");

	while($row_brands=mysqli_fetch_assoc($run_brands)){
			$brand_id = $row_brands['brand_id'];
			$brand_title = $row_brands['brand_title'];

			echo "<li><a href='index.php?brnds=$brand_id'><center>$brand_title</center></a></li>";

	}
}

function getCats(){
	global $con;

	$run_cats = $con->query("select * from categories limit 8");
	while($row_cats=mysqli_fetch_assoc($run_cats)){
			$cat_id = $row_cats['category_id'];
			$cat_title = $row_cats['category_title'];
			echo "<li><a href='index.php?cats=$cat_id'><center>$cat_title</center></a></li>";

	}
}


function getProducts(){
	if (!isset($_GET['brnds']) && !isset($_GET['cats'])) {
	global $con;
	$run_products = $con->query("select * from products order by product_id desc limit 0,8");
	while($row_products=mysqli_fetch_assoc($run_products)){
			$product_id = $row_products['product_id'];
			$product_title = $row_products['product_title'];
			$product_cat = $row_products['product_cat'];
			$product_brand = $row_products['product_brand'];
			$product_price =$row_products['product_price'];
			$product_image = $row_products['product_image'];
			echo "		
				<div id='single_product_homepage'>
					<h4 id='homePageTitle'>$product_title</h4>
					<img src='admin_panel/product_images/$product_image' width='200' height='180' />
					<p id='price'><b>Price: $ $product_price</b></p></br>
				
					<a href='view.php?product_id=$product_id'><button class='button button1' style='float:left;'>View</button></a>
					<a href='index.php?add_cart=$product_id'><button class='button button2' style='float:right;'>Add to Cart</button></a>
					
				</div>
			";
		}
	}
}

//Brand base product will be shown
function getBrandProducts(){
	if (isset($_GET['brnds'])) {
		$brand_id = $_GET['brnds'];
	
	global $con;

	$run_brnd_products = $con->query("select * from products where product_brand='$brand_id'");

	$count_brands=mysqli_num_rows($run_brnd_products);

		if ($count_brands==0) {
					echo "<h3><marquee behavior='alternate' direction='right'>There is no product available of this Brand!!!</marquee></h3>";
					
					}
	

	while($row_brnd_products=mysqli_fetch_assoc($run_brnd_products)){

			$product_id = $row_brnd_products['product_id'];
			$product_title = $row_brnd_products['product_title'];
			$product_cat = $row_brnd_products['product_cat'];
			$product_brands = $row_brnd_products['product_brand'];
			$product_price =$row_brnd_products['product_price'];
			$product_image = $row_brnd_products['product_image'];



			
			echo "
					
				<div id='single_product_homepage'>

					<h4 id='homePageTitle'>$product_title</h4>

					<img src='admin_panel/product_images/$product_image' width='200' height='180' />

					<p id='price'><b>Price: $ $product_price</b></p></br>

					<a href='view.php?product_id=$product_id'><button class='button button1' style='float:left;'>View</button></a>
					<a href='index.php?add_cart=$product_id'><button class='button button2' style='float:right;'>Add to Cart</button></a>
				</div>


			";
		

		}
	}
}

function getCategoryProducts(){
	if (isset($_GET['cats'])) {
		$cat_id = $_GET['cats'];
	
	global $con;

	$run_cat_products = $con->query("select * from products where product_cat='$cat_id'");

	$count_cats=mysqli_num_rows($run_cat_products);

		if ($count_cats==0) {
					echo "<h3><marquee behavior='alternate' direction='right'>There is no product available of this Category!!!</marquee></h3>";
					
					}
	

	while($row_cat_products=mysqli_fetch_assoc($run_cat_products)){

			$product_id = $row_cat_products['product_id'];
			$product_title = $row_cat_products['product_title'];
			$product_cat = $row_cat_products['product_cat'];
			$product_brands = $row_cat_products['product_brand'];
			$product_price =$row_cat_products['product_price'];
			$product_image = $row_cat_products['product_image'];
			echo "
					
				<div id='single_product_homepage'>

					<h4 id='homePageTitle'>$product_title</h4>

					<img src='admin_panel/product_images/$product_image' width='200' height='180' />

					<p id='price'><b>Price: $ $product_price</b></p></br>

					<a href='view.php?product_id=$product_id'><button class='button button1' style='float:left;'>View</button></a>
					<a href='index.php?add_cart=$product_id'><button class='button button2' style='float:right;'>Add to Cart</button></a>
				</div>


			";
		

		}
	}
}


/*Slide show*/
function getSlideProducts($pro_id){
	global $con;
	$run_products = $con->query("select * from products where product_id <> '$pro_id' order by rand() limit 0,4");
	while($row_products=mysqli_fetch_assoc($run_products)){
			$product_id = $row_products['product_id'];
			$product_title = $row_products['product_title'];
			$product_cat = $row_products['product_cat'];
			$product_brands = $row_products['product_brand'];
			$product_price =$row_products['product_price'];
			$product_image = $row_products['product_image'];
			echo "
				<div id='slide_product' >

					<a href='view.php?product_id=$product_id' style='text-align: center;float:left;color: white;'><h4 id='homePageTitle'>$product_title</h4></a>
					</br>
					<a href='view.php?product_id=$product_id' style='float:left; '><img src='admin_panel/product_images/$product_image' width='200' height='180' /></a>

					</br>
				</div>


			";

		}
	
}


?>


