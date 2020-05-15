<?php
    $path = "navPreset.php";
    include($path);
    
	if(!isset($_SESSION['user'])) {
		echo "	<script type='text/javascript'>alert('You are not logged in. Please login!');
						javascript:window.location.href = 'loginScreen.html.php' ;
				</script>";
	}
?>      
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.column {
  -ms-flex: 50%;
  flex: 50%;
  padding: 0 4px;
}
.boxPost {
    background-color: lightgray;
    margin-left: auto;
    margin-right: auto;
    width: 900px;
    height: 900px;
    margin-bottom: 1%;
}
.centerPic {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 700px;
    margin-bottom: 1%;
}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    margin-bottom: 1%;
}
.box {
    position: absolute;
    left: auto;
    right: 25%;
    padding-bottom: 5px;
}
.button {
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.positionA {
    margin-left: 25%;
    display: inline-block;
}
.positionB {
    margin-left: 2%;
    display: inline-block;
}
.hide {
    display: block;
}
.day {
    font-size: 16px;
    font-style: italic;
    font-weight: bold;
}
    a {
        color: black;
        font-size: 16px;
    }
</style>
</head>
<script>
$(document).ready(function(){
    $.ajax({
        url: 'mainImageLoad.php', data: "", dataType: 'json',  success: function(data)        
        {
            for (var i in data)
            {
                var row = data[i];

                var imagePath = row.Path;
                var username = row.Username;
                var post = row.Post;
                var date = row.Date;
                if (imagePath != "" && post != "") {
                    $("#main").append('<a class="centerPic" href="profile.html.php?user=' + username + '" style="font-size:16px">'+ username +'</a>');
                    $("#main").append('<p class="centerPic">'+ post +'</p>');
                    $("#main").append('<img alt="Images" title="Map Image" src="'+ imagePath +'"class="centerPic" />');   
                    $("#main").append('<p class="centerPic">Posted: ' + date + '</p>');    
                }
                else if (imagePath != "" && post == "") {
                    $("#main").append('<a class="centerPic" href="profile.html.php?user=' + username + '" style="font-size:16px">'+ username +'</a>');
                    $("#main").append('<img alt="Images" title="Map Image" src="'+ imagePath +'"class="centerPic" />');
                    $("#main").append('<p class="centerPic">Posted: ' + date + '</p>'); 
                }
                else if (imagePath == "" && post != "") {
                    $("#main").append('<a class="centerPic" href="profile.html.php?user=' + username + '" style="font-size:16px">'+ username +'</a>');
                    $("#main").append('<p class="centerPic">'+ post +'</p>');
                    $("#main").append('<p class="centerPic">Posted: ' + date + '</p>'); 
                }
            }
        } 
    });
    day();
});
function day() {
    var d = new Date();
    var n = d.getDay()

    if (n == 0) {
        $("#day").html('Today is: Sunday');
    }
    else if (n == 1) {
         $("#day").html('Today is: Monday');
    }
    else if (n == 2) {
         $("#day").html('Today is: Tuesday');
    }
    else if (n == 3) {
         $("#day").html('Today is: Wednesday');
    }
    else if (n == 4) {
         $("#day").html('Today is: Thursday');
    }
    else if (n == 5) {
         $("#day").html('Today is: Friday');
    }
    else if (n == 6) {
         $("#day").html('Today is: Saturday');
    }
}
</script>
<body style='background-color: #EAE7DC;'>
    <div id="day" class="day">
    </div>
<form method="post" action="upload.php" enctype="multipart/form-data">
    <div style="text-align: center">
        <textarea style="resize: none" class="center" cols="50" rows="4" name="post" id="post"></textarea>
    </div>
        <div class="positionA">
            <input type="file" name="fileToUpload" id="fileToUpload" class="button"/>
        </div>
        <div class="positionB">
            <input type='submit' value='Submit' class="button" name="submit" />
        </div>
</form>
<div class="" id="main"></div>
</body>
</html>