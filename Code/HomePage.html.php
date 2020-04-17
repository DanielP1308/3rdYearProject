<?php
    $path = "navPreset.php";
    include($path);
    
	/*if(!isset($_SESSION['user'])) {
		echo "	<script type='text/javascript'>alert('You are not logged in. Please login!');
						javascript:window.location.href = 'loginScreen.php' ;
				</script>";
	}*/
?>      
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.column {
  -ms-flex: 50%;
  flex: 50%;
  padding: 0 4px;
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
</style>
</head>
<script>
$(document).ready(function(){
    $.ajax({
        url: 'imageLoad.php', data: "", dataType: 'json',  success: function(data)        
        {
            var count = 0;
            for (var i in data)
            {
                var row = data[i];          

                var imagePath = row[0];
                var post = row[1];
                if (imagePath != "" && post != "") {
                    $("#main").append('<p class="center">'+ post +'</p>');
                    $("#main").append('<img alt="Images" title="Map Image" src="'+ imagePath +'"class="center" />');    
                }
                else if (imagePath != "" && post == "") {
                    $("#main").append('<img alt="Images" title="Map Image" src="'+ imagePath +'"class="center" />'); 
                }
                else if (imagePath == "" && post != "") {
                    $("#main").append('<p class="center">'+ post +'</p>');
                }
            }
        } 
    });
});
</script>
<body>
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
<div class="column" id="main"></div>
</body>
</html>