<?php
include 'dbConnect.php';

session_start();
$uId = $_SESSION["id"];

$pay=0;

if(isset($_POST['addQuantity'])){
    $quant  = $_POST['quantity'];
    $cartNum  = $_POST['cID'];
    $pPrice  = $_POST['pPrice'];

    $totalCost = $pPrice * $quant;

    $sql= "UPDATE cart SET totalCost ='$totalCost', quantity = '$quant' WHERE cid  = '$cartNum'";
    mysqli_query($connect, $sql);
        

}

if(isset($_POST['removeItem'])){
    $cartNum  = $_POST['cID'];
    $sql= "DELETE FROM cart WHERE cid  = '$cartNum'";
    mysqli_query($connect, $sql);
        

}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Apple Store | Ecommerce Website</title>
        <link rel="stylesheet" href="cart.css">

        <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

    </head>

    <body>
    <div class="header">
        <div class="container">
        
            <div class="navbar">
                <div class="logo">
                    <img src="images/logogold.jpeg" width="300px">
                </div>
                <nav>
                    <ul>
                    <li><a href="userProfile.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="index.php">Logout</a></li>
                    <li>
                        <div class="dropdown"><button class="dropbtn">Products</button>
                            <div class="dropdown-content">
                                <a href="iPhone.php">iPhones</a>
                                <a href="MacBook.php">MacBooks</a>
                                <a href="iPad.php">iPads</a>
                                <a href="Apple Watch.php">Watch</a>
                                <a href="Airpods.php">Airpods</a>
                            </div>
                            
                        </div>
                    </li>
                    <li><a href=""><input type="text" placeholder="what you are looking for?">
                        <button type="submit">Search</button></a></li>
                    </ul>
                </nav>  
            </div>
             
            </div>    
        </div>
    </div> 
        
   
<!-------- Cart------->
    <div class="small-container">
        <h2 class="title">Shopping Cart</h2>
        <div class="col-4">
           
                <table border="0px">
                    <tr height="15px">
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Remove</th>
                        <th></th>


                    </tr> 
                    <tr height="35px">
                    <?php 

                        $sql = "SELECT cart.cid,cart.pid,product.name,cart.quantity,product.price,product.image FROM cart INNER JOIN product ON cart.pid = product.pid WHERE userId = '$uId' AND finished = 0";
                        $result = $connect->query($sql);
                        
                        while($row = $result->fetch_assoc()){
                           
                            $cartId = $row['cid'];
                            $pId = $row['pid'];
                            $pName = $row['name'];
                            $pPrice = $row['price'];
                            $cQuant = $row['quantity'];
                            $pImage = $row['image'];

                            //set Max Value
                            $sql6 = "SELECT quantity FROM product WHERE pid = '$pId'";
                            $result6 = mysqli_query($connect,$sql6);
                            $row6 = mysqli_fetch_array($result6);

                            $proStock = $row6['quantity'];

                    ?>
                        <td width="15%">
                            <?php echo $pName; ?><br>
                            <img src="ProductImage/<?php echo $pImage; ?>" >
                            
                        </td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="number" name="quantity" style="padding:5px; border-radius:10px; margin-right: 10px;" value="<?php echo $cQuant; ?>" max="<?php echo $proStock; ?> " min = "1"> 
                                <input type="hidden" name="cID" value="<?php echo $cartId; ?>"> 
                                <input type="hidden" name="pPrice" value="<?php echo $pPrice; ?>"> 
                                <input type="submit" name="addQuantity" value="Update" class="btn btn-primary">
                            </form> 
                        </td>
                        <td><?php echo $pPrice; ?> Rs</td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="cID" value="<?php echo $cartId; ?>"> 
                                <input type="submit" name="removeItem" value="Remove" class="btn btn-primary">
                            </form> 
                        </td>
                        <td></td>


                    </tr>
                    <?php
                        }
                    ?>
                     
                    
        
                    <tr>
                        <td></td>
                        <td>Sub Total : </td>
                        <td>
                            <?php 
                                $subTotal =0;
                                $sql = "SELECT totalCost FROM cart WHERE userId = '$uId' AND finished = 0";
                                $result = $connect->query($sql);
                                $cartHave = 0;
                                while($row = $result->fetch_assoc()){
                                    $cartHave = 1;
                                    $Total = $row['totalCost'];
                                    $subTotal = $subTotal + $Total;
                                }
                                
                                    echo $subTotal;
                                //}
                            ?> Rs

                        </td>

                        <td>
                            <?php 
                                if($cartHave == 1){
                            ?>
                                    <form action="payment.php" method="POST">
                                        <input type="hidden" name="uID" value="<?php echo $uId; ?>">
                                        <input type="hidden" name="cID" value="<?php echo $cartId; ?>">
                                        <input type="hidden" name="Total" value="<?php echo $subTotal ; ?>">
                                        <input type="submit" name="payment" value="Buy" style="width:95px;" class="btn btn-primary">
                                    </form> 
                            <?php
                                }else{
                            ?>
                                    <form action="payment.php" method="POST">
                                        <input type="hidden" name="uID" value="<?php echo $uId; ?>">
                                        <input type="hidden" name="cID" value="<?php echo $cartId; ?>">
                                        <input type="hidden" name="Total" value="<?php echo $subTotal ; ?>">

                                        <input type="submit" name="payment" value="Buy" disabled="">
                                    </form> 

                            <?php
                                }
                            ?>
                        </td>

                    </tr>
                    
                </table>
            
        </div>
            
    </div>
    
   
   <!-----------Footer---------->
   <div class="footer">

        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/google.jpg"> 
                        <img src="images/appstore.jpg">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logogold.jpeg">
                    <p>Our Purpose Is To Sustainably Make The Pleasure and Benifits of Apple Devices To Many</p>
                   
                </div>
   
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                    </ul>
                </div>

                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Twitter</li>
                    <li>Whatsapp</li>
                    </ul>
                </div>
            </div>
   
        </div>
    </div>




    </body>
</html>