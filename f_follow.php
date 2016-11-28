<?php
session_start();
if (!$_SESSION['userverificationkey']){
    header('location: page_login.php?pleaselogintoview');
}
$action_whoisfollowed = $_GET['action_whoisfollowed'];
$con = mysqli_connect('localhost','root','','ADBI_DB') or die ('Nie można nawiązać połączenia');
$action_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE u_id=$action_whoisfollowed") or die ('nie');
?>
