<?php 
include '../connection/connection.php';

$id = mysqli_escape_string($con, $_POST['id']);
$word = mysqli_escape_string($con, $_POST['word']);
$response = mysqli_escape_string($con, $_POST['response']);

$sql = "insert into general_question values (null, '".$word."', '".$response."', 1)";
$res = $con->query($sql);
if($res>0){
	$sql = "delete from unrecognize where id = ".$id;
	$res = $con->query($sql);
	if ($res>0) {
		echo 1;
	}else{
		echo $con->error;	
	}
}else{
	echo $con->error;
}
?>