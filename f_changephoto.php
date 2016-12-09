<?php
session_start();
$submit = $_POST['fchange'];
$u_id = $_SESSION['u_id'];
$image_info = getimagesize($_FILES['fu_avatar']['tmp_name']);
$image_width = $image_info[0];
$image_height = $image_info[1];
$path = 'pics/u_avatar/';
$u_avatar = $path.basename($_FILES['fu_avatar']['name']);
if($submit){
    if($image_width==$image_height){
        $temp = explode(".", $_FILES["fu_avatar"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        if(move_uploaded_file($_FILES["fu_avatar"]["tmp_name"], $path . $newfilename)){
            move_uploaded_file($_FILES["fu_avatar"]['tmp_name'], $newfilename);
            $u_avatar = $path.$newfilename;
            include 'config/serverconfig.php';
            $query = mysqli_query($con, "UPDATE T_USERS SET u_avatar='$u_avatar' WHERE u_id='$u_id'");
            include 'f_sessionuserdataupdate.php';
            header('Location: page_myaccount.php');
        } 
        else{
            echo 'format 1:1';
        }
    }
    else{
        echo 'eror';
    }
}
?>