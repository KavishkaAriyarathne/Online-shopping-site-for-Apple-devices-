<?php
  include 'dbConnect.php';
  session_start();
  if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$username = $_POST["email"];
		$password = $_POST["password"];
		if(empty($username)||empty($password))
		{
			echo 'username and password required!!';
		}
		else
		{
			$sql = "select * from user where email='".$username."' AND password='".$password."'";
			$result = mysqli_query($connect,$sql);
			$row = mysqli_fetch_array($result);
			$id = $row['id'];
			if($row)
			{
				if($row["userType"]=="admin")
				{
					$_SESSION["id"] = $row['id'];
					header("location:admindashboard1.php");
				}
				elseif($row["userType"]=="cus")
				{
					$_SESSION["id"] = $row['id'];
					header("location:userProfile.php");
				}
				else
				{
					echo 'Invalid Username Or Password !!';
				}
			}
			else
			{
				echo 'Invalid Username Or Password !!';;
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form action="#" method="POST">
  <div class="form-field">
    <input type="email" name="email" placeholder="Email / Username" required/>
  </div>
  
  <div class="form-field">
    <input type="password" name="password" placeholder="Password" required/>
</div>
  
  <div class="form-field">
    <button class="btn" type="submit">Log in</button>
  </div>
</form>
<!-- partial -->
  
</body>
</html>
