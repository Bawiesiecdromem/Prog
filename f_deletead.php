<?php
session_start();
if (!$_SESSION['userverificationkey']){
    header('location: page_login.php?pleaselogintoview');
}
$ad_id = $_GET['ad_id'];
include 'config/serverconfig.php';
$querydeletecomms = mysqli_query($con,"DELETE FROM T_COMMENTs WHERE `ad_id`=$ad_id");
$querydeletead = mysqli_query($con,"DELETE FROM T_AD WHERE `ad_id`=$ad_id");
header('Location: page_browse.php');
?>
