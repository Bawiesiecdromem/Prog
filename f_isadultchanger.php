<?php
    session_start();
    if (!$_SESSION['userverificationkey']){
        header('location: page_login.php?pleaselogintoview');
    }
    include 'config/serverconfig.php';
    if($_SESSION['is_adult']==0){
        $userdata_query = mysqli_query($con,"UPDATE T_USERS SET is_adult='1' WHERE u_id='$session_u_id'");
        $_SESSION['is_adult']=1;
    }
    else{
        $userdata_query = mysqli_query($con,"UPDATE T_USERS SET is_adult='0' WHERE u_id='$session_u_id'");
        $_SESSION['is_adult']=0;
    }
    header('Location: page_myaccount.php');
?>