<?php
	$path = "db.inc.php";
	include($path);
    if (!isset($_SESSION)) {
        session_start();
    }
    $user = $_SESSION['user'];
    $friend = $_POST['username'];
    $u = "";
    $f = "";
    //$data = false;
    
    if ($user != $friend) {
        $nameSQL = "SELECT Username, FriendUsername FROM friends WHERE (Username = '$user' OR FriendUsername = '$user') AND (Username = '$friend' OR FriendUsername = '$friend') AND DeleteFlag = '0'"; 
        $result = $conn->query($nameSQL);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $f = $row["FriendUsername"];
                $u = $row["Username"];
            } 
        }          
        if($friend != $f && $friend != $u) {
            $data = false;
        }
        else {
            $data = true;
        }
    }
    else if ($user == $friend) {
        $data = "me";
    }
    echo json_encode($data);
?>