<?php
session_start();
if (!$_SESSION['userverificationkey']){
        header('location: oszust.html');
    }
$submit = $_POST['formsend'];
$ad_title = strip_tags($_POST['fad_title']);
$ad_desc = strip_tags($_POST['fad_desc']);
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
if($submit){
    if($ad_title&&$ad_desc){
        $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
        mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
        $query = mysql_query("INSERT INTO T_AD (ad_title, ad_desc, ad_date, u_id, cat_id, mature_content) VALUES ('$ad_title','$ad_desc','$ad_date','$u_id','$cat_id','$mature_content')");
        header('Location: page_addnewad.php');
    }
}
?>
