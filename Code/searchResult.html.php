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
    width: 25%;
    margin-bottom: 1%;
}
.box {
    position: absolute;
    left: 25%;
    right: 25%;
    padding-bottom: 5px;
    background-color: #E98074;
    border: 0px solid black;
    height: 50px;
}
.button {
    width: 10%;
    background-color: black;
    color: lavender;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 45%;
}
.add {
    float: right;
    background-color: #8E8D8A;
    height: 50px;
}
    body {
        background-color: #EAE7DC;
    }
    a {
        color: black;
        font-size: 16px;
    }
</style>
</head>
<script>
$(document).ready(function() {
    $('#button').click(function() {
        $('#main').html('');
        var search = $('#search').val();
        $.ajax({
            type: 'POST', url: 'search.php', data: {search: search}, dataType: 'json',  success: function(data)        
            {
                for (var i in data)
                {
                    var pos = 0;
                    var row = data[i];
                    var username = row[0];
                    var firstName = row[1];
                    var lastName = row[2];
                    var fullName = firstName + " " + lastName;

                    if (data.length > 1) {
                        $("#main").append('<div class="box"><a href="profile.html.php?user=' + username + '">' + fullName + '( ' + username + ' )' + '</a><button id="add" data-data="'+ username +'" class="add">Add Friend</button></div>' );
                        $("#main").append('<br><br><br>' );
                        $("#search").val("");
                    }
                    else {
                        $("#main").html('<div class="box"><a style="color: black;" "href="profile.html.php?user=' + username + '">' + fullName + '</a><button id="add" data-data="'+ username +'" class="add">Add Friend</button></div>' );
                        $("#search").val("");
                    }
                }
                $('body').on('click', '#add', function () {
                    var username = $(this).data('data');
                    $.ajax({
                        type: 'post', url: 'getRequest.php', data: {username: username}, dataType: 'json',  success: function(data)        
                        {
                            if (data == false) {
                                alert("Problem sending request");
                            }
                            else {
                                alert("Request Send");
                            }
                        } 
                    });
                });
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