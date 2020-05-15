<?php
    $path = "db.inc.php";
    include($path);
    
    if (!isset($_SESSION)) {
        session_start();
    }
    $user = $_SESSION['user'];
    $friend = $_POST['user'];
    $data = true;
        
    $nameSQL = "SELECT FirstName, LastName FROM members WHERE Username = '$friend'"; 
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $firstName = $row["FirstName"];
            $lastName = $row["LastName"];
        }
    }
    
    $fullName = $firstName . " " . $lastName;
    
    $sql = "Insert into friends (Username, FriendUsername, FriendFullName, DeleteFlag)
    VALUES ('$user', '$friend', '$fullName', '0')" ;

    if (!mysqli_query($conn,$sql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data = false;
    }

    $activeSQL = "Update notifications SET Active = '0' WHERE Username = '$friend' AND FriendUsername = '$user'" ;

    if (!mysqli_query($conn,$activeSQL))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data = false;
    }
    echo json_encode($data);
    mysqli_close($conn) ;
?>