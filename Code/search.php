<?php
    $path = "db.inc.php";
    include($path);
    
    if ($_POST["search"] == "") {
        $data = "";
        $search = "";
    }
    else {
        $search = $_POST["search"];
        $nameSQL = "SELECT Username, FirstName, LastName FROM members WHERE (FirstName LIKE '%".$search."%') OR (LastName LIKE '%".$search."%') OR (Username LIKE '%".$search."%')";
        $result = $conn->query($nameSQL);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $username = $row["Username"];
                $firstName = $row["FirstName"];
                $lastName = $row["LastName"];
                $data[] = array($username, 
                                $firstName,
                                $lastName);
            }
            echo json_encode($data);
        }
    }
?>