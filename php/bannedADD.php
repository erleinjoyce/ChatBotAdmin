<?php 
include '../connection/connection.php';

$word = mysqli_escape_string($con, $_POST['word']);

$sql = "insert into general_question values (null, '".$word."', '', 0)";
$res = $con->query($sql);
if($res>0){
	echo 1;
}else{
	echo $con->error;
}
?>