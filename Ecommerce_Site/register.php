<?php
include 'dbConnect.php';
$msg = " ";
if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$nic = $_POST['nic'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$c_password= $_POST['c_password'];
	$user_type = "cus";
	if(empty($firstName)||empty($lastName)||empty($nic)||empty($address)||empty($dob)||empty($gender)||empty($phone)||empty($email)||empty($password)||empty($c_password))
	{
		$msg = "<div class='alert alert-danger'>All fields are required.</div>";
	}
	else
	{
		if($password!==$c_password)
		{
			$msg = "<div class='alert alert-danger'>Password and Confirm Psasword do not match!!.</div>";
		}
		else
		{
			$sql = "INSERT INTO user(firstName,lastName,nic,address,dob,gender,phone,email,password,userType) VALUES('$firstName','$lastName','$nic','$address','$dob','$gender','$phone','$email','$password','$user_type');";
        	$result = mysqli_query($connect,$sql);
		}
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
		<div class="container">
			<div class="title">Signup</div>
			<?php echo $msg; ?>
			<form action="#" method="POST">
				<div class="user-details">
					<div class="input-box">
						<span class="details">First Name</span>
						<input type="text" name="firstName" placeholder="Eg : Saman " required>
					</div>
					<div class="input-box">
						<span class="details">Last Name</span>
						<input type="text" name="lastName" placeholder="Eg : Kumara " required>
					</div>
                    <div class="input-box">
						<span class="details">NIC</span>
						<input type="text" name="nic" placeholder="Enter NIC Number " required>
					</div>
					<div class="input-box">
						<span class="details">Address</span>
						<input type="text" name="address" placeholder="Enter Address " required>
					</div>
					<div class="input-box">
						<span class="details">Date of Birth</span>
						<input type="date" name="dob" required>
					</div>
					<div class="drop-box">
						<span class="details">Gender</span>
						<br><br>
						<select name="gender" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="input-box">
						<span class="details">Phone</span>
						<input type="text" name="phone" placeholder="Eg : 077 xxx xxxx " required>
					</div>
					<div class="input-box">
						<span class="details">Email</span>
						<input type="email" name="email" placeholder="Eg : abc@gamil.com " required>
					</div>
					<div class="input-box">
						<span class="details">Password</span>
						<input type="password" name="password" placeholder="Enter Password " required>
					</div>
					<div class="input-box">
						<span class="details">Confrim Password</span>
						<input type="password" name="c_password" placeholder="Enter Confrim Password " required>
					</div>
				</div>
					<div class="button">
						<input type="submit" value="submit">
					</div>	
			</form>
		</div>
</body>
</html>
