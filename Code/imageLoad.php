<?php
    $path = "db.inc.php";
    include($path);
    
    session_start();

    $id = $_SESSION["ID"];

    $nameSQL = "SELECT ImagePath, Post FROM images WHERE MemberID = '$id'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $imagePath = $row["ImagePath"];
            $post = $row["Post"];
            $data[] = array($imagePath, $post);
        }
        echo json_encode($data);
    }
?>  