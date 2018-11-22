<?php
// statrt web session
session_start();
// include databse connection
include '../connection/connection.php';
// get user input
$username = mysqli_escape_string($con, $_POST['username']);
$password = mysqli_escape_string($con, $_POST['password']);

// check if user exists
$sql = "SELECT * FROM admin_tbl WHERE username = '".$username."' and password = '".$password."'";
$res = $con->query($sql);
if ($res->num_rows>0) {
	while ($details = $res->fetch_assoc()) {
		// found
		$_SESSION['hitek_admin'] = $details['id'];
		echo 1;
	}
}else{
	// not found
	echo 0;
}
?>