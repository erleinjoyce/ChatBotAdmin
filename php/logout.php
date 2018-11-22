<?php
// session start
session_start();
// include database connecction
include '../connection/connection.php';
// delete login session
unset($_SESSION['hitek_admin']);
echo 1;
?>