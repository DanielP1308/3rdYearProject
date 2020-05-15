<?php
    $path = "db.inc.php";
    include($path);
    
    if (!isset($_SESSION)) {
        session_start();
    }
    $user = $_SESSION['user'];
    $friend = $_POST['user'];
    $data = true;
    
    $activeSQL = "Update friends SET DeleteFlag = '1' WHERE (Username = '$friend' AND FriendUsername = '$user') OR (Username = '$user' AND FriendUsername = '$friend')" ;

    if (!mysqli_query($conn,$activeSQL))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data = false;
    }
    echo json_encode($data);
    mysqli_close($conn) ;
?>