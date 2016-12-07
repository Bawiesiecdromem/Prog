<?php

include 'config/serverconfig.php';
$sessiongod = $_SESSION['u_god'];
$querygod = mysqli_query($con,"SELECT * FROM T_USERS ORDER BY u_id");
$queryadmin = mysqli_query($con,"SELECT  u_id, u_email, u_nick, u_name, u_forename, u_birth, u_date, u_avatar, u_god FROM T_USERS WHERE u_god<='$sessiongod' ORDER BY u_id");
$querymod =  mysqli_query($con,"SELECT u_id, u_nick, u_date, u_avatar FROM T_USERS WHERE u_god<='$sessiongod' ORDER BY u_id");
if (!$querygod&&!$queryadmin&&!$querymod) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
if($_SESSION['u_god'] >= 3){
echo   '<thead>
	<tr>
	<th>ID</th>
	<th>Email</th>
	<th>Nick</th>
	<th>Imię</th>
	<th>Nazwisko</th>
	<th>Telefon</th>
	<th>Data urodzenia</th>
	<th>Data dołączenia</th>
	<th>Avatar</th>
	<th>Stopień</th>
	<th>Awansuj / Degraduj</th>
	<th>Treści +18</th>
	<th>Usuń użytkownika</th>
	</tr>
</thead>';
while ($rowgod = mysqli_fetch_array($querygod, MYSQL_BOTH)){
echo '<tbody>
	<tr>
	<td><span>'.$rowgod['u_id'].'</span></td>
	<td>'.$rowgod['u_email'].'</td>
	<td>'.$rowgod['u_nick'].'</td>	
	<td>'.$rowgod['u_name'].'</td>	
	<td>'.$rowgod['u_forename'].'</td>
	<td>'.$rowgod['u_phone'].'</td>	
	<td>'.$rowgod['u_birth'].'</td>
	<td>'.$rowgod['u_date'].'</td>
	<td>'.$rowgod['u_avatar'].'</td>	
	<td>'.$rowgod['u_god'].'</td>
	<td><a href="f_grantbadge.php?u_id='.$rowgod['u_id'].'&u_god='.$rowgod['u_god'].'"><span class="glyphicon glyphicon-plus"></span></a> / 
	<a href="f_retakebadge.php?u_id='.$rowgod['u_id'].'&u_god='.$rowgod['u_god'].'"><span class="glyphicon glyphicon-minus"></span></a></td>
	<td>'.$rowgod['is_adult'].'</td>
	<td><a href="f_userdelete.php?u_id='.$rowgod['u_id'].'&u_god='.$rowgod['u_god'].'"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr></tbody>';
	}
	}
	else if ($_SESSION['u_god'] == 2){
echo   '<thead>
	<tr>
	<th>ID</th>
	<th>Email</th>
	<th>Nick</th>
	<th>Imię</th>
	<th>Nazwisko</th>
	<th>Data urodzenia</th>
	<th>Data dołączenia</th>
	<th>Avatar</th>
	<th>Stopień</th>
	<th>Awansuj / Degraduj</th>
	<th>Usuń użytkownika</th>
	</tr>
</thead>';
while ($rowadm = mysqli_fetch_array($queryadmin, MYSQL_BOTH)){
echo '
<tbody>
	<tr>
	<td><span>'.$rowadm['u_id'].'</span></td>
	<td>'.$rowadm['u_email'].'</td>
	<td>'.$rowadm['u_nick'].'</td>	
	<td>'.$rowadm['u_name'].'</td>	
	<td>'.$rowadm['u_forename'].'</td>	
	<td>'.$rowadm['u_birth'].'</td>
	<td>'.$rowadm['u_date'].'</td>
	<td>'.$rowadm['u_avatar'].'</td>	
	<td>'.$rowadm['u_god'].'</td>
	<td><a href="f_grantbadge.php?u_id='.$rowadm['u_id'].'&u_god='.$rowadm['u_god'].'"><span class="glyphicon glyphicon-plus"></span></a> / 
	<a href="f_retakebadge.php?u_id='.$rowadm['u_id'].'&u_god='.$rowadm['u_god'].'"><span class="glyphicon glyphicon-minus"></span></a></td>
	<td><a href="f_userdelete.php?u_id='.$rowadm['u_id'].'&u_god='.$rowadm['u_god'].'"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr></tbody>';
}
}
else if ($_SESSION['u_god'] == 1){
echo   '<thead>
	<tr>
	<th>ID</th>
	<th>Nick</th>
	<th>Data dołączenia</th>
	<th>Avatar</th>
	</tr>
</thead>';
while ($rowmod = mysqli_fetch_array($querymod, MYSQL_BOTH)){
echo '
<tbody>
	<tr>
	<td><span>'.$rowmod['u_id'].'</span></td>
	<td>'.$rowmod['u_nick'].'</td>	
	<td>'.$rowmod['u_date'].'</td>
	<td>'.$rowmod['u_avatar'].'</td>
	</tr></tbody>';
}
	}
?>
