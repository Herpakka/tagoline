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
		<title>Show product</title>
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
		<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
    <?php include 'menu.php';?><br>
    <div class="container mt-4">
        <form method="POST" action="sh_build.php" >
            <!-- เลือก type สินค้า -->
            <div class="row">
                <div class="col-md-3">
                    <select class="form-select" name="key_type" aria-label="Default select example">
                        <?php 
                            $sql = "SELECT * FROM style ORDER BY S_name";
                            $hand = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($hand)){
                        ?>
                        <option value="<?=$row['S_id']?>"><?=$row['S_name']?></option>
                        <?php 
                            }
                        ?>
                    </select>
                </div>
                <div class="col-4">
                    <button type="submit" name="btt1" class="btn btn-dark">Serach</button>
                    <button type="submit" name="btt2" class="btn btn-outline-dark">All</button>
                </div>
            </div>
        </form> 
        <div class="row">

            <?php 
                //คำสั่งแบ่งหน้าเพจ 1.2.3..80
                $perpage = 8; //จำนวนสินค้าที่อยากให้แสดง
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $start = ($page -1) * $perpage;

                
                    
                

                // คำสั่งแสดงข้อมูล แบบค้นหา
                $key_word = @$_POST['keyword'];//keyword ไปเอามาจาก menu.php
                if($key_word !=""){
                    $sql = "SELECT * FROM house WHERE H_id='$key_word' or H_name like '%$key_word%'   ORDER BY H_id limit {$start}, {$perpage} ";

                }else{
                    $sql = "SELECT * FROM house ORDER BY H_id limit {$start}, {$perpage} ";
                }

				//ค้นหา จากปุ่ม btt1 - btt2
				$keyType = @$_POST['key_type'];
				if(isset($_POST['btt1'])){
					// จอยตารางแบบมีเงื่อนไข 
					$sql = "SELECT * FROM house p,style t WHERE p.S_id =t.S_id  and p.S_id = '$keyType' ORDER BY H_id  ";

				}elseif(isset($_POST['btt2'])){
					// จอยตารางแบบมีเงื่อนไข
					$sql = "SELECT * FROM house p,style t WHERE p.S_id =t.S_id  ORDER BY H_id  ";

				}else{
					// จอยตารางแบบมีเงื่อนไข
					//$sql = "SELECT * FROM house p,style t WHERE p.S_id =t.S_id  ORDER BY H_id  ";
				}
                


                // คำสั่งแสดงข้อมูล
                //เรียงลำดับ ORDER BY
                $hand = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array( $hand )){
                    $price = $row['price'];
            ?>

            <div class="col-sm-3"><!-- ตัวแบ่งคอลัม -->
                <img src ="img/<?=$row['picture']?>" width="200" height="250" class="mt-5 p-2 border"> <br>
                ID: <?=$row['H_id']?> <br>
                <h5 class="text-info"><?=$row['H_name']?> </h5> 
                ราคา <b class="text-danger"> <?=number_format($price,2)?> </b> บาท <br> <!-- number_format จัดรูปให้มีทสนิยม 2 ตำแหน่ง --> 
                <a href="update/update_order.php?id=<?=$row['H_id']?>" class="btn btn-secondary" > Add </a>
					 <a class="btn btn-outline-secondary" href="show_details_build.php?id_details=<?=$row['H_id']?>"> Details </a>
            </div>

            <?php 
            }
            //mysqli_close($conn);
            ?>
        </div>
        <?php 
            $sql1 = "SELECT * FROM house";
            $query1 = mysqli_query($conn,$sql1);
            $total_record = mysqli_num_rows($query1);
            $total_page = ceil($total_record / $perpage );
        ?>
        <nav aria-label="Page navigation example " class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="sh_build.php?page=1">Previous</a></li>
						<?php for($i=1;$i<=$total_page;$i++) { ?>
						<li class="page-item"><a class="page-link" href="sh_build.php?page=<?=$i?>"><?=$i?></a></li>
						<?php }  ?>
						<li class="page-item"><a class="page-link" href="sh_build.php?page=<?=$total_page?>">Next</a></li>
					</ul>
			</nav>
			<?php mysqli_close($conn); ?>
			
    </div>
    
</body>
</html>