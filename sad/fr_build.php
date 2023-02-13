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
	<title>Add Product</title>
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
		<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
	<?php include 'menu.php';?>
	<div class="container">
		<div class="row">
				<!-- ปรับขนาดทั้งหทดได้ที่ col-sm -->
				<div class="col-sm-10">
					<form name="form1" method="post" action="insert/insert_build.php" enctype="multipart/form-data">
						<div class="h4 text-center alert alert-primary mb-4 mt-4" role="alert"> เพิ่มข้อมูลโปรเจค </div>
						<label>ชื่อโปรเจค</label>
								<input type="text" name="pname" class="form-control" placeholder="ชื่อโปรเจค...." required> <br>
						<label>ราคา</label>
								<input type="text" name="price" class="form-control" placeholder="ราคาโปรเจค...." required> <br>
						<select class="form-select" name="typeID">
							
						<label>ราคา</label>
								<!-- loop แสดงชื่อ type ในลิส -->
								<?php
									$sql="SELECT * FROM style ORDER BY S_name";
									$hand=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($hand)){
								?>

								<option value="<?=$row['S_id']?>"><?=$row['S_name']?></option>
								<?php
									}
									mysqli_close($conn);
								?>
						</select><br>

						<label>รูปภาพ</label>
								<!-- ชื่อ file1 ต้องตรงกับ insert_product.php  -->
								<input type="file" name="file1" required> <br><br>

								<label for="file_name">รูปภาพ</label>
								<input type="file" name="file2" required><br><br>
								
								<label for="file_name">รูปภาพ</label>
								<input type="file" name="file3" required><br><br>

						<button type="submit" class="btn btn-success">submit</button>
						<!--<input class="btn btn-danger"  type="reset" value="reset">  กดล้างข้อมูลที่กรอก-->
						<input class="btn btn-primary"  type="reset" value="reset">
						<a class="btn btn-danger" href="show_build.php" role="button">Cancel</a>

					</form>    
				</div>
		</div>
	</div>
</body>
</html>