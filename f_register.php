<?php
session_start();
if ($_SESSION['u_email']){
    header('location: page_login.php?pleaselogintoview');
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
$u_avatar = "pics/u_avatar/Undefined.jpg";
if($submit){
    if($u_email&&$u_nick&&$u_password&&$rpassword&&$u_name&&$u_forename&&$u_phone&&$u_birth&&$u_date){
	if($u_password==$rpassword){
            include 'config/serverconfig.php';
            $email_check = mysqli_query($con,"SELECT `u_email` FROM `T_USERS` WHERE `u_email`='".$u_email."'");
            if(mysqli_num_rows($email_check)){
                echo "Podany email jest zajęty";
                header('location: page_register.html');
                exit;
            }
            else{
            $query = mysqli_query($con,"INSERT INTO T_USERS (u_email, u_nick, u_password, u_name, u_forename, u_phone, u_birth, u_date, u_avatar) VALUES ('$u_email','$u_nick','$u_password','$u_name','$u_forename','$u_phone','$u_birth','$u_date','$u_avatar')");
            echo 'Pomyślnie zarejestrowano';
            $session_query = mysqli_query($con,"SELECT * FROM T_USERS WHERE u_email='$u_email'");
            $numrows = mysqli_num_rows($session_query);
            if ($numrows!=0){
                while ($row = mysqli_fetch_assoc($session_query)){
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