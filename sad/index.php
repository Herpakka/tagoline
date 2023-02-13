<?php
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
    <title>index</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
<?php include 'menu.php';
?> <br>

    <div class="container">
        <div class="alert alert-dark h4" role="alert"> 
            Welcome to user
        </div>
        <h3>user</h3>
            <?php
            if(isset($_SESSION["firstname"])){
                    echo "<div class='text-success' >"; //echo แล้วเรียกใช้ html
                    echo $_SESSION["firstname"] ;
                    echo "</div>";
            }
            ?>
        <a href="logout.php"> Logout </a>
    </div>
</body>
</html>