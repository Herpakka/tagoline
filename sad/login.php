<?php
	session_start();
	@ini_set('display_errors', '0');//ไม่แสดง Error
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Bootstrap CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
	<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
	 
	
</head>
<body>


<?php include 'menu.php';?> <br>

<sectio class="slider ">


	<div class="container w-25 ">
		<div class="row ">
				<div class="col badge alert alert-dark " ><!-- md ความกว้าง-->
					<div class=" text-center h3" role="alert">
					<h3 class="span loader m"><span class="m">L</span><span class="m">o</span><span class="m">g</span><span class="m">i</span><span class="m">n</span></h3>
					</div> <br>
					<form method="POST" action="login/login_check.php"> <!-- action ส่งค่าไปอีกไฟล์ -->
						<input type="text" name="username" class="form-control" required placeholder="username"> <br>
								<input type="password" name="password" class="form-control" required placeholder="password"> <br>
						<?php 
								if(isset($_SESSION["Error"])){
									echo "<div class='text-danger' >"; //echo แล้วเรียกใช้ html
									echo $_SESSION["Error"] ;
									echo "</div>";
								}
						?>
						<input type="submit" name="submit" class="btn btn-success" value="Login">
						<a href="register.php"> Register </a>
					</from>
				</div>
		</div>
		
	</div>
</sectio>
  


</body>
</html>