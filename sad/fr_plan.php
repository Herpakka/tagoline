<?php
include 'condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
    header("location:login.php");
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
    <div class="col-sm-6">
        <div class="h4 text-center alert alert-success mb-4 mt-4" role="alert"> เพิ่มข้อมูลแพลน </div>

        <form method="POST" action="insert/insert_plan.php">

            <!-- <label>ไอดีเพลน:</label>
            <input type="text" name="pname" class="form-control" placeholder="...ไอดีเพลน" required> <br> -->

            <label>ชื่อแพลน:</label>
            <input type="text" name="nplan" class="form-control" placeholder="...ชื่อแพลน" required> <br>

            <label>รายละเอียด:</label>
            <input type="text" name="details" class="form-control" placeholder="...รายละเอียด" > <br>

            <input type="submit" value="submit" class="btn btn-success ">
            <a href="show_plan.php" class="btn btn-danger ">Cancel</a>
        </form>
        </div>
    </div>
</div>
    
</body>
</html>