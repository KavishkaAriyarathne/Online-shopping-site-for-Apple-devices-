<?php
include 'dbConnect.php';
session_start();

$userID = $_SESSION["id"];

//echo $userID;

$sql = "SELECT firstName,lastName FROM user WHERE id = '$userID'";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_array($result);

        $fName = $row['firstName'];
        $lName = $row['lastName'];

    $fullName = $fName." ".$lName;



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Apple Store | Ecommerce Website</title>
        <link rel="stylesheet" href="user-profile.css">
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
                        <li><a href="index.php">Home</a></li>
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
                    <li><a href="cart.php"><link rel="" href="cart.css"><img src="images/cart.png" width="25px" height="25px"></a></li>
                    </ul>
                </nav>
                  
            </div>
            
            </div>    
        </div>
    </div> 
     
   
    </div>
    <div class="profile">
        <p>Hello User........</p>
        <div class="container">
            <div class="row">
                <div class="profile-col-1">
                     
                </div>
                <div class="profile-col-2">
                    <img src="Images/prof.png">
                    <ul>
                        <li><?php echo $fullName; ?></li>
                    </ul>
                
                </div>
                <div class="profile-col-2">
                    
   
                </div>
                
            </div>
            
   
        </div>
    </div>
    <hr>   
        
    <!-------- featured categories------->
        <div class="categories">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <img src="images/cat5.jpg"  >
                    </div>
                    <div class="col-3">
                        <img src="images/cat9.jpg" >
                    </div>
                    <div class="col-3">
                        <img src="images/cat16.jpeg"  >
                    </div>
                </div>
            </div>
        </div> 


<!-------- featured categories------->
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/cat17.jpeg">
                <h4>iPhone 13 Pro Max</h4> 
                <h5>450,000/ LKR</h5>
                
            </div>
            <div class="col-4">
                <img src="images/cat21.jpeg">
                <h4>MacBook Pro M1</h4> 
                <h5>430,000/ LKR</h5>
                
            </div>
            <div class="col-4">
                <img src="images/cat19.jpeg">
                <h4>Apple Watch Series 7 Pro Max</h4> 
                <h5>145,000/ LKR</h5>
                
            </div>
            <div class="col-4">
                <img src="images/cat20.jpeg">
                <h4>Apple Airpods</h4> 
                <h5>34,990/ LKR</h5>
                
            </div>
        </div>
        <h2 class="title">Products</h2>
        <div class="row">
            
             <?php 
         
                $sql = "SELECT DISTINCT pid,name,price,image FROM product WHERE quantity != 0";
                $result = $connect->query($sql);
                while($row = $result->fetch_assoc()){
                    $pId = $row['pid'];
                    $pName = $row['name'];
                    $pPrice = $row['price'];
                    $pImage = $row['image'];
            ?>
            
                <div class="col-4">
                   <!-- <a href='ProductDiscription.php?data= <?php echo "$pId"?>'> -->
                    <img src="ProductImage/<?php echo $pImage; ?>" width="5%" height="60%"> 
                    <!-- </a>-->
                    <h4> &nbsp &nbsp &nbsp &nbsp <?php echo $pName; ?> </h4> 
                    <h5> &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $pPrice; ?>/ LKR</h5>
                <form action="ProductDiscription.php" method="Post">
                        <input type="hidden" name="pid" value="<?php echo "$pId"?>">
                         &nbsp &nbsp &nbsp &nbsp  <input type="submit" name="checkout" value="Check Out">
                </form>
                </div>
             
           

        <?php 
            }
        ?>
        </div>
    </div>
    </div>
    <!-----------Offer---------->
   <div class="offer">
       <div class="small-container">
           <div class="row">
               <div class="col-5">
                   <img src="images/cat16.png" width="5000px"  class="offer-img">
               </div>
              
               <div class="col-5">
                   <p>Exclusively Available On Apple Store</p>
                   <h1>Apple Watch</h1>
                   <h4>Your Watch. Your Way<br>New Style Ready For New Adventures</h4>
                    <a href="" class="btn2">Buy Now &#8594;</a>
                </div>
           </div>
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