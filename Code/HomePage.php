<?php
    $path = "navPreset.php";
    include($path);
    
	if(!isset($_SESSION['user'])) {
		echo "	<script type='text/javascript'>alert('You are not logged in. Please login!');
						javascript:window.location.href = 'loginScreen.php' ;
				</script>";
	}
?>      
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    width: 25%;
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
}
.buttonUp {
    width: 25%;
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left:25%;
}
.container {
    width: 50%;
    margin-left: 25%;
}
.hide {
    display: block;
}
</style>
</head>
<script>
$(document).ready(function(){
    $.ajax({
        url: 'imageLoad.php', data: "", type: "POST", dataType: 'json',  success: function(rows)        
        {
             
            for (var i = 0; i < 10; i++)
            {
                var imagePath = rows[i].path;          

                var id = row[0];
                $("#main").html('<p>' + imagePath + '</p>');
            } 
        } 
    });
});    
/*$(document).ready(function(){
    for (var i = 0; i < 10; i++) {
        $("#main").prepend('<img alt="Images" title="Map Image" src="Photos\/osz___size__.jpg" class="center" />');
    }
});*/
</script>
<body>
<!-- Photo Grid -->
<form method="post" action="upload.php" enctype="multipart/form-data">
    <div style="text-align: center">
        <textarea style="resize: none" class="center" cols="50" rows="8" name="post" id="post"></textarea>
        <input type="file" name="fileToUpload" id="fileToUpload" class="button">
        <input type='submit' value='Submit' class="button" name="submit" /> 
    </div>
</form>
<div class="column" id="main"></div>
</body>
</html>