<?php
    session_start();  
include 'config/serverconfig.php';
$u_id = $_GET['u_id'];
$u_god = $_GET['u_god'];
$mygod = $_SESSION['u_god'];
if($u_god<$mygod){
  $x = mysqli_query($con,"SET foreign_key_checks = 0");
  $delete = mysqli_query($con, "DELETE FROM T_USERS WHERE `u_id`='$u_id'") or die ('bum');
  $d =  mysqli_query($con, "foreign_key_checks = 1");
  header('Location: page_godpanel.php');
}
else{
echo 'nie';
header('Location: page_godpanel.php');
}

?>
