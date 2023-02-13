<?php
	include 'condb.php';
	session_start();
	//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
	if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
		header("location:login.php");



	$id=$_GET['type'];
	$sql="SELECT * FROM style WHERE S_id='$id' ";
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
			<div class="col-sm-6">
				<div class="h4 text-center alert alert-success mb-4 mt-4" role="alert"> แก้ไขข้อมูล </div>

				<form method="POST" action="update/update_plan.php">
					<label>รหัส plan:</label>
					<input type="text" name="id_plan" class="form-control" readonly value=<?=$row['S_id']?> placeholder="...รหัส plan" required>  <br>

					<label>ชื่อ plan:</label>
					<input type="text" name="nplan" class="form-control" value=<?=$row['S_name']?> placeholder="...ชื่อ plan" required> <br>

					<label>รายละเอียด:</label>
					<input type="text" name="details" class="form-control" value=<?=$row['details']?> placeholder="...รายละเอียด" required> <br>

					<input type="submit" value="edit" class="btn btn-success ">

					<a href="show_plan.php" class="btn btn-danger ">Cancel</a>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>