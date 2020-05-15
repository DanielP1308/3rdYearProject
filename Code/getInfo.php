<?php
    $path = "db.inc.php";
    include($path);
    
    if (!isset($_SESSION)) {
        session_start();
    }

    $username = $_SESSION['user'];

    $nameSQL = "SELECT FirstName, LastName, Email, About, DateOfBirth FROM members WHERE Username = '$username'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $FirstName = $row["FirstName"];
            $LastName = $row["LastName"];
            $email = $row["Email"];
            $about = $row["About"];
            $DOB = $row['DateOfBirth'];            
            //$data[] = array($FirstName, $LastName);
        }
        //echo json_encode($data);
    }
    $infoSql = "SELECT Interests, School, College, Work, PhoneNumber, Country, Reletionship FROM info WHERE Username = '$username'";
    $result = $conn->query($infoSql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $int = $row["Interests"];
            $school = $row["School"];
            $college = $row["College"];
            $work = $row["Work"];
            $phone = $row["PhoneNumber"];
            $country = $row["Country"];
            $reletionship = $row["Reletionship"];
        }
    }
        $data[] = array($FirstName, $LastName, $email, $about, $DOB, $int, $school, $college, $work, $phone, $country, $reletionship);
        echo json_encode($data);
?> 