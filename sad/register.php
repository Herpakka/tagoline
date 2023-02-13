<?php
include 'condb.php';
@ini_set('display_errors', '0'); //ไม่แสดง Error 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<?php include 'menu.php'; ?> <br>
	
	<div class="container g-3 needs-validation" novalidate>
		<div class="row ">
			<div class="col">
				<div class="alert alert-dark" role="alert"><br> <!--พื้นหลัง -->
					<div class=" text-center h3" role="alert">
					สมัครสมาชิก
					</div> <br>
						<form method="POST" action="insert/insert_register.php"><!-- action ส่งไฟล์ -->
						ชื่อ<input type="text" name="firstname" class="form-control" required placeholder="ชื่อ">
						สกุล<input type="text" name="lastname" class="form-control" required placeholder="สกุล">
						เบอร์โทรศัพท์<input type="number" name="phone" class="form-control" required max="9999999999" placeholder="เบอร์โทร">
						Username<input type="text" name="username" class="form-control" required maxlength="10" placeholder="username">
						password<input type="password" name="password" class="form-control" required maxlength="10" placeholder="password"> <br>
						<div class="d-flex justify-content-center h6">
							<input type="submit" name="submit" class="btn btn-success me-2" value="บันทึก">
							<input type="reset" name="reset" class="btn btn-danger me-2" value="รีเซ็ต">
							<a href="login.php" > Login </a>
						</div>
						
				</div>
			</div>
		</div>
		
	</div>

</body>

</html>