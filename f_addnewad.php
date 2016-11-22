<?php
session_start();
if ($_SESSION['u_email']){
    header('location: oszust.html');
}
$submit = $_POST['formsend'];
$ad_title = strip_tags($_POST['fad_title']);
$ad_desc = strip_tags($_POST['fad_desc']);
$tmp = $_FILES['fad_photo']['tmp_name']; 
$katalog = 'pics/';
$ad_photo = $katalog.$_FILES['fad_photo']['name'];
$ad_date = date('Y-m-d');
$u_id = $_SESSION['u_id'];
$cat_id = $_POST['fcat_id'];
$mature_content = $_POST['fmature_content'];
if($submit){
    if($ad_title&&$ad_desc){
        $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
        mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
        if(is_uploaded_file($tmp)) { 
             move_uploaded_file($tmp, $ad_photo); 
                $query = mysql_query("INSERT INTO T_AD (ad_title, ad_desc, ad_photo, ad_date, u_id, cat_id, mature_content) VALUES ('$ad_title','$ad_desc','$ad_photo','$ad_date','$u_id','$cat_id','$mature_content')");
                header('Location: cos.php');
        } 
        else {
        $query = mysql_query("INSERT INTO T_AD (ad_title, ad_desc, ad_date, u_id, cat_id, mature_content) VALUES ('$ad_title','$ad_desc','$ad_date','$u_id','$cat_id','$mature_content')");
        header('Location: page_addnewad.php');
        }
    }
}
?>
