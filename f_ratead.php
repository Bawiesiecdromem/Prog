<?php
echo '<a ';if ($_SESSION['userverificationkey']){ echo'href="f_rateforad.php?ad_id='.$row['ad_id'].'&action_whichad='.$row['ad_id'].'"';} echo'><span class="Ad-CommRateGlyph ';include'f_rateadcondition.php';echo'</span></a>';
?>