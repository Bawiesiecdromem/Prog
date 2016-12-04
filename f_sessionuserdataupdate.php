<?php
if ($_SESSION['userverificationkey']){
    include 'f_sessionuserdata.php';
}
else{
    //oszukujesz ;-;
    header('Location: index.php');
}
?>