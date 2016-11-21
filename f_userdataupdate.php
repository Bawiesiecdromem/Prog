<?php
session_start();
if ($_SESSION['u_email']){
    header('location: oszust.html');
}
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
            mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
            $email_check = mysql_query("SELECT `u_email` FROM `T_USERS` WHERE `u_email`='".$fu_email."'");
            if(mysql_num_rows($email_check)){
                echo "Podany email jest zajęty";
                header('location: page_register.html');
                exit;
            }
            else{
            $query =  mysql_query("INSERT INTO T_USERS (u_email, u_nick, u_password, u_name, u_forename, u_phone, u_birth, u_date) VALUES ('$fu_email','$fu_nick','$fu_password','$fu_name','$fu_forename','$fu_phone','$fu_birth','$fu_date')");
            echo 'Pomyślnie zarejestrowano';
            $session_query = mysql_query("SELECT * FROM T_USERS WHERE u_email='$fu_email'");
            $numrows = mysql_num_rows($session_query);
            if ($numrows!=0){
                while ($row = mysql_fetch_assoc($session_query)){
                $session_u_email = $row['u_email'];
                $session_u_password = $row['u_password'];
                $session_u_nick = $row['u_nick'];
                $_SESSION['u_nick'] = $session_u_nick;
                }
                if ($fu_email==$session_u_email&&$fu_password==$session_u_password){
                    echo "Trwa przekierowanie, jeżeli nie nastąpi w przeciągu 5 sec naciśnij  <a href='uzytkownik.php'>TUTAJ </a>";
                    $_SESSION['u_email']=$fu_email;
                    header('Location: f_sessionuserdatacreate.php');
                }
                else{
                    echo "Wystąpił błąd przy przetwarzaniu danych";
                }
            }
            exit;
            }
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