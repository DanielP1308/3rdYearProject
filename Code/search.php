<?php
    $path = "db.inc.php";
    include($path);
    
    if ($_POST["search"] == "") {
        $data = "";
        $search = "";
    }
    else {
        $search = $_POST["search"];
        $nameSQL = "SELECT FirstName, LastName FROM members WHERE (FirstName LIKE '%".$search."%') OR (LastName LIKE '%".$search."%')";
        $result = $conn->query($nameSQL);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $firstName = $row["FirstName"];
                $lastName = $row["LastName"];
                $data[] = array($firstName,
                                $lastName);
            }
            echo json_encode($data);
        }
    }
?>