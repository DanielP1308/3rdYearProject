<?php
$path = "db.inc.php";
include($path);
session_start();
$target_dir = "Photos/";
$target_name = basename($_FILES["fileToUpload"]["name"]);
$date = date("Y-m-d_H_i_s");
$target_name_new = $_SESSION['user']."_".$date.".jpg";
$target_file = $target_dir . $target_name_new;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($target_name !== "") {
// Check if image file is a actual image or fake image
    /*if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }*/
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $user = $_SESSION['user'];
            $id = $_SESSION['ID'];
            $date = date("Y-m-d H:i:s"); 
            $sql = "Insert into images (ImagePath, MemberID, Username, Date, Post)
            VALUES ('$target_file', '$id', '$user', '$date', '$_POST[post]')" ;
	
	       if (!mysqli_query($conn,$sql))
	       {
		      die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
	       }
	       mysqli_close($conn) ;
	       echo "<script>window.location.replace('HomePage.html.php');</script>";
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
else {
    $user = $_SESSION['user'];
    $id = $_SESSION['ID'];
    $date = date("Y-m-d H:i:s");
    $target_file = "";
    $sql = "Insert into images (ImagePath, MemberID, Username, Date, Post)
    VALUES ('$target_file', '$id', '$user', '$date', '$_POST[post]')" ;
	if (!mysqli_query($conn,$sql))
	{
	   die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;            
    }
	mysqli_close($conn) ;
	echo "<script>window.location.replace('HomePage.html.php');</script>";
}
?>