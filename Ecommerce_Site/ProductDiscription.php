<?php
include 'dbConnect.php';
session_start();

$uId = $_SESSION["id"];

	
	if(isset($_POST['checkout'])){
	//$proID = $_GET['data']; 
		$proID = $_POST['pid'];

	}

	if(isset($_POST['addToCart'])){
		$proID = $_POST['pId'];
		$userId = $_POST['uId'];
		$proPrice = $_POST['price'];

		$sql1 = "SELECT * FROM cart WHERE userId = '$uId' AND finished = 0 AND pid = '$proID'";
  
	    if ($result1 = mysqli_query($connect, $sql1)) {
	        $rowcount = mysqli_num_rows( $result1 );
	    }

		if($rowcount == 0){

		    $sql = "INSERT INTO cart(userId,pid,totalCost,quantity,finished) VALUES('$userId','$proID','$proPrice',1, 0)";
		    $result = mysqli_query($connect,$sql);
		    if($result){
		        echo 'done';
		    }

		}else{

			echo "This Product Already Added to Cart!!";
		}

	}


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
}

.coupon {
  border: 5px dotted #bbb;
  width: 100%;
  border-radius: 15px;
  margin: 0 auto;
  max-width: 100%;
}

.container {
  padding: 2px 16px;
  background-color: #f1f1f1;
}

.promo {
  background: #ccc;
  padding: 3px;
}

.expire {
  color: red;
}

.button {
  background-color: #1A2238; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button1 {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}



.btn-group button {
  background-color: #04AA6D; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}




</style>
</head>
<body>
    


<br>
<div class="btn-group">
  <a href="userProfile.php"><button>Home</button></a>
  <a href="cart.php"><button>Cart <i class="fa fa-shopping-cart" style="font-size:14px"></i></button></a>
  <a href="index.php"><button>Logout</button></a>
</div>

<br>
<br>
<div class="coupon">
  <div class="container">
    <h3></h3>
  </div>
  <?php 
         
        $sql = "SELECT DISTINCT pid,name,details,price,image,quantity FROM product where pid = '$proID' ";
        $result = $connect->query($sql);
        while($row = $result->fetch_assoc()){
            $pId = $row['pid'];
            $pName = $row['name'];
            $pPrice = $row['price'];
            $pImage = $row['image'];
            $pDetails = $row['details'];
            $pStock = $row['quantity'];
  ?>
	  <img src="ProductImage/<?php echo $pImage; ?>" alt="<?php echo $pName; ?>" style="width:30%;">
	  <div class="container" style="background-color:white">
	    <h2><b><?php echo $pName; ?></b></h2> 
	    <p><?php echo $pDetails; ?></p>
	  </div>

	  <?php 
            }
        ?>
	  <div class="container">
	    <p>In Stock: <span class="promo"><?php echo $pStock; ?></span></p>
	    <p>Price: <span class="promo"> <?php echo $pPrice; ?> Rs</span></p>
	  </div>
	 
</div>
<form action="ProductDiscription.php" method="POST">
	<input type="hidden" name="pId" value="<?php echo $pId; ?>">
	<input type="hidden" name="uId" value="<?php echo $uId; ?>">
	<input type="hidden" name="price" value="<?php echo $pPrice; ?>">
	<button class="button button2" name="addToCart">Add to Cart</button>
</form>
 
</body>
</html> 
