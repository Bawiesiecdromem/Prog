<?php
session_start();
if ($_SESSION['u_email']){
    //potrzebne tylko podczas ewentualnego przekierowania, np z f_register.php
    include 'f_sessionuserdata.php';
    header('Location: index.php');
}
else{
    //oszukujesz ;-;
    header('Location: index.php');
}
?>