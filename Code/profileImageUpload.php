<?php
$path = "db.inc.php";
include($path);
session_start();
$target_dir = "Photos/Profile/";
$target_name = basename($_FILES["fileToUpload"]["name"]);
$setdate = date("Y-m-d_H_i_s");
$target_name = $_SESSION['user']."_".$setdate.".jpg";
$target_file = $target_dir . $target_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($target_name !== "") {
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo " <script type='text/javascript'>alert('Only .jpg, .png, .jpeg and .gif extensions allowed');
	               </script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        	echo " <script type='text/javascript'>alert('Sorry, there was a problem uploading your file. Please try again later.');
	               </script>";
        // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $newSQL = "UPDATE profileimage SET Selected = '0' WHERE Username = '$_SESSION[user]'";
            if (!mysqli_query($conn, $newSQL)) {
                die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
            }
            $id = $_SESSION['ID'];
            $username = $_SESSION['user'];
            $date = date("Y-m-d"); 
            $sql = "Insert into profileimage (MembersID, Username, Path, Date, Selected)
            VALUES ('$id', '$username', '$target_file', '$date', '1')" ;
	
	       if (!mysqli_query($conn,$sql))
	       {
		      die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
	       }
	       mysqli_close($conn) ;
	       echo "<script>window.location.replace('profile.html.php');</script>";
        } 
        else {
            echo " <script type='text/javascript'>alert('Sorry, there was a problem uploading your file. Please try again later.');
	               </script>";
        }
    }
}
?>