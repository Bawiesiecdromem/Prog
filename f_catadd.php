<?php
session_start();  
include 'config/serverconfig.php';
$submit = $_POST['cat_send'];
$cat_name = strip_tags($_POST['cat_name']);
$cat_desc = strip_tags($_POST['cat_desc']);
$cat_mature = $_POST['cat_mature'];

if($submit){
if(isset($cat_mature)){
$cat_mature = 1;
}

$catadd_query = mysqli_query($con,"INSERT INTO T_CATEGORIES (cat_name, cat_desc, mature_content) VALUES ('$cat_name','$cat_desc','$cat_mature')") or die ('nie dzisiaj');
header('Location: page_godpanel.php');
}

?>
<tbody><tr><form action="f_catadd.php" method="POST" accept-charset="UTF-8">
<td>Dodaj nową:</td>
<td><input type="text" name="cat_name"></td>
<td><input type="text" name="cat_desc"></td>
<td><input type="checkbox" name="cat_mature"></td>
<td><input type="submit" name="cat_send" value="Dodaj"></td>
</form></tr></tbody>
