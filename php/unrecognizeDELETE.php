<?php 
include '../connection/connection.php';

$id = mysqli_escape_string($con, $_POST['id']);

$sql = "delete from unrecognize where id = ".$id;
$res = $con->query($sql);
if($res>0){
	echo 1;
}else{
	echo $con->error;
}
?>