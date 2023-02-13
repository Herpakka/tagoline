<?php
ob_start();
session_start();
include 'condb.php';

if(!isset($_SESSION["intLine"]))    //เช็คว่าแถวเป็นค่าว่างมั๊ย ถ้าว่างให้ทำงานใน {}
{
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["id"];   //รหัสสินค้า
	 $_SESSION["strQty"][0] = 1;                   //จำนวนสินค้า
	 $_SESSION["sum_row"] = $_SESSION["sum_row"] + 1; //จำนวนสินค้าในตระกร้า
	header("location:../cart.php");
	// header("location:../sh_build.php");
}
else
{
	
	$key = array_search($_GET["id"], $_SESSION["strProductID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;//ถ้ามีสินค้า + เพิ่มอีก 1
	}
	else
	{
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;//ถ้าไม่มีขึ้น line ใหม่
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
		 $_SESSION["sum_row"] = $_SESSION["sum_row"] + 1;
	}
	header("location:../cart.php");
	// header("location:../sh_build.php");
}
?>



