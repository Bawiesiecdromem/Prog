<?php
    session_start();  
include 'config/serverconfig.php';
$u_id = $_GET['u_id'];
$u_god = $_GET['u_god'];
$new = $u_god - 1;
$mygod = $_SESSION['u_god'];
if($u_god<$mygod){
  $upgrade = mysqli_query($con, "UPDATE T_USERS SET u_god='$new' WHERE u_id='$u_id'") or die ('bum');
  header('Location: page_godpanel.php');
}
else{
echo 'nie';
header('Location: page_godpanel.php');
}

?>
