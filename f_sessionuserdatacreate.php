<?php
session_start();
if ($_SESSION['u_email']){
    //potrzebne tylko podczas ewentualnego przekierowania, np z f_register.php
    include 'config/serverconfig.php';
        $session_u_email=$_SESSION['u_email'];
        $session_query = mysqli_query($con,"SELECT * FROM T_USERS WHERE u_email='$session_u_email'");
        $numrows = mysqli_num_rows($session_query);
        if ($numrows!=0){
            while ($row = mysqli_fetch_assoc($session_query)){
            $session_u_id = $row['u_id'];
            $_SESSION['u_id'] = $session_u_id;
            $session_u_email = $row['u_email'];
            $_SESSION['u_email'] = $session_u_email;
            $session_u_nick = $row['u_nick'];
            $_SESSION['u_nick'] = $session_u_nick;
            $session_u_password = $row['u_password'];
            $_SESSION['u_password'] = $session_u_password;
            $session_u_name = $row['u_name'];
            $_SESSION['u_name'] = $session_u_name;
            $session_u_forename = $row['u_forename'];
            $_SESSION['u_forename'] = $session_u_forename;
            $session_u_phone = $row['u_phone'];
            $_SESSION['u_phone'] = $session_u_phone;
            $session_u_birth = $row['u_birth'];
            $_SESSION['u_birth'] = $session_u_birth;
            $session_u_date = $row['u_date'];
            $_SESSION['u_date'] = $session_u_date;
            $session_u_avatar = $row['u_avatar'];
            $_SESSION['u_avatar'] = $session_u_avatar;
            $session_u_god = $row['u_god'];
            $_SESSION['u_god'] = $session_u_god;
            $session_is_adult = $row['is_adult'];
            $_SESSION['is_adult'] = $session_is_adult;
            $_SESSION['userverificationkey'] = $session_u_email.$session_u_name.$session_u_password;
            }
        }
    header('Location: index.php');
}
else{
    //oszukujesz ;-;
    header('Location: index.php');
}
?>