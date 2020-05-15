<?php
    $path = "db.inc.php";
    include($path);
    
    if (!isset($_SESSION)) {
        session_start();
    }

    $username = $_SESSION['user'];
    $friend  = $_POST['user'];

    $SQL = "SELECT Username, FriendUsername, Message, DateTime FROM messages WHERE (Username = '$username' AND FriendUsername = '$friend') OR (Username = '$friend' AND FriendUsername = '$username')";
    $result = $conn->query($SQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $user = $row["Username"];
            $friendUser = $row["FriendUsername"];
            $message = $row["Message"];
            $dateTime = $row["DateTime"];            
            $data[] = array($user, $friendUser, $message, $dateTime);
        }
        echo json_encode($data);
    }

?> 