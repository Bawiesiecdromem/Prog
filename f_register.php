<?php
session_start();
if ($_SESSION['u_email']){
    header('location: oszust.html');
}
$submit = $_POST['formsend'];
$u_email = strip_tags($_POST['fu_email']);
$u_nick = strip_tags($_POST['fu_nick']);
$u_password = strip_tags($_POST['fu_password']);
$rpassword = strip_tags($_POST['rpassword']);
$u_name = strip_tags($_POST['fu_name']);
$u_forename = strip_tags($_POST['fu_forename']);
$u_phone = strip_tags($_POST['fu_phone']);
$u_birth = strip_tags($_POST['fu_birth']);
$u_date = date("Y-m-d H:i:s");

if($submit){
    if($u_email&&$u_nick&&$u_password&&$rpassword&&$u_name&&$u_forename&&$u_phone&&$u_birth&&$u_date){
	if($u_password==$rpassword){
            $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
            mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
            $email_check = mysql_query("SELECT `u_email` FROM `T_USERS` WHERE `u_email`='".$u_email."'");
            if(mysql_num_rows($email_check)){
                echo "Podany email jest zajęty";
                header('location: page_register.html');
                exit;
            }
            else{
            $query =  mysql_query("INSERT INTO T_USERS (u_email, u_nick, u_password, u_name, u_forename, u_phone, u_birth, u_date) VALUES ('$u_email','$u_nick','$u_password','$u_name','$u_forename','$u_phone','$u_birth','$u_date')");
            echo 'Pomyślnie zarejestrowano';
            $session_query = mysql_query("SELECT * FROM T_USERS WHERE u_email='$u_email'");
            $numrows = mysql_num_rows($session_query);
            if ($numrows!=0){
                while ($row = mysql_fetch_assoc($session_query)){
                $session_u_email = $row['u_email'];
                $session_u_password = $row['u_password'];
                $session_u_nick = $row['u_nick'];
                $_SESSION['u_nick'] = $session_u_nick;
                }
                if ($u_email==$session_u_email&&$u_password==$session_u_password){
                    echo "Trwa przekierowanie, jeżeli nie nastąpi w przeciągu 5 sec naciśnij  <a href='uzytkownik.php'>TUTAJ </a>";
                    $_SESSION['u_email']=$u_email;
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