<?php
include '../condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
	header("location:../login.php");
?>

<?php

session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
    header("location:../login.php");

include '../condb.php';
$ids = $_GET['project_id'];
$sql="DELETE FROM house WHERE H_id = '$ids'";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลแล้ว');</script>";
    echo "<script>window.location='../show_build.php';</script>";
}else{
    echo "ERROR : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ลบข้อมูลบ่ได้');</script>";
}
mysqli_close($conn);
?>