<?php
session_start();
if (!$_SESSION['userverificationkey']){
        header('location: page_login.php?pleaselogintoiew');
    }
$submit = $_POST['formsend'];
$comm_desc = strip_tags($_POST['comm_desc']);
$comm_date = date('Y-m-d H:i:s');
$u_id = $_SESSION['u_id'];
$ad_id = $_GET['ad_id'];
if($submit){
    if($comm_desc){
        include 'config/serverconfig.php';
        $query = mysqli_query($con,"INSERT INTO T_COMMENTS (comm_desc, comm_date, u_id, ad_id) VALUES ('$comm_desc','$comm_date','$u_id','$ad_id')");
        header('Location: page_browse.php');
    }
}
?>
