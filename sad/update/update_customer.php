<?php
include '../condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
    header("location:../login.php");




$id=$_POST['id'];
$f_name=$_POST['fname'];
$tel=$_POST['telephone'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$status=$_POST['status'];


	$sql = "UPDATE member set name='$f_name', telephone='$tel',Lavel='$status' WHERE M_id ='$id'  " ;

	$result=mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('แก้ไขข้อมูลแล้ว');</script>";
		echo "<script>window.location='../show_customer.php';</script>";
	}else{
		echo "<script>alert('แก้ไขข้อมูลบ่ได้');</script>";
	}

mysqli_close($conn);

?>