<?php
session_start();
$fu_email = $_POST['fu_email'];
$fu_password = $_POST['fu_password'];
if($fu_email&&$fu_password){
    $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
    mysql_select_db('adbi_db',$con) or die ('Nie znaleziono bazy');
    $session_query = mysql_query("SELECT * FROM t_users WHERE u_email='$fu_email'");
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
            header('Location: index.php');
            $_SESSION['u_email']=$fu_email;
            print $_SESSION['u_nick'];
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
?>