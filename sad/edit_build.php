<?php
include 'condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
	header("location:login.php");


// $_GET['id'] id มาจาก show_product.php ส่ง id มาจากปุ่ม edit
$idpro = $_GET['id'];
$sql1 = "SELECT * FROM house WHERE H_id ='$idpro' ";
$result = mysqli_query($conn,$sql1);
$rs=mysqli_fetch_array($result);
$p_typeID=$rs['S_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Build</title>
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
					<form name="form1" method="post" action="update/update_build.php" enctype="multipart/form-data">
						<div class="h4 text-center alert alert-primary mb-4 mt-4" role="alert"> แก้ไขข้อมูลสินค้า </div>
						<label>รหัสสินค้า</label>
							<input type="text" name="proid" class="form-control" readonly value=<?=$rs['H_id']?> > <br>

						<label>ชื่อสินค้า</label>
							<input type="text" name="pname" class="form-control" value=<?=$rs['H_name']?> > <br>

						<label>ราคาสินค้า</label>
							<input type="number" name="price" class="form-control" value=<?=$rs['price']?> > <br>

						<select class="form-select" name="typeID">
							
						<label>ราคา</label>
							<!-- loop แสดงชื่อ type ในลิส -->
							<?php
									$sql="SELECT * FROM style ORDER BY S_name";
									$hand=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($hand)){
										$ttypeID = $row['S_id'];
							?>

							<!--  -->
							<option value="<?=$row['S_id']?>" 
									<?php if($p_typeID==$ttypeID){echo "selected=selected";} ?> >  
									<?=$row['S_name']?>
							</option>
							<?php
									}
									mysqli_close($conn);
							?>
						</select>

						<label>รูปภาพ</label> <br>
							<img src="img/<?=$rs['picture']?> " width="120" > <br> <br>
							<input type="file" name="file1" > <br> <br><!-- ชื่อ textimg(คือที่ใช้อ้างถึง) ต้องตรงกับ insert_product.php  -->
							<input type="hidden" name="txtimg1" class="form-control" value=<?=$rs['picture']?>> <br><!-- บรรทัดนี้ถูกซ่อนอยู่  type="hidden" -->

						<label>รูปภาพ</label> <br>
							<img src="img/<?=$rs['picture2']?> " width="120" > <br> <br>
							<input type="file" name="file2" > <br> <br><!-- ชื่อ textimg(คือที่ใช้อ้างถึง) ต้องตรงกับ insert_product.php  -->
							<input type="hidden" name="txtimg2" class="form-control" value=<?=$rs['picture2']?>> <br><!-- บรรทัดนี้ถูกซ่อนอยู่  type="hidden" -->

						<label>รูปภาพ</label> <br>
							<img src="img/<?=$rs['picture3']?> " width="120" > <br> <br>
							<input type="file" name="file3" > <br> <br><!-- ชื่อ textimg(คือที่ใช้อ้างถึง) ต้องตรงกับ insert_product.php  -->
							<input type="hidden" name="txtimg3" class="form-control" value=<?=$rs['picture3']?>> <br><!-- บรรทัดนี้ถูกซ่อนอยู่  type="hidden" -->


						<button type="submit" class="btn btn-success">Update</button><!-- submit ไปทำงานตรง  <form name="form1" method="post" action= -->

						<!--<input class="btn btn-danger"  type="reset" value="reset">  กดล้างข้อมูลที่กรอก-->
						<input class="btn btn-primary"  type="reset" value="reset">
						<a class="btn btn-danger" href="show_build.php" role="button">Cancel</a>

					</form>    
			</div>
		</div>
	</div>
</body>
</html>