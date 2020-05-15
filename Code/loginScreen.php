<?php
	$path = "db.inc.php";
    include($path);
    if (!isset($_SESSION)) {
        session_start();
    }
    $success = false;
    $passwordSQL = "SELECT password FROM Members WHERE Username = '$_POST[username]'";
    $result = $conn->query($passwordSQL);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $hash = $row["password"];
        }
    }
    
if (password_verify($_POST["password"], $hash)) {
    $_SESSION['user'] = $_POST['username'];
    
    
    $idSQL = "SELECT MembersID FROM Members WHERE Username = '$_POST[username]'";
    $result = $conn->query($idSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION['ID'] = $row['MembersID'];
        }   
    }
    //Succesful Login
    $success = true;
}
else {
    $success = false; 
}
mysqli_close($conn) ;
echo json_encode($success);
?>
	