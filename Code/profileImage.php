<?php
    $path = "db.inc.php";
    include($path);

    $username = $_POST["username"];
    
    $idSQL = "SELECT MembersID FROM members WHERE Username = '$username'";
    $result = $conn->query($idSQL);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["MembersID"];
    }
    
    $nameSQL = "SELECT Path FROM profileimage WHERE Username = '$username' AND Selected = '1'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $imagePath = $row["Path"];
            $data = $imagePath;
        }
        echo json_encode($data);
    }
?>  