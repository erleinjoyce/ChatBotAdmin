<?php 
include '../connection/connection.php';

$id = mysqli_escape_string($con, $_POST['id']);
$returnedArray = array();

$sql = "select question from unrecognize where id =".$id;
$res = $con->query($sql);
if($res->num_rows>0){
	while($a = $res->fetch_assoc()){
		$returnedArray = array(
			'word' => $a['question']
		);
	}
}

echo json_encode($returnedArray);
?>