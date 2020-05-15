<?php
    $path = "db.inc.php";
    include($path);
    
    session_start();

    $user = $_SESSION["user"];

    $friendSQL = "SELECT Username, FriendUsername FROM friends WHERE (Username = '$user' OR FriendUsername = '$user') AND DeleteFlag = '0'";
    $result = $conn->query($friendSQL);
    $index = 0;
    $arrayOfFriends[] = array();
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['Username'];
            $friend = $row["FriendUsername"];
            
            if ($username == $user) {
                $arrayOfFriends[$index] = $friend;
            }
            else {
                $arrayOfFriends[$index] = $username;
            }
            $index++;
        }
        
        //echo json_encode($arrayOfFriends);
    }
    $arrayOfFriends[$index] = $user;
    for ($i = 0; $i < count($arrayOfFriends); $i++) {
        $u = $arrayOfFriends[$i];
        $nameSQL = "SELECT ImagePath, Username, Date, Post FROM images  WHERE Username = '$u'";
        $result = $conn->query($nameSQL);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $imagePath = $row["ImagePath"];
                $username = $row["Username"];
                $date = $row["Date"];
                $post = $row["Post"];
                $data[] = array("Path" => $imagePath, "Username" => $username, "Post" => $post, "Date" => $date);
            }
            //echo json_encode($data);
        }
    }
    function cmp($a, $b)
    {
        return strcmp($a["Date"], $b["Date"]) * -1;
    }

    usort($data, "cmp");
    echo json_encode($data);
?>