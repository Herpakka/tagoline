<?php
include '../condb.php';
// $name = $_POST['pname'];
$style = $_POST['nplan'];
$details = $_POST['details'];

//ตรวจสอบ ค่าซ้ำ
$check = "SELECT * FROM style WHERE S_name = '$style' ";
$hand = mysqli_query($conn,$check);
$num = mysqli_num_rows($hand);
if($num > 0){
	echo "<script> alert('ชื่อ style ซ้ำเปลี่ยนซะ'); </script> ";
	echo "<script> window.location='../fr_plan.php'; </script> ";
}else{

	$sql="INSERT INTO style(S_name,details) VALUES('$style','$details')";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('บันทึกข้อมูลแล้ว');</script>";
		echo "<script>window.location='../show_plan.php';</script>";
	}else{
		echo "<script>alert('บันทึกข้อมูลบ่ได้');</script>";
	}

}


mysqli_close($conn);
?>