<?php
//ชื่อสิ่งที่จะเก็บ
include '../condb.php';
$p_name = $_POST['pname'];
$n_price = $_POST['price'];
$typeID = $_POST['typeID'];

//อัพโหลดรูปภาพ1
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
	$new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "../img/".$new_image_name;
	move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
} else {
	$new_image_name = "";
}
//อัพโหลดรูปภาพ2
if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
	$new_image_name2 = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
	$image_upload_path2 = "../img/".$new_image_name2;
	move_uploaded_file($_FILES['file2']['tmp_name'],$image_upload_path2);
} else {
	$new_image_name2 = "";
}
//อัพโหลดรูปภาพ3
if (is_uploaded_file($_FILES['file3']['tmp_name'])) {
	$new_image_name3 = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file3']['name']), PATHINFO_EXTENSION);
	$image_upload_path3 = "../img/".$new_image_name3;
	move_uploaded_file($_FILES['file3']['tmp_name'],$image_upload_path3);
} else {
	$new_image_name3 = "";
}


//คำสั่งเพิ่มข้อมูลในตาราง product ไม่มี pro_id  เพราะ auto run
$sql="INSERT INTO house(H_name,price,S_id,picture,picture2,picture3) VALUES('$p_name','$n_price','$typeID','$new_image_name','$new_image_name2','$new_image_name3')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('บันทึกข้อมูลแล้ว');</script>";
    echo "<script>window.location='../show_build.php';</script>";
}else{
    echo "<script>alert('บันทึกข้อมูลบ่ได้');</script>";
}
mysqli_close($conn);
?>