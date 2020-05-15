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
<title>Messages</title>
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
    background-color: #E98074;
    border: 0px solid black;
    height: 100px;
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
.h2 {
    text-align: center;
    margin-bottom: 25px;
    margin-top: 10px;
}
.message {
    resize: none;
    align-self: center;
    columns: 200;
}
.sel {
    width: 30%;
    margin-left: 35%;
    height: 30px;
    align-content: center;
}
.a {
    font-size: 16;
}
.date {
    float: right;
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
function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}
$(document).ready(function() {
    var u = GetURLParameter("user");
    $.ajax({
        url: 'friends.php', data: "", dataType: 'json', success: function(data)
        {            
            for (var i in data)
            {
                var row = data[i];
                var username = row[0];
                var friendUser = row[1];
                
                if (username == u) {
                    $('#sel').append('<option id="opt">' + friendUser + '</option>');
                }
                else {
                    $('#sel').append('<option id="opt">' + username + '</option>');
                }
            } 
        }
    });
    $("#sel").change(function () {
        var user = $('#sel').val();
        $('#messages').html('');
        $.ajax({
            type: 'POST', url: 'showMessages.php', data: {user: user}, dataType: 'json', success: function(data)
            {
                for (var i in data)
                {
                    var row = data[i];
                    var username = row[0];
                    var friendUser = row[1];
                    var message = row[2];
                    var dateTime = row[3];
                
                    $('#messages').append('<div class="box"><a class="a" href="profile.html.php?user='+username+'">'  + username + '</a><b class="date">' + dateTime + '</b><br><p>'+ message + '</p>');
                    $('#messages').append('</div>');
                    $('#messages').append('<br><br><br><br><br><br><br>');
                } 
            }    
        });
    });
    $('#send').click(function(){
        var friend = $('#sel').val();
        var message = $('#message').val();
        
        $.ajax({
           type: 'POST', url: 'sendMessage.php', data: {friend: friend, message: message}, dataType: 'json', success: function(data)
            {
                if (data != true) {
                    alert("Could not send the message");
                }
                else {
                    alert("Message Sent");
                }
            }
        });
    });
});
</script>
<body>
<div class="column" id="main">
    <div class="form-group">
        <select class="sel" id="sel">
            <option>Select a friend</option>
        </select>
    </div>
    <div id="messages">
    </div>
    
    <br>
    <br>
    <br>
    <div style="text-align: center">
        <textarea class="message" cols="50" rows="3" name="message" id="message"></textarea>
    </div>
    <button class="button" id="send">Send Message</button>
</div>
</body>
</html>