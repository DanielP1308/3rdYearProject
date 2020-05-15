<?php
	$path = "db.inc.php";
	include($path);
    date_default_timezone_set("UTC") ;
    
    if (!isset($_SESSION)) {
        session_start();
    }
    $user = $_SESSION['user'];
    $username = "";
    //members table
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $about = $_POST["about"];
	$date = date("Y-m-d", strtotime($_POST['dob']));
    //info table
    $interests = $_POST["interests"];
    $prim = $_POST["prim"];
    $college = $_POST["college"];
    $work = $_POST["work"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $relationship = $_POST["reletionship"];	

    $checkSQL = "Select Username FROM info WHERE Username = '$user'";
    $result = $conn->query($checkSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $username = $row["Username"];
        }
    }
if ($username == "") {
    $newsql = "INSERT INTO info (USername, Interests, School, College, Work, PhoneNumber, Country, Reletionship) VALUES ('$user', '$interests', '$prim', '$college', '$work', '$phone', '$country', '$relationship')" ;
    if (!mysqli_query($conn,$newsql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data2 = false;
    }
    $sql = "UPDATE members SET FirstName = '$firstName', LastName = '$lastName', Email = '$email', About = '$about', DateOfBirth = '$date' WHERE Username = '$user'" ;
    if (!mysqli_query($conn,$sql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data1 = false;
    }
}
else {
    $sql = "UPDATE members SET FirstName = '$firstName', LastName = '$lastName', Email = '$email', About = '$about', DateOfBirth = '$date' WHERE Username = '$user'" ;
    if (!mysqli_query($conn,$sql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data1 = false;
    }

    $newsql = "UPDATE info SET Interests = '$interests', School = '$prim', College = '$college', Work = '$work', PhoneNumber = '$phone', Country = '$country', Reletionship = '$relationship' WHERE Username = '$user'" ;

    if (!mysqli_query($conn,$newsql))
    {
        die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
        $data2 = false;
    }
}
    mysqli_close($conn) ;
    echo "<script>window.location = 'profile.html.php?user=".$user."'</script>";
?>