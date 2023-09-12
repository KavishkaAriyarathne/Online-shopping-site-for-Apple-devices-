<?php
include 'dbConnect.php';

session_start();
$uId = $_SESSION["id"];


if(isset($_POST['invoice'])){

    /*$userID  = $_POST['uID'];
    $cartID  = $_POST['cID'];
    $subTot  = $_POST['Total'];*/
    $uId." , ";
    $fName  = $_POST['firstname'];
    $email  = $_POST['email'];
    $address  = $_POST['address'];
    $city  = $_POST['city'];
    $state  = $_POST['state'];
    $zip  = $_POST['zip'];
    $cardname  = $_POST['cardname'];
    $cardnumber  = $_POST['cardnumber'];
    $expMonth  = $_POST['expmonth'];
    $expYear  = $_POST['expyear'];
    $cvv  = $_POST['cvv'];


 
    $str = $cardnumber;
    $arr1 = str_split($str);

    //echo count($arr1);


 $sql = "INSERT INTO paymentdetails(userID, name, email, address, city, state, zip, nameOnCard, cardNumber, expMonth, expYear, cvv) VALUES('$uId','$fName','$email','$address','$city','$state','$zip','$cardname','$cardnumber','$expMonth','$expYear','$cvv')";
        $result = mysqli_query($connect,$sql);
        if($result){
            //echo 'done';
            header("location:invoice.php");
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
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
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

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="payment.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name='firstname' placeholder="A.U anjana">

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name='email' placeholder="anjana@example.com">

            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name='address' placeholder="542, Kurunagala street, kandy">

            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name='city' placeholder="Kandy">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name='state' placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name='zip' placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name='cardname' placeholder="Anjana Umendra">

            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name='cardnumber' placeholder="1111-2222-3333-4444">

            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name='expmonth' placeholder="September">
            
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name='expyear' placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name='cvv' placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
       <!-- <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label> -->
        <input type="submit" name="invoice" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
<?php 
    $sql1 = "SELECT * FROM cart WHERE userId = '$uId' AND finished = 0";
  
    if ($result1 = mysqli_query($connect, $sql1)) {
        $rowcount = mysqli_num_rows( $result1 );
    }else{

        $rowcount = 0;
    }
      

?>


    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $rowcount; ?> </b></span></h4>

        <?php 
            $subTotal = 0;

            $sql = "SELECT product.name,cart.quantity,cart.totalCost FROM cart INNER JOIN product ON cart.pid = product.pid WHERE userId = '$uId' AND finished = 0";
            $result = $connect->query($sql);
                while($row = $result->fetch_assoc()){
                    $pName = $row['name'];
                    $pTotal = $row['totalCost'];
                    $cQuant = $row['quantity'];

                     $subTotal =  $subTotal + $pTotal;

        ?>

            <p><a href="#"><?php echo $pName; ?></a> x <?php echo $cQuant; ?> <span class="price"><?php echo $pTotal; ?> Rs</span></p>
        <?php
                }
        ?>
      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo $subTotal; ?> Rs</b></span></p>
    </div>
  </div>
</div>

</body>
</html>
