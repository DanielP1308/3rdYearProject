<?php
require_once('db.inc.php');

$sqlQuery = "SELECT Date FROM images";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
    $username = $row;
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>