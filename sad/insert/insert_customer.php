<?php
include '../condb.php';
$f_name = $_POST['fname'];
$tel = $_POST['telephone'];
$user = $_POST['username'];
$pass = $_POST['password'];
$sta = $_POST['status'];
//เข้ารหัสด้วย sha512
$pass=hash('sha512',$pass);


//ตรวจสอบ ค่าซ้ำ
$check = "SELECT * FROM member WHERE name = '$f_name' or  user = '$user' ";
$hand = mysqli_query($conn,$check);
$num = mysqli_num_rows($hand);
if($num > 0){
	echo "<script> alert('ชื่อ หรือไม่ก็ username ซ้ำเปลี่ยนซะ'); </script> ";
	echo "<script> window.location='../fr_customer.php'; </script> ";
}else{

	$sql="INSERT INTO member(name,telephone,user,password,Lavel) VALUES('$f_name','$tel','$user','$pass','$sta')";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('บันทึกข้อมูลแล้ว');</script>";
		echo "<script>window.location='../show_customer.php';</script>";
	}else{
		echo "<script>alert('บันทึกข้อมูลบ่ได้');</script>";
	}

}

mysqli_close($conn);
?>