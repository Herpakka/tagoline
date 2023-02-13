<?php
include '../condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
    header("location:../login.php");




$id_p=$_POST['id_plan'];
$p_name=$_POST['nplan'];
$details=$_POST['details'];


//ตรวจสอบ ค่าซ้ำ
$check = "SELECT * FROM style WHERE S_name = '$p_name' ";
$hand = mysqli_query($conn,$check);
$num = mysqli_num_rows($hand);
if($num > 0){
	echo "<script> alert('ชื่อ plan ซ้ำเปลี่ยนซะ'); </script> ";
	echo "<script> window.location='../edit_plan.php?type=$id_p'; </script> ";
}else{

	$sql = "UPDATE style set S_id ='$id_p', S_name='$p_name', details='$details' WHERE S_id ='$id_p'  " ;

	$result=mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('แก้ไขข้อมูลแล้ว');</script>";
		echo "<script>window.location='../show_plan.php';</script>";
	}else{
		echo "<script>alert('แก้ไขข้อมูลบ่ได้');</script>";
	}

}

mysqli_close($conn);

?>