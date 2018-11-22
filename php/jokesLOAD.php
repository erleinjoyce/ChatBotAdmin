<?php 
include '../connection/connection.php';

$id = mysqli_escape_string($con, $_POST['id']);
$returnedArray = array();

$sql = "select content from creative where id =".$id;
$res = $con->query($sql);
if($res->num_rows>0){
	while($a = $res->fetch_assoc()){
		$returnedArray = array(
			'word' => $a['content']
		);
	}
}

echo json_encode($returnedArray);
?>