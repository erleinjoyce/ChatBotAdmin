<?php 
// include database connection
include '../connection/connection.php';

// escape for sql injection
$member_id = mysqli_escape_string($con, $_POST['member_id']);
$editFirstname = mysqli_escape_string($con, $_POST['editFirstname']);
$editMiddlename = mysqli_escape_string($con, $_POST['editMiddlename']);
$editLastname = mysqli_escape_string($con, $_POST['editLastname']);
$editBirthdate = mysqli_escape_string($con, $_POST['editBirthdate']);
$editAddress = mysqli_escape_string($con, $_POST['editAddress']);
$editEmail = mysqli_escape_string($con, $_POST['editEmail']);
$editContact = mysqli_escape_string($con, $_POST['editContact']);
$editUsername = mysqli_escape_string($con, $_POST['editUsername']);
$editPassword = mysqli_escape_string($con, $_POST['editPassword']);
$editBadge = mysqli_escape_string($con, $_POST['editBadge']);
$editStatus = mysqli_escape_string($con, $_POST['editStatus']);

// update member information
$sql = "update member_tbl set firstname = '".$editFirstname."', middlename = '".$editMiddlename."', lastname = '".$editLastname."', birthdate = '".$editBirthdate."', address = '".$editAddress."', email = '".$editEmail."', contact_number = '".$editContact."', username = '".$editUsername."', password = '".$editPassword."', badge = ".$editBadge.", status = ".$editStatus." where member_id =".$member_id;
$result = $con->query($sql);
if ($result > 0) {
	// ok
	echo "<body><div id='divResultX'>1</div></body>";
}else{
	// with error
	echo "<body><div id='divResultX'>0</div></body>";
}
?>