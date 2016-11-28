<?php
session_start();
if (!$_SESSION['userverificationkey']){
    header('location: page_login.php?pleaselogintoview');
}
$action_date = date('Y-m-d H:i:s');
$action_who = $_SESSION['u_id'];
$action_whoisfollowed = $_GET['action_whoisfollowed'];
$con = mysqli_connect('localhost','root','','ADBI_DB') or die ('Nie można nawiązać połączenia');
$action_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE `action_who`=$action_who and `action_whoisfollowed`=$action_whoisfollowed") or die ('nie');
$action_row = mysqli_fetch_array($action_query);
$action_row_count = count($action_row);
if($action_row_count>1){
    $StopFollow_query = mysqli_query($con,"DELETE FROM T_ACTIONS WHERE `action_who`=$action_who and `action_whoisfollowed`=$action_whoisfollowed");
    header('Location: page_users.php?u_id='.$action_whoisfollowed.'');
}
if($action_row_count<1){
    $StartFollow_query = mysqli_query($con,"INSERT INTO T_ACTIONS (action_date, action_who, action_whoisfollowed) VALUES ('$action_date','$action_who','$action_whoisfollowed')");
    header('Location: page_users.php?u_id='.$action_whoisfollowed.'');
}
?>