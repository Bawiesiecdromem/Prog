<?php
session_start();
if (!$_SESSION['userverificationkey']){
        header('location: page_login.php?pleaselogintoview');
    }
$submit1 = $_POST['formsend1'];
$submit2 = $_POST['formsend2'];
$submit3 = $_POST['formsend3'];
$ad_title = strip_tags($_POST['fad_title']);
$ad_desc = strip_tags($_POST['fad_desc']);
$path = 'pics/ad_photo/';
$ad_photo = $path.basename($_FILES['fad_photo']['name']);
$ad_date = date('Y-m-d H:i:s');
$u_id = $_SESSION['u_id'];
$cat_id = $_POST['fcat_id'];
$mature_content = $_POST['fmature_content'];
if ($mature_content==true){
    $mature_content=1;
}
else{
    $mature_content=0;
}
if($submit1){
    if($ad_desc){
        include 'config/serverconfig.php';
        $query = mysqli_query($con,"INSERT INTO T_AD (ad_title, ad_desc, ad_date, u_id, cat_id, mature_content) VALUES ('$ad_title','$ad_desc','$ad_date','$u_id','1','$mature_content')");
        header('Location: page_browse.php');
    }
}
if($submit2){
    $temp = explode(".", $_FILES["fad_photo"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    if(move_uploaded_file($_FILES["fad_photo"]["tmp_name"], $path . $newfilename)){
        move_uploaded_file($_FILES['fad_photo']['tmp_name'], $newfilename);
        $ad_photo = $path.$newfilename;
        include 'config/serverconfig.php';
        $slider = $_POST['slider'];
        if($slider<$ad_date){
            $slider = 1;
        }	
        $ad_transferdate= date('Y-m-d H:i:s', strtotime(' + '.$slider.' days'));
        $query = mysqli_query($con, "INSERT INTO T_AD (ad_photo, ad_date, ad_transferdate, u_id, cat_id, mature_content) VALUES ('$ad_photo','$ad_date', '$ad_transferdate','$u_id','2','$mature_content')");
        header('Location: page_browse.php');
    }
}
if($submit3){
    if($ad_title&&$ad_desc){
        include 'config/serverconfig.php';
        $query = mysqli_query($con,"INSERT INTO T_AD (ad_title, ad_desc, ad_date, u_id, cat_id, mature_content) VALUES ('$ad_title','$ad_desc','$ad_date','$u_id','$cat_id','$mature_content')");
        header('Location: page_browse.php');
    }
}
?>