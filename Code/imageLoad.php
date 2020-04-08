<?php
    $path = "db.inc.php";
    include($path);
    
    session_start();

    $id = $_SESSION["ID"];

    $nameSQL = "SELECT ImagePath FROM images WHERE MemberID = '$id'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $path = $row["ImagePath"];
            $data[] = array("ImagePath" => $path);
        }
        echo json_encode($data);
    }
?>  