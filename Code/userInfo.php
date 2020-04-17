<?php
    $path = "db.inc.php";
    include($path);
    
    session_start();

    $id = $_SESSION["ID"];

    $nameSQL = "SELECT FirstName, LastName FROM members WHERE MembersID = '$id'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $FirstName = $row["FirstName"];
            $LastName = $row["LastName"];
            $data[] = array($FirstName, $LastName);
        }
        echo json_encode($data);
    }
?>  