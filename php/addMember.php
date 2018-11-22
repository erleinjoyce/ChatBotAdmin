<?php 
// include database connection
include '../connection/connection.php';

// escape for sql injection
$addFirstname = mysqli_escape_string($con, $_POST['addFirstname']);
$addMiddlename = mysqli_escape_string($con, $_POST['addMiddlename']);
$addLastname = mysqli_escape_string($con, $_POST['addLastname']);
$addBirthdate = mysqli_escape_string($con, $_POST['addBirthdate']);
$addAddress = mysqli_escape_string($con, $_POST['addAddress']);
$addEmail = mysqli_escape_string($con, $_POST['addEmail']);
$addContact = mysqli_escape_string($con, $_POST['addContact']);
$addUsername = mysqli_escape_string($con, $_POST['addUsername']);
$addPassword = mysqli_escape_string($con, $_POST['addPassword']);
$addBadge = mysqli_escape_string($con, $_POST['addBadge']);
$addStatus = mysqli_escape_string($con, $_POST['addStatus']);

// insert data of member
$sql = "insert into member_tbl values (null, '".$addFirstname."', '".$addMiddlename."', '".$addLastname."', '".$addBirthdate."', '".$addAddress."', '".$addEmail."', '".$addContact."', '".$addUsername."', '".$addPassword."', curdate(), curtime(), ".$addBadge.", ".$addStatus.")";
$result = $con->query($sql);
if ($result > 0) {
	// ok
	echo "<body><div id='divResultX'>1</div></body>";
}else{
	// with error
	echo "<body><div id='divResultX'>0</div></body>";
}
?>