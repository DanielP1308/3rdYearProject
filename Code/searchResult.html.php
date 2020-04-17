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
    left: 25%;
    right: 25%;
    padding-bottom: 5px;
    border: 2px solid black;
    height: 50px;
}
.button {
    width: 10%;
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 45%;
}
</style>
</head>
<script>
$(document).ready(function() {
    $('#button').click(function() {
        var search = $('#search').val();
        $.ajax({
            type: 'POST', url: 'search.php', data: {search: search}, dataType: 'json',  success: function(data)        
            {
                for (var i in data)
                {
                    var row = data[i];          
                    var firstName = row[0];
                    var lastName = row[1];
                    var fullName = firstName + " " + lastName;
                    if (data.length > 1) {
                        $("#main").append('<div class="box"><a>' + fullName + '</a><button id="add">Add Friend</button></div>' );
                        $("#main").append('<br><br>' );
                    }
                    else {
                        $("#main").html('<div class="box"><a>' + fullName + '</a><button>Add Friend</button></div>' );
                    }
                    
                }
            } 
        });
    });
});
</script>
<body>
    <input type="text" class="center" id="search" name="search">
    <input type="submit" value="Search" id="button" class="button">
<div class="column" id="main">
</div>
</body>
</html>