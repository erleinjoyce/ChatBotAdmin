<?php 
include '../connection/connection.php';

$word = mysqli_escape_string($con, $_POST['word']);
$id = mysqli_escape_string($con, $_POST['id']);

$sql = "update general_question set question = '".$word."' where id = ".$id;
$res = $con->query($sql);
if($res>0){
	echo 1;
}else{
	echo $con->error;
}
?>