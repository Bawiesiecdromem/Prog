<?php
$con = new mysqli('localhost','root','','adbi_db');
$submit = $_POST['formsend'];
$fu_email = $_POST['fu_email'];
$fu_nick = $_POST['fu_nick'];
$fu_password = $_POST['fu_password'];
$fu_name = $_POST['fu_name'];
$fu_forename = $_POST['fu_forename'];
$fu_phone = $_POST['fu_phone'];
$fu_birth = $_POST['fu_birth'];

$query = "INSERT INTO t_users VALUES (null,$fu_email,$fu_nick,$fu_password,$fu_name,$fu_forename,$fu_phone,$fu_birth,'')";
$r = mysql_query($con->$query);

?>