<?php
session_start();
if ($_SESSION['u_email']){
    header('location: oszust.html');
}
else{
    $u_email = $_POST['fu_email'];
    $u_password = $_POST['fu_password'];
    if($u_email&&$u_password){
        $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
        mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
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
                echo "Błędne hasło";
            }
        }
        else{
            die("Taki użytkownik nie istnieje");
        }
    }
    else{
        die("Wprowadź nazwę użytkownika i hasło");
    }
}
?>