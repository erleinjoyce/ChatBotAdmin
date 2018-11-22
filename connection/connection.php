<?php 
// this is for the overall connection of the site to the database
// NOTE: some connections are inline in the pages to avoid some errors
$con = new mysqli('127.0.0.1','root','','hitek_db');//sets the credentials for the server, user, password and database
date_default_timezone_set('Asia/Manila');// sets the defualt time for the site
$con->set_charset('euc-kr'); 
mysqli_query($con, 'set names utf8');
?>