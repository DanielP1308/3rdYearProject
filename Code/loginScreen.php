<?php
	$path = "db.inc.php";
    include($path);
    if (!isset($_SESSION)) {
        session_start();
    }
        
    $passwordSQL = "SELECT password FROM Members WHERE Email = '$_POST[email]'";
    $result = $conn->query($passwordSQL);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $hash = $row["password"];
        }
    }
    
if (password_verify($_POST["pwd"], $hash)) {
    $nameSQL = "SELECT FirstName FROM Members WHERE Email = '$_POST[email]'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION['user'] = $row["FirstName"];
        }   
    }
    $idSQL = "SELECT MembersID FROM Members WHERE Email = '$_POST[email]'";
    $result = $conn->query($idSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION['ID'] = $row['MembersID'];
        }   
    }
    //Succesful Login
    echo "	<script type='text/javascript'>alert('Login Successful.');
                javascript:window.location.href = 'HomePage.html.php' ;
            </script>";   
}
else {
    echo "	<script type='text/javascript'>alert('Email/Password are incorrect!');
                javascript:window.location.href = 'loginScreen.html.php' ;
            </script>"; 
}
mysqli_close($conn) ;
?>
	