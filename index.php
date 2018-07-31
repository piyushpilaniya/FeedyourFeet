<?php session_start(); ?>
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

			<a href="index.php"><img id="logo" src="images/logo.jpg" height="160px" width="182px" /></a>
			<img id="banner" src="images/banner.gif" height="160px">

		</div>
		
		<div class="menubar">
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="allproducts.php">All Footweer</a></li>
					<li><a href="customer/myaccount.php">Account</a></li>
					<li><a href="home.html">Signup</a></li>
					<li><a href="cart.php">Shopping Cart</a></li>
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
				<?php cart(); ?>
				<div id="shopping_cart">
					<span style="float:left;font-size: 18px;padding: 5px; ">Welcome to Footweer Store!</span>	
					<span style="float:right;font-size: 18px;padding: 5px; ">Total items in cart:<?php 
					total_items();
					?></span>
					<span style="float:right;font-size: 18px;padding: 5px; ">Total Price:<?php 
					total_price();
					?></span>	
					
					<b style="float:right;font-size: 18px;padding: 5px;"><a href="cart.php" style="color: yellow;text-decoration: none;">Go to cart</a><?php
						if(!isset($_SESSION['customer_email'])){
							echo " or <a href='checkout.php' style='color:red;'>Login</a>";
						}else{
							echo " or <a href='logout.php' style='color:red;'>Log Out</a>";
						}
					?></b>

					
				</div>

				<div id = "product_box">
					<?php getPro(); ?>
					<?php getCatPro(); ?>
					<?php getBrandPro(); ?>
				</div>
			</div>
		</div>
			
		<div id="footer">
			<h2 style="text-align: center; padding-top: 30px;">	&copy; 2018 by www.feedyourfeet.com</h2>
		</div>

	</div>

</body>
</html>