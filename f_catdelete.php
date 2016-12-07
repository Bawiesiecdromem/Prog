<?php
session_start();  
include 'config/serverconfig.php';
$cat_id = $_GET['cat_id'];
$x = mysqli_query($con,"SET foreign_key_checks = 0");
$cat_del = mysqli_query($con, "DELETE FROM T_CATEGORIES WHERE cat_id='$cat_id'");
$d =  mysqli_query($con, "foreign_key_checks = 1");
header('Location: page_godpanel.php');
?>
