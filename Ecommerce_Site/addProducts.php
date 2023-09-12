<?php
include 'dbConnect.php';

if(isset($_POST['submit'])){
    $name = $_POST['pName'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $newType = $_POST['newType'];

    if($newType == ""){
        $proTypeId = $_POST['pType'];
    }else{
        $sql = "INSERT INTO producttype(type) VALUES('$newType')";
        $result = mysqli_query($connect,$sql);
        if($result){
            $sql7 = "SELECT id FROM producttype ORDER BY id DESC";
            $result7 = mysqli_query($connect,$sql7);
            $row7 = mysqli_fetch_array($result7);

            $proTypeId = $row7['id'];
        }
    }
    
    

    $productDe = trim($_POST['productDetails']);

    //upload image
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./ProductImage/" . $filename;
 
    // Now let's move the uploaded image into the folder: image
    move_uploaded_file($tempname, $folder);


    $sql = "INSERT INTO product(productTypeID,name,details,price,quantity,image) VALUES('$proTypeId','$name','$productDe','$price','$qty','$filename')";
    $result = mysqli_query($connect,$sql);
    if($result){
        echo 'done';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="addProductsStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" placeholder="Enter Product Name" name="pName" required>
    </div>
    <div class="form-group">
        <label>Product Image</label>
        <input class="form-control" type="file" required name="uploadfile" value="" />
    </div>
    <div class="form-group">
        <label>Product Details</label><br>
        <textarea rows="6" cols="148" name="productDetails" required></textarea>
    </div>
    <div class="form-group">
        <label>Product Type</label>
        <select name="pType">
          <option value="" disabled selected hidden>Product Type</option>
          <?php 
            $sql2 = "SELECT id, type FROM producttype";
            $result2 = $connect->query($sql2);
            if ($result2->num_rows > 0) {
              // output data of each row
              while($row2 = $result2->fetch_assoc()) {
                $typeId = $row2['id'];
                $typeName = $row2['type'];  
                //$CorId = $row['id'];  
        ?>
        <?phph echo $course;  ?> 
            <option value="<?php echo "$typeId"; ?>"><?php echo "$typeName"; ?></option>
        <?php  
           
                }
            }
        ?>
        
        </select>
    </div>
    <div class="form-group">
        <label>If New Product type</label>
        <input type="text" class="form-control" placeholder="Enter New Product Type" name="newType" >
    </div>

    <div class="form-group">
        <label>Product Price</label>
        <input type="text" class="form-control" placeholder="Enter Product Price" name="price" required>
    </div>
    <div class="form-group">
        <label>Enter Quantity</label>
        <input type="number" class="form-control" placeholder="Enter Quantity" name="qty" required min="1">
    </div>
    <button type="submit" class="btn btn-success" name="submit">Add Product</button>
    </form>
    </div>
    <button style="margin-left:200px; margin-top:20px;" class="btn btn-primary"><a style="color:white;" href="admindashboard1.php">Back To Dashboard</a></button>
</body>
</html>