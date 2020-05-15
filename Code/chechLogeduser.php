<?php
	$path = "db.inc.php";
	include($path);
    if (!isset($_SESSION)) {
        session_start();
    }
    $user = $_SESSION['user'];
    $username = $_POST['username'];
    
    if ($user == $username) {
        $data = true;
    }
    else {
        $data = false;
    }
    
    echo json_encode($data);
?>