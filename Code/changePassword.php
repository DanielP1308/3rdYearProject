<?php
	$path = "db.inc.php";
    include($path);
    if (!isset($_SESSION)) {
        session_start();
    }

    $oldPassword = $_POST["oldPass"];
    $newPass = $_POST["newPassword"];
    $newHash = password_hash($newPass, PASSWORD_DEFAULT);
    
    $passwordSQL = "SELECT password FROM members WHERE Username = '$_SESSION[user]'";
    $result = $conn->query($passwordSQL);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $hash = $row["password"];
        }
    }

if (password_verify($oldPassword, $hash)) {
    
    $sql = "UPDATE members SET Password = '$newHash' WHERE Username = '$_SESSION[user]'" ;
    if (!mysqli_query($conn,$sql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $success = false;
    }
    else {
        $success = true;
    }
}
else {
    $success = false; 
}
mysqli_close($conn) ;
echo json_encode($success);
?>