<?php
    $path = "db.inc.php";
    include($path);

    if (!isset($_SESSION)) {
        session_start();
    }

    $friend = $_POST["username"];
    $user = $_SESSION["user"];

    $sql = "Insert into notifications (Username, FriendUsername, Active)
        VALUES ('$user', '$friend', '1')" ;
	
    if (!mysqli_query($conn,$sql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data = false;
    }
    else {
        $data = true;
    } 
    mysqli_close($conn) ;

    echo json_encode($data);
?>  