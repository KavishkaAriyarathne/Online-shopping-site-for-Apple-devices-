<?php

    include 'dbConnect.php';

    session_start();
    $uId = $_SESSION["id"];

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Apple Store | Ecommerce Website</title>
        <link rel="stylesheet" href="iPhone.css">

        <style type="text/css">
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
           
        <!-------- featured categories------->
    <div class="small-container">
        
        <h2 class="title">IPhones</h2>
        <div class="row">
            
             <?php 
         
                $sql = "SELECT DISTINCT pid,name,price,image FROM product WHERE quantity != 0 AND productTypeID  = 1";
                $result = $connect->query($sql);
                while($row = $result->fetch_assoc()){
                    $pId = $row['pid'];
                    $pName = $row['name'];
                    $pPrice = $row['price'];
                    $pImage = $row['image'];
            ?>
            
                <div class="col-4">
                   <!-- <a href='ProductDiscription.php?data= <?php echo "$pId"?>'> -->
                     <img src="ProductImage/<?php echo $pImage; ?>" width="10%" height="70%"> 
                    <!-- </a>-->
                    <h4> &nbsp &nbsp &nbsp  <?php echo $pName; ?> </h4> 
                    <h5> &nbsp &nbsp  &nbsp <?php echo $pPrice; ?>/ LKR</h5>
                <form action="ProductDiscription.php" method="Post">
                        <input type="hidden" name="pid" value="<?php echo "$pId"?>">
                         &nbsp &nbsp   <input type="submit" name="checkout" value="Check Out">
                </form>
                </div>
             
           

        <?php 
            }
        ?>
        </div>
    </div>
    </body>

</html>
