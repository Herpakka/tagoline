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
		<div class="h4 text-center alert alert-dark mb-4 mt-4" role="alert"> แสดงข้อมูลแพลน </div>
		<a href="fr_plan.php" class="btn btn-success mb-4">Add+</a>  

		<table class="text-center table table-dark table-striped">
				<tr>
						<th>style_id</th>
						<th>style_name</th>
						<th>details</th>
						<th>Edit</th>
						<th>Delete</th>

				</tr>
				
			<?php
				$sql="select * from style ";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($result)){
				?>
						<tr class="text-center">
								<td ><?=$row["S_id"]?></td>
								<td><?=$row["S_name"]?></td>
								<td><?=$row["details"]?></td>
								<td><a href="edit_plan.php?type=<?=$row["S_id"]?>" class="btn btn-warning mb-4">Edit</a></td>
								<td><a href="delete/delete_plan.php?type=<?=$row["S_id"]?>" class="btn btn-danger mb-4" onclick="Del(this.href);return false;">Delete</a></td>
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