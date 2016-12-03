<?php
                            echo 
                                '
                                <div class="Ad-Container">
                                    <p class="adbiseparator"></p>
                                    <div class="Ad-Head">
                                        <table><td class="Ad-InfoTd"><a href="page_users.php?u_id='.$row['u_id'].'"><h4><img src='.$row['u_avatar'].' class="AdAuthorAvatar">'.$row['u_nick'].'</h4></a></td>'; if($_SESSION['u_id']==$row['u_id']||($_SESSION['u_god']>0&&$_SESSION['u_god']>=$row['u_god'])){echo '<td class="Ad-DeleteTd"><h4><a href="f_deletead.php?ad_id='.$row['ad_id'].'"><span class="Ad-DeleteAdGlyph glyphicon glyphicon-remove"></span></a></h4></td>';} echo'</table>
                                    </div>
                                    <div class="Ad-Content">
                                ';
                            if($row['cat_id']==1){
                                echo
                                    '
                                        <div class="Ad-C-Post">
                                            '.$row['ad_desc'].'<br>
                                        </div>
                                    ';
                            }
                            if($row['cat_id']==2){
                                if($row['ad_photo']){
                                    echo 
                                    '
                                            <div>
                                                <img src='.$row['ad_photo'].' class="Ad-C-Photo">
                                            </div>
                                    ';
                                }
                            }
                            if($row['cat_id']>2){
                                echo '<div class="Ad-C-Post">';
                                echo '<table><tr><td width="100%"><h3><b>'.$row['ad_title'].'</b></h3></td>';
                                if($row['mature_content'] == 1){echo '<td ><a class="btn btn-danger" style="float: right">+18</a></td>';} echo '</tr></table>
                                <blockquote><br>
                                <p>'.$row['ad_desc'].'</p><br>';
                                $cat_query = mysqli_query($con,"SELECT * FROM T_AD INNER JOIN T_CATEGORIES ON T_AD.cat_id=T_CATEGORIES.cat_id") or die ('nie');
                                while($cat_row = mysqli_fetch_array($cat_query)){
                                    if($cat_row['ad_id']==$row['ad_id']) {
                                        echo '<small>'.$cat_row['cat_name'].'</small>';
                                    }
                                }
                                echo '</blockquote>
                                </div>';
                            }
                            echo
                                '
                                    </div>
                                    <div class="Ad-Bottom">
                                ';
                            $comms_query = mysqli_query($con,"SELECT T_C.*, T_U.* FROM T_COMMENTS AS T_C JOIN T_USERS AS T_U ON T_C.u_id = T_U.u_id WHERE T_C.ad_id =".$row['ad_id']." ORDER BY comm_date desc") or die ('nie');
                            while($comm_row = mysqli_fetch_array($comms_query)){
                                echo
                                '
                                    <div class="Ad-Comms"><span class="Ad-Comm-Nick">'.$comm_row['u_nick'].':</span> '.$comm_row['comm_desc'].'';if($_SESSION['u_id']==$row['u_id']||$_SESSION['u_id']==$comm_row['u_id']||($_SESSION['u_god']>0&&$_SESSION['u_god']>=$comm_row['u_god'])){echo '<a href="f_deletecomm.php?comm_id='.$comm_row['comm_id'].'"><span class="Ad-DeleteCommGlyph glyphicon glyphicon-remove"></span></a>';} echo'</div>
                                ';
                            }
                            if ($_SESSION['userverificationkey']){
                                echo
                                '
                                        <form action="f_addnewcomm.php?ad_id='.$row['ad_id'].'" method="POST" enctype="multipart/form-data">
                                            <input class="form-control" type="text" name="comm_desc" maxlength="255" placeholder="Napisz komentarz..."><input type="submit" name="formsend" value="Opublikuj" class="btn btn-danger">
                                        </form>
                                ';
                            }
                            echo '
                                </div>
                                    <p class="adbiseparator"></p>
                                </div>
                            ';
?>