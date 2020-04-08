<?php
	$path = "db.inc.php";
    include($path);
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST['email']) && isset($_POST['pwd'])) {
        
        $sql = "SELECT * FROM Members WHERE Email = '$_POST[email]' AND
		password = '$_POST[pwd]'" ;
        
        
        if (!mysqli_query($conn, $sql)) {
			echo "Error in query ".mysqli_error($con) ;
		}
		else {
			if (mysqli_affected_rows($conn) == 0) {
				echo "	<script type='text/javascript'>alert('ID and/or Password are incorrect!');
					       javascript:window.location.href = 'loginScreen.html.php' ;
				        </script>";
            }
			else {
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
        }
    }
mysqli_close($conn) ;
?>
	