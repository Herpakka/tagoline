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
		<title>Show product</title>
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
		<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
	<?php include 'menu.php';?><br>
	<div class="container ">
		<div class="row">
			<?php 
				$ids=$_GET['id_details'];
            $sql = "SELECT * FROM house, style WHERE house.S_id= style.S_id and house.H_id='$ids' ";//ตรวจสอบค่าที่ตรงกัน
            $result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result)
        ?>
		  	<!-- ช่องว่าง -->
			<div class="col"></div>
			<div class="col text-center">
				
			<!-- Carousel wrapper -->
			<div class="container-fluid">
				<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: ">
					<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
					</ol>
					<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox" >
						<div class="carousel-item active"> <img class="d-block mx-auto" src="img/<?=$row['picture']?>" alt="First slide" height=200 width=300></div>
						<div class="carousel-item"> <img class="d-block mx-auto" src="img/<?=$row['picture2']?>" alt="Second slide" height=200 width=300></div>
						<div class="carousel-item"> <img class="d-block mx-auto" src="img/<?=$row['picture3']?>" alt="Third slide" height=200 width=300></div>
					</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> 
							<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
							<!-- <span class="sr-only">Previous</span>  -->
						</a> 
						<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> 
							<span class="carousel-control-next-icon" aria-hidden="true"></span> 
							<!-- <span class="sr-only">Next</span>  -->
						</a> </div>
					<script src="js/jquery-3.4.1.min.js"></script>
					<script src="js/popper.min.js"></script>
					<script src="js/bootstrap-4.4.1.js"></script>
				</div>
			</div>
			<!-- Carousel wrapper -->



				<!-- <img src="img/<?=$row['picture']?>" width="350px" /> -->
			</div>

			<div class="col">
				<h5 class="text-info">ID: <?=$row['H_id']?> </h5> 
				<h5 class="text-info">Details: <?=$row['detail_thumb']?> </h5> 
				<h5 class="text-info">Type: <?=$row['S_name']?> </h5> 
				<h5 class="text-danger ">price: <?=number_format($row['price'],2)?> </h5> 
				<a class="btn btn-secondary" href="update/update_order.php?id=<?=$row['H_id']?>" > Add </a>
				
				<a class="btn btn-outline-secondary" href="sh_build.php"> Close </a>
			</div>
			<div class="col"></div>
			<!-- ช่องว่าง -->

		</div>
	</div>
	<?php
		mysqli_close($conn);
	?>
</body>
</html>