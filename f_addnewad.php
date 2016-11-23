<?php
session_start();
if (!$_SESSION['userverificationkey']){
        header('location: oszust.html');
    }
$submit = $_POST['formsend'];
$fad_title = strip_tags($_POST['fad_title']);
$fad_desc = strip_tags($_POST['fad_desc']);
$fad_date = date('Y-m-d');
$fu_id = $_SESSION['u_id'];
$fcat_id = $_POST['fcat_id'];
$fmature_content = $_POST['fmature_content'];
if ($fmature_content==true){
    $fmature_content=1;
}
else{
    $fmature_content=0;
}
if($submit){
    if($fad_title&&$fad_desc){
        $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
        mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
        $query = mysql_query("INSERT INTO T_AD (ad_title, ad_desc, ad_date, u_id, cat_id, mature_content) VALUES ('$fad_title','$fad_desc','$fad_date','$fu_id','3','$fmature_content')");
        header('Location: page_addnewad.php');
    }
}
?>
