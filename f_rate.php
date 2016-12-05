<?php
session_start();
if (!$_SESSION['userverificationkey']){
    header('location: page_login.php?pleaselogintoview');
}
$ad_id = $_GET['ad_id'];
$action_date = date('Y-m-d H:i:s');
$action_who = $_SESSION['u_id'];
$action_whichcomm = $_GET['action_whichcomm'];
include 'config/serverconfig.php';
$action_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE `action_who`=$action_who and `action_whichcomm`=$action_whichcomm") or die ('nie');
$action_row = mysqli_fetch_array($action_query);
$action_row_count = count($action_row);
if($action_row_count>1){
    $UnRate_query = mysqli_query($con,"DELETE FROM T_ACTIONS WHERE `action_who`=$action_who and `action_whichcomm`=$action_whichcomm");
    header('Location: page_ad.php?ad_id='.$ad_id.'');
}
if($action_row_count<1){
    $Rate_query = mysqli_query($con,"INSERT INTO T_ACTIONS (action_date, action_who, action_whichcomm) VALUES ('$action_date','$action_who','$action_whichcomm')");
    header('Location: page_ad.php?ad_id='.$ad_id.'');
}
?>