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
	<title>Document</title>
	<!-- Bootstrap CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
	<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
	<script src="bootstrap/sweetalert2/dist/sweetalert2.all.js" ></script>
	<script src="bootstrap/jquery-3.6.3.min.map" ></script>
</head>
<body>
	<?php include 'menu.php';
	?>
	<div class="container">
	<div class="h4 text-center alert alert-dark mb-4 mt-4" role="alert"> แสดงข้อมูลสินค้า </div>
		<table class="table table-dark table-hover text-center  " >
			<a class="btn btn-success mb-4" href="fr_build.php" role="button">add+</a>
				
				<tr>
					<th>idการสร้างบ้าน</th>
					<th>ชื่อโปรเจคสร้างบ้าน</th>
					<th>แพลน</th>
					<th>ราคา</th>
					<th>รูปภาพ</th>
					<th>รูปภาพ2</th>
					<th>รูปภาพ3</th>
					<th>แก้ไข</th>
					<th>ลบ</th>
				</tr>
				<?php 
				//เชื่อม 2 ตาราง build เชื่อมต่อกับ type  เชื่อมกันด้วย type_id
				$sql="SELECT * FROM house ,style WHERE house.S_id = style.S_id  " ;
				$hand = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($hand)){
					?>

					<tr>
					<td><?=$row['H_id']?> </td>
					<td><?=$row['H_name']?> </td>
					<td><?=$row['S_id']?> </td>
					<td><?=$row['price']?> </td>
					<td><img class="img-thumbnail 10px 300dpi" src="img/<?=$row['picture']?>"  width="80px" hieght="100px" > </td>
					<td><img class="img-thumbnail 10px 300dpi" src="img/<?=$row['picture2']?>"  width="80px" hieght="100px" > </td>
					<td><img class="img-thumbnail 10px 300dpi" src="img/<?=$row['picture3']?>"  width="80px" hieght="100px" > </td>
					<td><a href="edit_build.php?id=<?=$row['H_id']?>" class="btn btn-warning" > Edit </a></td>
					<td><a href="delete/delete_build.php?project_id=<?=$row['H_id']?>" class="btn btn-danger mb-4" onclick="return confirm('จะลบจริงๆใช่ไหม');"> Del </a></td>
				</tr>

				<?php 
			}
			mysqli_close($conn);
			?>
		</table>
	</div>


	<!-- ใช้ java -->
	<script>
		
	</script>
    
	<!-- Code injected by live-server -->
	<script>
		// <![CDATA[  <-- For SVG support
		if ('WebSocket' in window) {
			(function () {
				function refreshCSS() {
					var sheets = [].slice.call(document.getElementsByTagName("link"));
					var head = document.getElementsByTagName("head")[0];
					for (var i = 0; i < sheets.length; ++i) {
						var elem = sheets[i];
						var parent = elem.parentElement || head;
						parent.removeChild(elem);
						var rel = elem.rel;
						if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
							var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
							elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
						}
						parent.appendChild(elem);
					}
				}
				var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
				var address = protocol + window.location.host + window.location.pathname + '/ws';
				var socket = new WebSocket(address);
				socket.onmessage = function (msg) {
					if (msg.data == 'reload') window.location.reload();
					else if (msg.data == 'refreshcss') refreshCSS();
				};
				if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
					console.log('Live reload enabled.');
					sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
				}
			})();
		}
		else {
			console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
		}
		// ]]>
	</script>
</body>
</html>