<?php
include '../condb.php';
//รับตัวแปลจาก register.php
$name = $_POST['firstname']; //ตัวแปล $name ตั้งเป็นอะไรก็ได้
$lname = $_POST['lastname'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
//เข้ารหัสด้วย sha512
$password=hash('sha512',$password);

//ตรวจสอบ user ซ้ำ
$check = "SELECT * FROM member WHERE name ='$name' OR user = '$username' ";
$hand = mysqli_query($conn,$check);
$num = mysqli_num_rows($hand);
if($num > 0){
	echo "<script> alert('ชื่อ หรือไม่ก็ username ซ้ำเปลี่ยนซะ'); </script> ";
	echo "<script> window.location='../register.php'; </script> ";
}else{
	//คำสั่งเพิ่มข้อมูลตาราง  customer
	$sql = "INSERT INTO member(name,surname,telephone,user,password,Lavel) 
	Values('$name','$lname','$phone','$username','$password','0') "; //เอามาจาก //รับตัวแปลจาก register.php
	$result=mysqli_query($conn,$sql);// บันทึกข้อมูลลง data

	//เช็คว่าข้อมูลเข้าไหม
	if($result){
		echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script> ";
		echo "<script> window.location='../login.php'; </script> ";
	}else{
		echo "Error:" . $sql . "<br>" . mysqli_error($conn);
		echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script> ";
	}

}











mysqli_close($conn);

?>