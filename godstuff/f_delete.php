<?php
include 'config/serverconfig.php';

if(isset($_GET['del']) ){

$U_id = $_GET['del'];
$query = mysqli_query($con, "DELETE FROM T_USERS where u_id='$u_id'");

}

?>
