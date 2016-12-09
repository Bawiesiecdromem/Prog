<?php
$loguserid = $_SESSION['u_id'];
$myhistory_action_query = mysqli_query($con,"SELECT * FROM T_ACTIONS RIGHT JOIN T_USERS ON (T_ACTIONS.action_who=T_USERS.u_id) WHERE T_ACTIONS.action_whose='$loguserid' ORDER BY action_date desc") or die ('nie');
while($myhistory_action_row = mysqli_fetch_array($myhistory_action_query)){
    if($myhistory_action_row['action_whichad']>0){
        $hs_ad_id=$myhistory_action_row['action_whichad'];
        $myhistory_ad_query = mysqli_query($con,"SELECT * FROM T_AD WHERE ad_id='$hs_ad_id'");
        while($myhistory_ad_row = mysqli_fetch_array($myhistory_ad_query)){
            echo $myhistory_action_row['action_date'].' - <a href="page_users.php?u_id='.$myhistory_action_row['action_who'].'"><b>'.$myhistory_action_row['u_nick'].'</b></a> Lubi <a href="page_ad.php?ad_id='.$myhistory_ad_row['ad_id'].'"><b>twój post.</b></a><br>';
        }
    }
    if($myhistory_action_row['action_whichcomm']>0){
        $hs_comm_id=$myhistory_action_row['action_whichcomm'];
        $myhistory_comm_query = mysqli_query($con,"SELECT * FROM T_COMMENTS WHERE comm_id='$hs_comm_id'");
        while($myhistory_comm_row = mysqli_fetch_array($myhistory_comm_query)){
            echo $myhistory_action_row['action_date'].' - <a href="page_users.php?u_id='.$myhistory_action_row['action_who'].'"><b>'.$myhistory_action_row['u_nick'].'</b></a> Lubi <a href="page_ad.php?ad_id='.$myhistory_comm_row['ad_id'].'"><b>twój komentarz.</b></a><br>';
        }
    }
    if($myhistory_action_row['action_whoisfollowed']>0){
        $hs_whoisfollowed_id=$myhistory_action_row['action_whoisfollowed'];
        $myhistory_whoisfollowed_query = mysqli_query($con,"SELECT * FROM T_ACTIONS WHERE action_whoisfollowed='$hs_whoisfollowed_id'");
        $myhistory_whoisfollowed_row = mysqli_fetch_array($myhistory_whoisfollowed_query);
        echo $myhistory_action_row['action_date'].' - <a href="page_users.php?u_id='.$myhistory_action_row['action_who'].'"><b>'.$myhistory_action_row['u_nick'].'</b></a> Obserwuje twój profil.<br>';
    }
}
?>