<?php
    $islimitoncomments=$limitofcomments;
    if($islimitoncomments==1){
        //ustawiony limit, pokazuje 10 najnowszych komentarzy -> wyświetlanie w widoku ogólnym ;-;
        $comms_query = mysqli_query($con,"SELECT T_C.*, T_U.* FROM T_COMMENTS AS T_C JOIN T_USERS AS T_U ON T_C.u_id = T_U.u_id WHERE T_C.ad_id =".$row['ad_id']." ORDER BY comm_date desc LIMIT 10") or die ('nie');
    }
    else{
        //brak limitu komentarzy -> wyświetlanie w widoku szczegółowym, na konkretnym ogłoszeniu *.*
        $comms_query = mysqli_query($con,"SELECT T_C.*, T_U.* FROM T_COMMENTS AS T_C JOIN T_USERS AS T_U ON T_C.u_id = T_U.u_id WHERE T_C.ad_id =".$row['ad_id']." ORDER BY comm_date desc") or die ('nie');
    }
?>