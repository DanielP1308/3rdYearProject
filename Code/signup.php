<?php
	$path = "db.inc.php";
	include($path);
    date_default_timezone_set("UTC") ;

    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $username = strtolower($_POST["username"]);
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];		
	$date = date("Y-m-d", strtotime($_POST['dob']));
    $about = $_POST["about"];
    
    $usernameUsed = 0;
    $selectuserSQL = "SELECT Username FROM members";
    $result = $conn->query($selectuserSQL);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if ($username == $row["Username"]) {
                $usernameUsed = 1;
            }
        }
    }
    
    if ($usernameUsed == 1) {
        $data = true;
    }
    else {
        $sql = "Insert into members (Username, FirstName, LastName, Email, Password, About, DateOfBirth)
        VALUES ('$username', '$firstName', '$lastName', '$email', '$hash', '$about', '$date')" ;
	
	   if (!mysqli_query($conn,$sql))
	   {
		  die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
       }
	   mysqli_close($conn) ;
	   $data = false;
    }
    echo json_encode($data);
?>	