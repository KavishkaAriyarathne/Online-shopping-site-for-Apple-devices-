<?php
include 'dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="customerDetails.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Customer Details</h1>
        </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">NIC</th>
      <th scope="col">Address</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $sql = "SELECT * FROM user WHERE userType='cus';";
    $result = mysqli_query($connect,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $nic = $row['nic'];
    $address = $row['address'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $phone = $row['phone'];
    $email =$row['email'];
    
    echo'<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$firstName.'</td>
      <td>'.$lastName.'</td>
      <td>'.$nic.'</td>
      <td>'.$address.'</td>
      <td>'.$dob.'</td>
      <td>'.$gender.'</td>
      <td>'.$phone.'</td>
      <td>'.$email.'</td>
    </tr>';
    }
    ?>
  </tbody>
</table>

    </div>
    <div class="back-btn">
        <button><a href="admindashboard1.php">Back To Dashboard</a></button>
    </div>
</body>
</html>

