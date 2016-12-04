<?php
session_start();
$action_who = $_SESSION['u_id'];
$action_whoisfollowed = $_GET['u_id'];
include 'config/serverconfig.php';
$action_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE `action_who`=$action_who and `action_whoisfollowed`=$action_whoisfollowed") or die ('nie');
$action_row = mysqli_fetch_array($action_query);
$action_row_count = count($action_row);
if($action_row_count>1){
    echo '<button id="IFollowYou" class="btn btn-success"><span>I follow you <span class="glyphicon glyphicon-ok"></span></span></button>';
}
if($action_row_count<1){
    echo '<button id="IWalkALonelyRoad" class="btn btn-success"><span>I walk a lonely road <span class="glyphicon glyphicon-remove"></span></span></button>';
}
?>