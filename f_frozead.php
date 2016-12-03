<?php
include 'config/serverconfig.php';
$archive = mysqli_query($con,"INSERT INTO T_FROZENAD SELECT * FROM T_AD WHERE ad_transferdate = NOW()");
$x = mysqli_query($con,"SET foreign_key_checks = 0");
$deletepost = mysqli_query($con,"DELETE FROM T_AD WHERE ad_transferdate = NOW()");
$d =  mysqli_query($con, "foreign_key_checks = 1");
?>