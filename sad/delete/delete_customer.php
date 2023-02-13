<?php
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
	header("location:../login.php");

include '../condb.php';
$ids = $_GET['Member_id'];
//เช็คว่ามีการจองอยู่แล้วไหม
$sql1="SELECT * FROM member AS c ,booking AS b WHERE c.name=b.cus_name AND c.M_id = $ids ";
$result = mysqli_query($conn,$sql1);
$row = mysqli_fetch_array($result);
$sum=$row['B_id'];


if($sum>0){
	echo "ERROR : " . $sql . "<br>" . mysqli_error($conn);
	echo "<script>alert('ลบข้อมูลบ่ได้ มีข้อมูลการจองอยู่แล้ว');</script>";
	echo "<script>window.location='../show_customer.php';</script>";
}
else{
	//ถ้าไม่มีการจองให้ลบ
	$sql="DELETE FROM member WHERE M_id= '$ids'";
	if(mysqli_query($conn,$sql)){
		echo "<script>alert('ลบข้อมูลแล้ว');</script>";
		echo "<script>window.location='../show_customer.php';</script>";
	}else{
		echo "ERROR : " . $sql . "<br>" . mysqli_error($conn);
		echo "<script>alert('ลบข้อมูลบ่ได้');</script>";
	}
}


mysqli_close($conn);
?>