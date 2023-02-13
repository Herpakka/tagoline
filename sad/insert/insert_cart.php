<?php 
include '../condb.php';
session_start();
$cusID=$_POST['cus_id'];
$cusName=$_POST['cus_name'];
$cusAddress=$_POST['cus_add'];
$cusTel=$_POST['cus_tel'];

$sql = "INSERT INTO booking(M_id,cus_name,address,telephone,total_price,booking_status) 
VALUE('$cusID','$cusName','$cusAddress','$cusTel','" . $_SESSION["sum_Price"] ."','1')";
mysqli_query($conn,$sql);

$orderID = mysqli_insert_id($conn);

for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
	if($_SESSION["strProductID"][$i] != ""){
		//ดึข้อมูลออกมา
		$sql1 = "SELECT * FROM house WHERE H_id = '" .$_SESSION["strProductID"][$i]. "'  ";
		$result1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_array($result1);
		$price = $row1['price'];
		$total = $_SESSION["strQty"][$i] * $price;

		$sql2 = "INSERT INTO booking_detail(B_id,H_id,bookingPrice,bookingQty,Total) 
		VALUE('$orderID','". $_SESSION["strProductID"][$i] ."','$price','". $_SESSION["strQty"][$i] ."','$total')";
		if(mysqli_query($conn,$sql2)){
			//ตัดสต็อกสินค้า
			$sql3 = "UPDATE house SET amount = amount - '". $_SESSION["strQty"][$i] ."'  
			WHERE H_id ='". $_SESSION["strProductID"][$i] ."' ";
			mysqli_query($conn,$sql3);
			//echo "<script> alert('บันทึกข้อมูลเรียบร้อย') </script>";
			echo "<script> window.location='../sh_build.php'; </script>";
		}

	}

}
mysqli_close($conn);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_Price"]);
$_SESSION["sum_row"]=0;
// session_destroy();

?>