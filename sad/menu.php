<?php 
include 'condb.php';
if($_SESSION["username"] != 0){
  $usmenu = $_SESSION["username"];
  $pasmenu = $_SESSION["pw"];
  $sqlmenu = "SELECT * FROM member WHERE user='$usmenu' and password='$pasmenu' ";
  $resultmenu = mysqli_query($conn,$sqlmenu);
  $rowmenu = mysqli_fetch_array($resultmenu);
  $statusmenu=$rowmenu['Lavel']; //เช็ค admin 
}
?>

<nav class="navbar navbar-expand-lg " style="background-color: gray;">
	<div class="container">
		<a class="navbar-brand" href="index.php">Tagoline888</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent" >
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="sh_build.php">Product</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled">Disabled</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" aria-current="page" href="index.php">Admin</a>
			</li>

			</ul>

			<form class="d-flex " role="search" method="POST" action="sh_build.php">
				<!-- ปุ่มค้นหา -->
				<input class="form-control me-2 btn btn-outline-light" type="search" name="keyword" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-light me-2" type="submit">Search</button>

				<!-- สินค้าในตระกร้า -->
				<a class="btn btn-dark position-relative me-2" href="cart.php" role="button">ตะกร้า <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+<?=$_SESSION["sum_row"]?> <span class="visually-hidden">unread messages</span></span></a>

				<!-- dropdown ของ user กับ admin -->
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class=" dropdown-toggle btn btn-outline-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<?php 
						//เปลี่ยนชื่ dropdown
						if($_SESSION["status1"] == 1){
							echo 'Admin ' . $_SESSION["firstname"];
						}
						elseif($_SESSION["status1"] == 0){
							echo 'User '. $_SESSION["firstname"];
						}else
						?>
						</a>

						<ul class="dropdown-menu">
						<?php 
						//เปลี่ยนชื่ dropdown
						if($_SESSION["status1"] == 1){
							?>
								<li><a class="dropdown-item" href="show_customer.php">Edit all customer</a></li>
								<li><a class="dropdown-item" href="show_build.php">Edit proect</a></li>
								<li><a class="dropdown-item" href="show_plan.php">Edit plan</a></li>
								<li><a class="dropdown-item" href="menu_edit_customer.php?customer_id=<?=$rowmenu["M_id"]?>" >Edit ME </a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="login/logout.php">  logout  </a></li>

							<?php
						}elseif($_SESSION["status1"] == 0){
							?>
								<li><a class="dropdown-item" href="menu_edit_customer.php?customer_id=<?=$rowmenu["customer_id"]?>" >Edit ME </a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="login/logout.php">  logout  </a></li>
							<?php

						}
						?>
						
					</li>
				</ul>
			</form>
		</div>
	</div>
	
</nav>
