<!DOCTYPE html>
<?php 
include("functions/functions.php");
?>
<html>
<head>
	<title>Feed your Feet</title>
	<link rel="stylesheet" href="./styles/style.css" media="all"/>
</head>
<body>

	<div class="main_wrapper">

		<div class="header_wrapper">

			<img id="logo" src="images/logo.jpg" height="160px" width="182px" />
			<img id="banner" src="images/banner.gif" height="160px">

		</div>
		
		<div class="menubar">
				<ul id="menu">
					<li><a href="home.html">Home</a></li>
					<li><a href="home.html">All Shoes</a></li>
					<li><a href="home.html">Account</a></li>
					<li><a href="home.html">Signup</a></li>
					<li><a href="home.html">Shopping Cart</a></li>
					<li><a href="home.html">Contact Us</a></li>	
				</ul>
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search Footweer" />
					<input type="submit" name="search" value="Search"/>
				</form>
			</div>

		</div>

		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					<?php getCats();  ?>
					
				</ul>	
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php getBrands(); ?>
				</ul>	

			</div>

			<div id="content_area">
				<div id="shopping_cart">
					<span style="float:left;font-size: 18px;padding: 5px; ">Welcome to Footweer Store!</span>	
					<b style="float:right;font-size: 18px;padding: 5px;"><a href="cart.php" style="color: yellow;">Go to cart</a></b>
				</div>

				<div id = "product_box">
					<?php 
					if(isset($_GET['pro_id'])){

						$product_id = $_GET['pro_id'];

$get_pro = "select * from products where product_id=$product_id";
$run_pro = mysqli_query($con,$get_pro);

while($row_pro = mysqli_fetch_array($run_pro)){
	$pro_id=$row_pro['product_id'];
	$pro_title=$row_pro['product_title'];
	$pro_price=$row_pro['product_price'];
	$pro_image=$row_pro['product_images'];
	$pro_desc=$row_pro['product_desc'];

	echo "
			<div id='single_product'>
			<h3>$pro_title</h3>
			<img src='admin_area/product_images/$pro_image' width='400' height='300'/> 
			
			<h4>INR $pro_price</h4>
			<h4 style='background:white;'>$pro_desc</h4>
			<a href='index.php' style='float:left;'>Go Back</a>
			<a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
			</div>



	";

}
} ?>
					
				</div>
			</div>
		</div>
			
		<div id="footer">
			<h2 style="text-align: center; padding-top: 30px;">	&copy; 2018 by www.feedyourfeet.com</h2>
		</div>

	</div>

</body>
</html>