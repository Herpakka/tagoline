<?php
include '../condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
	header("location:../login.php");


$proid = $_POST['proid'];
$proname = $_POST['pname'];//จากที่ edit_product.php บรรทัด <input type="text" name="pname"
$price = $_POST['price'];
$typeid = $_POST['typeID'];
$image1 = $_POST['txtimg1'];
$image2 = $_POST['txtimg2'];
$image3 = $_POST['txtimg3'];

// อัพโหลดรูปภาพ1
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
	$new_image_name1 = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "../img/".$new_image_name1;
	move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
} else {
	$new_image_name1 = "$image1";
}

//อัพโหลดรูปภาพ2
if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
	$new_image_name2 = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
	$image_upload_path2 = "../img/".$new_image_name2;
	move_uploaded_file($_FILES['file2']['tmp_name'],$image_upload_path2);
} else {
	$new_image_name2 = "$image2";
}

//อัพโหลดรูปภาพ3
if (is_uploaded_file($_FILES['file3']['tmp_name'])) {
	$new_image_name3 = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file3']['name']), PATHINFO_EXTENSION);
	$image_upload_path3 = "../img/".$new_image_name3;
	move_uploaded_file($_FILES['file3']['tmp_name'],$image_upload_path3);
} else {
	$new_image_name3 = "$image3";
}

//คำสั่ง update 
$sql="UPDATE house 
SET H_name = '$proname', 
	price = '$price', 
	S_id = ' $typeid', 
	picture = '$new_image_name1',
	picture2 = '$new_image_name2',
	picture3 = '$new_image_name3' 
WHERE H_id ='$proid' ";

$result=mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('แก้ไขข้อมูลแล้ว');</script>";
	echo "<script>window.location='../show_build.php';</script>";
}else{
	echo "<script>alert('แก้ไขข้อมูลบ่ได้');</script>";
}
mysqli_close($conn);

?>