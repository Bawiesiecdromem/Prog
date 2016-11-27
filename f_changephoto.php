<?php
include 'f_sessionuserdatacreate.php';
$u_id = $_SESSION['u_id'];
$path = 'pics/u_avatar/';
$u_avatar = $path.basename($_FILES['favatar']['name']);

if(isset($_POST['fchange'])){

if(move_uploaded_file($_FILES['favatar']['tmp_name'], $u_avatar)){ 
$con = mysqli_connect('localhost','root','','ADBI_DB') or die ('Nie można nawiązać połączenia');
$query = mysqli_query($con, "UPDATE T_USERS SET u_avatar='$u_avatar' WHERE u_id='$u_id'");
echo 'jp';
} 
else{
echo 'eror';
}
}
?>
