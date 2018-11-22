<?php
// include database connection
include '../connection/connection.php';
// escape for sql injection
$member_id = mysqli_escape_string($con, $_POST['member_id']);

// retieve member info
$sql = "SELECT * FROM member_tbl WHERE member_id = ".$member_id;
$res = $con->query($sql);
if ($res->num_rows>0) {
	while ($details = $res->fetch_assoc()) {
		echo $details['firstname']."*****".$details['middlename']."*****".$details['lastname']."*****".$details['birthdate']."*****".$details['address']."*****".$details['email']."*****".$details['contact_number']."*****".$details['username']."*****".$details['password']."*****".$details['badge']."*****".$details['status'];
	}
}
?>