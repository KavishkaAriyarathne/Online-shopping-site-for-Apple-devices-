<?php
    include 'dbConnect.php';

    
?>







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Apple Store | Ecommerce Website</title>
        <link rel="stylesheet" href="HomeStyleCopy.css">
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
                    <li><a href="">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="login.php">login</a></li>
                    <li><a href="register.php">Signup</a></li>
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
                    <li><input type="text" placeholder="what you are looking for?">
                        <button type="submit">Search</button></li>
                    </ul>
                </nav>  
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Store. The best way to buy the product you love.</h1>
                    <br>
                    <p>Apple Store is a place for buying Apple products such as iPhone, iPad, MacBook, Apple Watch, Airpods.</p>
                    <a href="" class="btn"> Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="Images/phone1.jpeg">
                </div>
            </div>    
            </div>    
        </div>
    </div> 
        
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
                <img src="images/cat11.jpg">
                <h4>iPhone 13 Pro Max</h4> 
                <h5>450,000/ LKR</h5>
                
            </div>
        </div>
        <h2 class="title">Lates Products</h2>
        <div class="row">
            
             <?php 
                $countProduct = 0;
                $sql = "SELECT DISTINCT name,price,image FROM product";
                $result = $connect->query($sql);
                while(($row = $result->fetch_assoc())&&($countProduct<=6)){
                    $pName = $row['name'];
                    $pPrice = $row['price'];
                    $pImage = $row['image'];

                    $countProduct++;
        
            ?>
            <div class="col-4">
                <img src="ProductImage/<?php echo $pImage; ?>">
                <h4><?php echo $pName; ?> </h4> 
                <h5><?php echo $pPrice; ?>/ LKR</h5>
                
            </div>

        <?php 
            }
        ?>
        </div>
    </div>
    <!-----------Offer---------->
   <div class="offer">
       <div class="small-container">
           <div class="row">
               <div class="col-5">
                   <img src="images/cat16.png" width="5000px" class="offer-img">
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