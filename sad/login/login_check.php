<?php 
include '../condb.php';
session_start();



//รับตัวแปลมาจาก Login.php
$username = $_POST['username'];
$password = $_POST['password'];

//เข้ารหัสด้วย sha512
$password = hash('sha512',$password);

$sql = "SELECT * FROM member WHERE user='$username' and password='$password' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$status=$row['Lavel']; //เช็ค admin 

//เช็คว่า username ตรงกับ password รึปล่าว
if($row > 0){
	$_SESSION["id1"]=$row['M_id'];
	$_SESSION["username"]=$row['user'];//$row ต้องตรงกับ database
	$_SESSION["pw"]=$row['password'];
	$_SESSION["firstname"]=$row['name'];	
	$_SESSION["lastname"]=$row['surname'];	
	$_SESSION["phone"]=$row['telephone'];
	$_SESSION["status1"]=$status;
	$_SESSION["sum_row"] = 0; //ตัวนับจำนสนของในตระกร้า
	
		//เช็ค admin
		if($status == '0'){
			$_SESSION['aa']='user';
			$show=header("location:../index.php");
		}
		elseif($status == '1'){
			$_SESSION['aa']='admin';
			$show=header("location:../index.php");
		}
	
}else{
	$_SESSION["Error"] = "<p> Your username or password is invalid </p>";
	$show=header("location:../login.php");
}
echo $show;

?>