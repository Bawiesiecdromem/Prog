<?php
session_start();
$submit = $_POST['formsend'];
$u_email = strip_tags($_POST['fu_email']);
$u_nick = strip_tags($_POST['fu_nick']);
$u_password = strip_tags($_POST['fu_password']);
$u_name = strip_tags($_POST['fu_name']);
$u_forename = strip_tags($_POST['fu_forename']);
$u_phone = strip_tags($_POST['fu_phone']);
$u_birth = strip_tags($_POST['fu_birth']);
$u_id = $_SESSION['u_id'];
if($submit){
include 'config/serverconfig.php';
$updatedata_query = mysqli_query($con, "UPDATE T_USERS SET u_email='$u_email', u_nick='$u_nick', u_password='$u_password', u_name='$u_name', u_forename='$u_forename', u_phone='$u_phone', u_birth='$u_birth' WHERE u_id='$u_id'") or die ('nie lol');
include 'f_sessionuserdataupdate.php';
header('location: page_myaccount.php');

}
?>
