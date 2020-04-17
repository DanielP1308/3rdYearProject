<?php
    $path = "db.inc.php";
    include($path);
    
    session_start();

    $id = $_SESSION["ID"];

    $nameSQL = "SELECT Path FROM profileimage WHERE MembersID = '$id' AND Selected = '1'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $imagePath = $row["Path"];
            $data[] = array($imagePath);
        }
        echo json_encode($data);
    }
?>  