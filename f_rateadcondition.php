<?php
session_start();
$action_whichad = $row['ad_id'];
if ($_SESSION['userverificationkey']){
    $action_who = $_SESSION['u_id'];
    $action_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE `action_who`=$action_who and `action_whichad`=$action_whichad") or die ('nie');
    $action_row = mysqli_fetch_array($action_query);
    $action_row_count = count($action_row);
}
else{
    $action_row_count=0;
}
$rate_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE `action_whichad`=$action_whichad") or die ('nie');
$rate_count = mysqli_num_rows($rate_query);
if($action_row_count>1){
    echo 'adbiratefullhearth glyphicon glyphicon-heart">'.$rate_count;
}
if($action_row_count<1){
    echo 'adbirateemptyhearth glyphicon glyphicon-heart-empty">'.$rate_count;
}
?>