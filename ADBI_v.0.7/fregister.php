<?php
$submit = $_POST['formsend'];
$fu_email = strip_tags($_POST['fu_email']);
$fu_nick = strip_tags($_POST['fu_nick']);
$fu_password = strip_tags($_POST['fu_password']);
$rpassword = strip_tags($_POST['rpassword']);
$fu_name = strip_tags($_POST['fu_name']);
$fu_forename = strip_tags($_POST['fu_forename']);
$fu_phone = strip_tags($_POST['fu_phone']);
$fu_birth = strip_tags($_POST['fu_birth']);
$fu_date = date("Y-m-d");
if($submit){
    if($fu_email&&$fu_nick&&$fu_password&&$rpassword&&$fu_name&&$fu_forename&&$fu_phone&&$fu_birth&&$fu_date){
	if($fu_password==$rpassword){
            $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
            mysql_select_db('adbi_db',$con) or die ('Nie znaleziono bazy');
            $query =  mysql_query("INSERT INTO t_users (u_email, u_nick, u_password, u_name, u_forename, u_phone, u_birth, u_date) VALUES ('$fu_email','$fu_nick','$fu_password','$fu_name','$fu_forename','$fu_phone','$fu_birth','$fu_date')");
            echo 'Pomyślnie zarejestrowano';
            header('location: index.php');
            exit;
        }
        else{
            die("Hasła nie są takie same, przemyśl swój błąd");
            //$url = $_SERVER['HTTP_REFERER']; 
            //echo '<meta http-equiv="refresh" content="5;URL=' . $url . '">';
        }
    }
    else{
	echo "<b>Wszystkie</b> pola muszą być wypełnione, poczekaj 5 sec";
	//$url = $_SERVER['HTTP_REFERER']; 
	//echo '<meta http-equiv="refresh" content="5;URL=' . $url . '">';
    }
}
?>