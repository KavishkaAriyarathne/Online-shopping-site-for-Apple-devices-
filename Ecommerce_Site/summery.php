<?php
include 'dbConnect.php';

date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d h:i:s');


?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="addProductsStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>

<h1>Product Sold Summery</h1><div style="text-align: right;"><h5><?php echo $date; ?></h5></div>

<table id="customers" style="width:95%" align="center">
  <tr >
    <th>No.</th>
    <th>Name of The Item</th>
    <th>Price</th>
    <th>Sold</th>
    <th>Balance</th>

  </tr>

<?php


	$sql2 = "SELECT pid, name, price, quantity FROM product";
    $result2 = $connect->query($sql2);
        if ($result2->num_rows > 0) {
              // output data of each row
        	$co=0;
            while($row2 = $result2->fetch_assoc()) {
                $proID = $row2['pid'];
                $proName = $row2['name']; 
                $proPrice = $row2['price']; 
                $proStock = $row2['quantity']; 
				$totalSold = 0;

                $sql3 = "SELECT pid, totalCost, quantity FROM cart WHERE pid= '$proID' AND finished='1' ORDER BY cid DESC";
	            $result3 = $connect->query($sql3);
	            if ($result3->num_rows > 0) {
	              // output data of each row
	              	while($row3 = $result3->fetch_assoc()) {
		              	$CproID = $row3['pid'];	          
		              	$proCost = $row3['totalCost']; 
		               	$proQuant = $row3['quantity']; 

		               	$totalSold +=  $proQuant;
		               }
		               	$co++;

           
?>

  <tr>
    <td><?php echo 	$co; ?></td>
    <td><?php echo 	$proName; ?></td>
    <td><?php echo 	$proPrice; ?></td>
    <td><?php echo 	$totalSold; ?></td>
    <td><?php echo 	$proStock; ?></td>
  </tr>
 
<?php
	              
       
	            	
	        	}

            }
        }

?>

</table>
    <button style="margin-left:50px; margin-top:20px;" class="btn btn-primary"><a style="color:white;" href="admindashboard1.php">Back To Dashboard</a></button>

</body>
</html>


