<?php
    $path = "navPreset.php";
    include($path);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>Profile</title>
<style>
    .box {
        margin-top: 2.5%;
        margin-left: 2%;
        background-color: lightgray;
        float: left;
        display: inline-block;
    }
    .box2 {
        margin-top: 2.5%;
        margin-left: 2%;
        height: 250px;
        width: 70%;
        background-color: coral;
        display: inline-block;
    }
    .image {
        height: 250px;
        width: 250px;
    }
</style>
</head>
<script>
$(document).ready(function(){
    $.ajax({
        url: 'profileImage.php', data: "", dataType: 'json',  success: function(data)        
        {
            for (var i in data)
            {
                var row = data[i];          

                var imagePath = row[0];
                $("#profilePic").html('<img alt="Images" title="Map Image" src="'+ imagePath +'" class="image"/>');
            }
        }
    });
    $.ajax({
        url: 'userInfo.php', data: "", dataType: 'json',  success: function(data)        
        {
            for (var i in data)
            {
                var row = data[i];          

                var firstName = row[0];
                var lastName = row[1];
                $("#profilePic").append('<h2>' + firstName + ' ' + lastName + '</h2>');
                $("#DOB").html('<th>Date of Birth: 13/08/1997</th>');
                $("#edu").html('<th>Education: IT Carlow</th>');
                $("#interest").html('<th>Interests: Games</th>');
            }
        }
    });
});
</script>
<body>
<div class="box" id="profilePic">

</div>
<div class="box2" id="name">
    <table>
        <tr id="DOB">
        </tr>
        <tr id="edu">
        </tr>
        <tr id="interest">
        </tr>
    </table>
</div>
<form method="post" action="profileImageUpload.php" enctype="multipart/form-data">
        <div class="">
            <input type="file" name="fileToUpload" id="fileToUpload" class="button"/>
        </div>
        <div class="">
            <input type='submit' value='Submit' class="button" name="submit" />
        </div>
</form>
<div class="column" id="main"></div>
</body>
</html>
