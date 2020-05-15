<?php
    $path = "db.inc.php";
    include($path);
    
    if (!isset($_SESSION)) {
        session_start();
    }
    $user = $_SESSION['user'];
    $friend = $_POST['friend'];
    $message = $_POST['message'];
    $date = date("Y-m-d H:i:s");
    $data = true;
    
    $sql = "Insert into messages (Username, FriendUsername, Message, DateTime)
    VALUES ('$user', '$friend', '$message', '$date')" ;

    if (!mysqli_query($conn,$sql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data = false;
    }
    echo json_encode($data);
    mysqli_close($conn) ;
?>