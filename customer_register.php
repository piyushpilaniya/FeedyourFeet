<?php session_start() ?>
<!DOCTYPE html>
<?php 
include("functions/functions.php");
include("includes/db.php");

	
	if(isset($_POST['register'])){
	
	$ip = getIp();

	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_country = $_POST['c_country'];
	$c_image = $_FILES['c_image']['name'];

	$c_image_tmp = $_FILES['c_image']['tmp_name'];

	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_contact'];
	$c_address = $_POST['c_address'];
	
	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

	$insert_c = "insert into customers (customer_ip,customer__name,customer_email,customer_pass,	customer_country,customer_city,customer_contact,customer_addess,	customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
	$run_c = mysqli_query($con,$insert_c);

	$sel_cart = "select * from cart where ip_add='$ip'";

	$run_cart = mysqli_query($con,$sel_cart);

	$check_cart = mysqli_num_rows($run_cart);

	if($check_cart==0){
$_SESSION['customer_email']=$c_email;
echo "<script>alert('Account created')</script>";
echo "<script>window.open('customer/myaccount.php','_self')</script>";


}else{
$_SESSION['customer_email']=$c_email;
echo "<script>alert('Account created')</script>";
echo "<script>window.open('checkout.php','_self')</script>";

	
}

	}
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
					
					<b style="float:right;font-size: 18px;padding: 5px;"><a href="cart.php" style="color: yellow;">Go to cart</a></b>
				</div>

				<form method = "post" action = "customer_register.php" enctype="multipart/form-data">
					
					<table align="center" width="800" bgcolor="yellow">

						<tr>
							<td align="center" colspan="5"><b>Create Account at FeedyourFeet.com</b></td>
						</tr>

						<tr>
							<td align="right"><b>Full Name:</b></td>
							<td align="left"><input type="text" name="c_name" required></td>
						</tr>
						

						<tr>
							<td align="right"><b>Email:</b></td>
							<td align="left"><input type="text" name="c_email" required/></td>
						</tr>

						<tr>
							<td align="right"><b>Password:</b></td>
							<td align="left"><input type="password" name="c_pass" required/></td>
						</tr>

						<tr>
							<td align="right"><b>Image</b></td>
							<td align="left"><input type="file" name="c_image" required/></td>
						</tr>
						<tr>
							<td align="right"><b>Country</b></td>
							<td align="left">
								<select name="c_country">
									<option>Select a country</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>United Kingdom</option>
									<option>Finland</option>
									<option>Scotland</option>
									<option>Afganistan</option>
									<option>Norway</option>
									<option>British Colombia</option>
								
								</select>
							</td>
						</tr>

						<tr>
							<td align="right"><b>City</b></td>
							<td align="left"><input type="text" name="c_city" required/></td>
						</tr>

						<tr>
							<td align="right"><b>Address</b></td>
							<td align="left"><textarea cols="20" rows="10" name="c_address"></textarea></td>
						</tr>

						<tr>
							<td align="right"><b>Contact No.:</b></td>
							<td align="left"><input type="text" name="c_contact" required/></td>
						</tr>
						<tr>
							
							<td align="center" colspan="4"><input type="submit" name="register" value="Create Account"></td>
						</tr>

					</table>

				</form>

			</div>
		</div>
			
		<div id="footer">
			<h2 style="text-align: center; padding-top: 30px;">	&copy; 2018 by www.feedyourfeet.com</h2>
		</div>

	</div>

</body>
</html

