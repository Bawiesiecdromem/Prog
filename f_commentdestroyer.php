<?php
if($_SESSION['u_id']==$row['u_id']||$_SESSION['u_id']==$comm_row['u_id']||($_SESSION['u_god']>0&&$_SESSION['u_god']>=$comm_row['u_god'])){echo '<a href="f_deletecomm.php?ad_id='.$row['ad_id'].'&comm_id='.$comm_row['comm_id'].'"><span class="Ad-DeleteCommGlyph glyphicon glyphicon-remove"></span></a>';}
?>