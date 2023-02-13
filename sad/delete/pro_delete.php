<?php
	ob_start();
	session_start();
	
	if(isset($_GET["Line"]))
	{
		$Line = $_GET["Line"];
		$_SESSION["strProductID"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
		$_SESSION["sum_row"] = $_SESSION["sum_row"] - 1;
	}
	header("location:../cart.php");
?>