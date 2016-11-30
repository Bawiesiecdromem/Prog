<?php
session_start();
$action_who = $_SESSION['u_id'];
$action_whoisfollowed = $_GET['u_id'];
include 'config/serverconfig.php';
$action_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE `action_who`=$action_who and `action_whoisfollowed`=$action_whoisfollowed") or die ('nie');
$action_row = mysqli_fetch_array($action_query);
$action_row_count = count($action_row);
if($action_row_count>1){
    echo 'Podążam <span class="glyphicon glyphicon-ok"></span>';
}
if($action_row_count<1){
    echo 'I walk a lonely road <span class="glyphicon glyphicon-remove"></span>';
}
?>