<?php
    $path = "db.inc.php";
    include($path);
    
    if (!isset($_SESSION)) {
        session_start();
    }

        $nameSQL = "SELECT Username, FriendUsername FROM friends WHERE (Username = '$_SESSION[user]' OR FriendUsername = '$_SESSION[user]') AND DeleteFlag = '0'";
        $result = $conn->query($nameSQL);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $username = $row["Username"];
                $friendUsername = $row["FriendUsername"];
                $data[] = array($username, $friendUsername);
            }
            echo json_encode($data);
        }
?>