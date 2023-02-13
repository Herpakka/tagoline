<?php 
session_start();
session_destroy();//เครีย session ใน login.php
header("location:../login.php");
?>