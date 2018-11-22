<?php
include '../connection/connection.php';

$sql = "select count(*) as cnt from unrecognize";
$res = $con->query($sql);
if ($res->num_rows>0) {
	while ($a = $res->fetch_assoc()) {
		echo $a['cnt'];
	}
}
?>