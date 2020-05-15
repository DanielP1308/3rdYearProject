<?php
    $path = "db.inc.php";
    include($path);
    
    session_start();

    $id = $_POST["username"];

    $nameSQL = "SELECT ImagePath, Username, Date, Post FROM images  WHERE Username = '$id'";
    $result = $conn->query($nameSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $imagePath = $row["ImagePath"];
            $username = $row["Username"];
            $date = $row["Date"];
            $post = $row["Post"];
            $data[] = array("Path" => $imagePath, "Username" => $username, "Post" => $post, "Date" => $date);
        }
    }

    function cmp($a, $b)
    {
        return strcmp($a["Date"], $b["Date"]) * -1;
    }

    usort($data, "cmp");
    echo json_encode($data);
?> 