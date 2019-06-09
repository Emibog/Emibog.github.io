<?php
require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
$var = $_SERVER['REQUEST_URI'];
echo "$var";


?>
