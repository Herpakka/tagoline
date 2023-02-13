<?php
include 'condb.php';
session_start();
//ถ้า login ถูกให้เข้าหน้านี้โดยเช็ค จาก username ไปก่อนเดียวแก้
if(!isset($_SESSION["username"]))//เช็คว่ามีข้อมูล จาก login.php $_SESSION["username"]
    header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nember</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
	<?php include 'menu.php';?>
	<div class="container"> 
		<div class="h4 text-center alert alert-dark mb-4 mt-4" role="alert"> แสดงข้อมูลสมาชิก </div>
		<a href="fr_customer.php" class="btn btn-success mb-4">Add+</a>  

		<table class="text-center table table-dark table-striped">
				<tr>
						<th>id</th>
						<th>ชื่อ</th>
						<th>เบอร์</th>
						<th>username</th>
						<!-- <th>password</th> -->
						<th>status</th>
						<th>Edit</th>
						<th>Delete</th>

				</tr>
				
			<?php
				$sql="select * from member ";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($result)){
				?>
						<tr class="text-center">
								<td ><?=$row["M_id"]?></td>
								<td><?=$row["name"]?></td>
								<td><?=$row["telephone"]?></td>
								<td><?=$row["user"]?></td>
								<td><?=$row["Lavel"]?></td>
								<td><a href="edit_customer.php?customer_id=<?=$row["M_id"]?>" class="btn btn-warning mb-4">Edit</a></td>
								<td><a href="delete/delete_customer.php?Member_id=<?=$row["M_id"]?>" class="btn btn-danger mb-4" onclick="Del(this.href);return false;">Delete</a></td>
					</tr>
				<?php
				}
				mysqli_close($conn);
			?>
		</table>
	</div>
</body>
</html>


<script language="JavaScript">
    function Del(mypage){
        var agree=confirm("จะลบจริงๆบ่");
        if(agree){
            window.location=mypage;
        }
    }
</script>