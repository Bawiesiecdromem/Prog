<?php
session_start();
if (!$_SESSION['userverificationkey']){
    header('location: page_login.php?pleaselogintoview');
}
$comm_id = $_GET['comm_id'];
include 'config/serverconfig.php';
$querydeletecomm = mysqli_query($con,"DELETE FROM T_COMMENTS WHERE `comm_id`=$comm_id");
header('Location: page_browse.php');
?>