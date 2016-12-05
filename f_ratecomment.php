<?php
echo '<a ';if ($_SESSION['userverificationkey']){ echo'href="f_rate.php?ad_id='.$row['ad_id'].'&action_whichcomm='.$comm_row['comm_id'].'"';} echo'><span class="Ad-CommRateGlyph ';include'f_ratecondition.php';echo'</span></a>';
?>