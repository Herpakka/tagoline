<?php 
include 'condb.php';
session_start();
@ini_set('display_errors', '0');//ไม่แสดง Error


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
	<title>Cart</title>
	<!-- Bootstrap CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
	<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
<?php include 'menu.php';?><br>
	<div class="container">
		<form id="form1" method="POST" action="insert/insert_cart.php">
			<div class = "row">
				<div class = "col-md-10">
					<table class = "table table-hover">
						<tr class="text-center">
							<th>ลำดับที่</th>
							<th>ชื่อ</th>
							<th>ราคา</th>
							<th>จำนวน</th>
							<th>ราคารวม</th>
							<th>เพิ่ม - ลด</th>
							<th>ลบรายการ</th>
						</tr>
						<?php 
							$Total = 0;
							$sumPrice = 0;
							$m = 1;
							for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
								if($_SESSION["strProductID"][$i] != ""){
									$sql1 = "SELECT * FROM house WHERE H_id = '" . $_SESSION["strProductID"][$i] . "'   ";
									$result1 = mysqli_query($conn,$sql1);
									$row_pro = mysqli_fetch_array($result1);

									$_SESSION["price"] = $row_pro['price'];
									$Total = $_SESSION["strQty"][$i];
									$sum = $Total * $row_pro['price'];
									$sumPrice = $sumPrice + $sum; 
									$_SESSION["sum_Price"] = $sumPrice;
									// $sumPrice = number_format($sumPrice,2);

								
								?>
								<tr>
									<td class="text-center"><?=$m?></td>
									<td>
									   <img src="img/<?=$row_pro['picture']?>" width="80" height="100" class="border">
										<?=$row_pro['H_name']?> </td>
									<td class="text-center"><?=number_format($row_pro['price'],2)?></td>
									<td class="text-center"><?=$_SESSION["strQty"][$i]?></td>
									<td class="text-center"><?=number_format($sum,2)?></td>
									<td class="text-center">
										<a href="update/update_order.php?id=<?=$row_pro['H_id']?>" class="btn btn-outline-success">+</a>
										<?php if($_SESSION["strQty"][$i] > 1){ ?>

										
											<a href="delete/order_delete.php?id=<?=$row_pro['H_id']?>" class="btn btn-outline-success">-</a>
										<?php
										} ?>
									</td>
									<td class="text-center"><a class="btn btn-outline-danger" href="delete/pro_delete.php?Line=<?=$i?>" role="button">ลบ</a></td>
									<!-- <td><img src="หารูปมาลบ"></td> -->
								</tr>
								<?php
								$m=$m+1;
								
							}
							}
						?>
						<tr>
							<td class="text-end" colspan="4">รวมเงิน</td>
							<td class="text-center"><?=number_format($sumPrice,2)?></td>
							<td>บาท</td>
						</tr>
					</table>
					<div style="text-align:right"><!-- จัดวางตำแหน่ง ซ้าย ขวา -->
						<a href ="sh_build.php" type="button" class="btn btn-outline-secondary">เลือกต่อ</a>
						<button type="submit" class="btn btn-outline-dark">ยืนยันการสั่งซื้อ</button>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="alert alert-dark text-center" role="alert">
						ข้อมูลการจอง 
					</div>
					รหัสลูกค้า:
					<input type="text" name="cus_id" class="form-control " required placeholder="รหัสลูกค้า " VALUE="<?=$_SESSION["id1"]?>" readonly><br>
					ชื่อนามสกุล:
					<input type="text" name="cus_name" class="form-control " required placeholder="ชื่อ-นามสกุล " VALUE="<?=$_SESSION["firstname"]?>"><br>
					ที่อยู่จัดส่ง:
					<textarea class="form-control"  required placeholder="ที่อยู่ " name="cus_add" rows="3" > </textarea><br>
					เบอร์โทรศัพท์:
					<input type="text" name="cus_tel" class="form-control" required placeholder="เบอร์โทรศัพท์" VALUE="<?=$_SESSION["phone"]?>" ><br>

				</div>
			</div>

		</form>
	</div><br><br><br>
	
</body>
</html>