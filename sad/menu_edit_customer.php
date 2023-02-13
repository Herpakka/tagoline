<?php
include 'condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
    header("location:login.php");



$id=$_GET['customer_id'];
$sql="SELECT * FROM member WHERE M_id='$id' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add customer</title>
        <!-- Bootstrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
        <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
<?php include 'menu.php';?>
<div class="container"> 
<div class="row">
    <div class="col w-50 position-absolute top-50 start-50 translate-middle ">
        <div class="h4 text-center alert alert-success mb-4 mt-4 alert alert-dark" role="alert"> แก้ไขข้อมูล </div>

        <form method="POST" action="update/menu_update_customer.php">
            <label>รหัสสมาชิก:</label>
            <input type="text" name="id" class="form-control" readonly value=<?=$row['M_id']?> placeholder="...รหัสสมาชิก" required>  <br>

            <label>ชื่อ:</label>
            <input type="text" name="fname" class="form-control" value=<?=$row['name']?> placeholder="...ชื่อ" required> <br>

            <label>เบอร์:</label>
            <input type="number" name="telephone" class="form-control" value=<?=$row['telephone']?> placeholder="...เบอร์" required> <br>

            <!-- <label>username:</label>
            <input type="text" name="user" class="form-control" value=<?=$row['user']?> placeholder="...user" required> <br>

            <label>password:</label>
            <input type="text" name="pass" class="form-control" value=<?=$row['password']?> placeholder="...pass" required> <br> -->

            <label>status:</label>
            <input type="number" name="status" class="form-control" readonly value=<?=$row['Lavel']?> placeholder="...0=user 1=admin" required> <br>

            <input type="submit" value="edit" class="btn btn-success ">

            <a href="index.php" class="btn btn-danger ">Cancel</a>
        </form>
        </div>
    </div>
</div>
    
</body>
</html>