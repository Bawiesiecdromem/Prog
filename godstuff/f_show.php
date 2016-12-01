<?php
include 'config/serverconfig.php';

$query = mysqli_query($con, "SELECT * FROM `T_USERS`");

//$rs = $con->query($query);
while ($row = $query->fetch_array()) {
  $data[] = $row;
}	   
    print json_encode($data);
?>
