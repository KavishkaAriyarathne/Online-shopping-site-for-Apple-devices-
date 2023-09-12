<?php
    include 'dbConnect.php';

    session_start();
    $uId = $_SESSION["id"];

    //2022-12-26 16:16:13.000000
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d h:i:s');
    
    $status = "Shipped";

    $sql = "INSERT INTO orderDetails(userID,order_date,dilivery_status) VALUES('$uId','$date','$status')";
        $result = mysqli_query($connect,$sql);
        if($result){
            echo 'done';
        }


if(isset($_POST['invoice'])){
    



}


?>


<!DOCTYPE html>
<html>
<head>
    <title></title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
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

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<br>
<div class="btn-group">
  <a href="userProfile.php"><button>Home</button></a>
  <a href="cart.php"><button>Cart <i class="fa fa-shopping-cart" style="font-size:14px"></i></button></a>
  <a href="index.php"><button>Logout</button></a>
</div>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <?php   
                    $sql1 = "SELECT * FROM orderdetails ";
  
                if ($result1 = mysqli_query($connect, $sql1)) {
                    $rowcount = mysqli_num_rows( $result1 );
                }
                ?>
                <h2>Invoice</h2><h3 class="pull-right">Order # <?php echo $rowcount; ?></h3>
            </div>
            <hr>

            <?php   
                    $sql1 = "SELECT * FROM paymentdetails WHERE userID = '$uId' Order By id DESC";
                    $result = $connect->query($sql1);
                      
                if ($row = $result->fetch_assoc()) {
                    $fName  = $row['name'];
                    $email  = $row['email'];
                    $address  = $row['address'];
                    $city  = $row['city'];
                    $state  = $row['state'];
                    $zip  = $row['zip'];
                    $cardnumber  = $row['cardNumber'];
                 
                    $str = $cardnumber;
                    $arr1 = str_split($str);

                    $cardCount = 16;
                    $cardCount = count($arr1);
                    $endNumber ="";
                    for ($i=$cardCount-4; $i <$cardCount ; $i++) { 
                        $endNumber = $endNumber.$arr1[$i];
                    }

                    date_default_timezone_set('Asia/Kolkata');
                    $Orddate = date('Y-m-d');
                }
            ?>


            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>Billed To:</strong><br>
                        <?php echo $fName; ?><br>
                        <?php echo $address; ?><br>
                        <?php echo $city; ?><br>
                        <?php echo $state; ?>, <?php echo $zip; ?>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>Shipped To:</strong><br>
                        <?php echo $fName; ?><br>
                        <?php echo $address; ?><br>
                        <?php echo $city; ?><br>
                        <?php echo $state; ?>, <?php echo $zip; ?>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** <?php echo $endNumber; ?><br>
                        <?php echo $email; ?>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        <?php echo $Orddate; ?><br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $sql = "SELECT cart.cid,product.pid,product.name,cart.quantity,product.price ,cart.totalCost FROM cart INNER JOIN product ON cart.pid = product.pid WHERE userId = '$uId' AND finished = 0 ";
                                    $result = $connect->query($sql);
                                    $totalCost = 0;
                                    while($row = $result->fetch_assoc()){
                                        $cartId = $row['cid'];
                                        $proId = $row['pid'];
                                        $pName = $row['name'];
                                        $pPrice = $row['price'];
                                        $cQuant = $row['quantity'];
                                        $tCost = $row['totalCost'];





                                ?>

                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                
                                    <td><?php echo $pName; ?></td>
                                    <td class="text-center"><?php echo $pPrice; ?> Rs</td>
                                    <td class="text-center"><?php echo $cQuant; ?></td>
                                    <td class="text-right"><?php echo $tCost; ?> Rs</td>
                                </tr>
                               
                               <?php 
                                $totalCost = $totalCost + $tCost;
                                } 
                               ?>

                               <tr>
                                
                                    <td></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><b>SUB TOTAL : </b></td>
                                    <td class="text-right"><B><?php echo $totalCost; ?> Rs</B></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            


                            $sql = "SELECT product.pid,cart.quantity FROM cart INNER JOIN product ON cart.pid = product.pid WHERE userId = '$uId' AND finished = 0 ";
                                    $result = $connect->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        $proId = $row['pid'];
                                        $cQuant = $row['quantity'];



                                        $sql1 = "SELECT quantity FROM product WHERE pid  = '$proId' ";
                                        $result3 = $connect->query($sql1);
                                        while($row3 = $result3->fetch_assoc()){
                                            $proCount = $row3['quantity'];
                                            $newproQuant = $proCount - $cQuant;

                                            $sql4= "UPDATE product SET quantity ='$newproQuant' WHERE pid = '$proId'";
                                            mysqli_query($connect, $sql4);
                                            
                                        }

                                    }

                                    $sql5= "UPDATE cart SET finished = 1 WHERE userId = '$uId'";
                                    mysqli_query($connect, $sql5);


                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" onclick="window.print()" style="margin-left:40%; width:200px;">Print</a>
</div>


</body>
</html>