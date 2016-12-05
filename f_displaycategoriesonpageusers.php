<?php
    include 'config/serverconfig.php';
    $categories_query = mysqli_query($con,"SELECT * FROM T_CATEGORIES ORDER BY cat_id") or die ('nie');
    while($cat_row = mysqli_fetch_array($categories_query)){
        echo'<li><a href="?u_id='.$_GET['u_id'].'&cat_id='.$cat_row['cat_id'].'">'.$cat_row['cat_name'].'</a></li>';
    }
?>