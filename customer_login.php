<?php
session_start();
include("includes/db.php"); 
?>

<div>
	
	<form method="post" action="">

		<table width="500" align="center" bgcolor="yellow">
			<tr>
				<td colspan="4"><h2>Login or Register to Buy</h2></td>
			</tr>

			<tr>
				<td align="right"><b>Email:</b></td>
				<td align="left"><input type="text" name="email" placeholder="enter email" required /></td>
			</tr>

			<tr>
				<td align="right"><b>Password:</b></td>
				<td align="left"><input type="password" name="pass" placeholder="enter password" required></td>
			</tr>

			<tr align="center">
				<td colspan="4"><a href="checkout.php?forgot_pass">Forgot Password</a></td>
			</tr>

			<tr align="center">

				<td colspan="4"><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>

		<h2 style="float:left; padding: 5px"><a href="customer_register.php" style="color: red;">New User? Register Here</a></h2>
		

	</form>

<?php
if(isset($_POST['login'])){
	$c_email= $_POST['email'];
	$c_pass = $_POST['pass'];

	$sel_c = "select * from customers where customer_pass = '$c_pass' AND customer_email = '$c_email'";

	$run_c = mysqli_query($con,$sel_c);

	$check_customer = mysqli_num_rows($run_c);

	if($check_customer==0){
		echo "<script>alert('Password or Email is incorrect. Try Again!')</script>";
		exit();
	}

$ip = getIP();
$sel_cart = "select * from cart where ip_add='$ip'";

	$run_cart = mysqli_query($con,$sel_cart);

	$check_cart = mysqli_num_rows($run_cart);

	if($check_customer>0 AND $check_cart==0){
$_SESSION['customer_email']=$c_email;
echo "<script>alert('Logged In!!')</script>";
echo "<script>window.open('customer/myaccount.php','_self')</script>";

	}else{
		$_SESSION['customer_email']=$c_email;
echo "<script>alert('Logged In!!')</script>";
echo "<script>window.open('checkout.php','_self')</script>";

	}


}

?>

</div>