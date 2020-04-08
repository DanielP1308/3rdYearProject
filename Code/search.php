<?php
    $path = "db.inc.php";
    include($path);

    $search = $_POST["search"];

    $nameSQL = "SELECT FirstName, LastName FROM members WHERE FirstName = '$search' OR LastName = '$search'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $firstName = $row["FirstName"];
            $lastName = $row["LastName"];
            $data[] = array("FirstName" => $firstName,
                           "LastName" => $lastName);
        }
        echo json_encode($data);
    }
?>