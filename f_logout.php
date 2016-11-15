<?php
session_start();

session_destroy();

echo "Wylogowano pomyślnie";
sleep(2);
header('location: index.php');
?>
