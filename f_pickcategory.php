<?php
    include 'config/serverconfig.php';
    $pickcategory_query = mysqli_query($con,"SELECT * FROM T_CATEGORIES ORDER BY cat_id") or die ('nie');
    while($pickcategory_row = mysqli_fetch_array($pickcategory_query)){
        if($pickcategory_row['cat_id']>2){
            echo'<option value="'.$pickcategory_row['cat_id'].'">'.$pickcategory_row['cat_name'].'</option>';
        }
    }
?>