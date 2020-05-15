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
    background-color: #E98074;
    border: 0px solid black;
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
.h2 {
    text-align: center;
    margin-bottom: 25px;
    margin-top: 10px;
}
.add {
    float: right;
    height: 50px;
    background-color: #8E8D8A;
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
        $.ajax({
            url: 'notifiationsGet.php', data: "", dataType: 'json',  success: function(data)        
            {
                var u = GetURLParameter("user");
                
                for (var i in data)
                {
                    var row = data[i];
                    var username = row[0];
                    var friendUser = row[1];
                    
                    if (username == u) {
                        if (data.length > 1) {
                            $("#sent").append('<div class="box"><a href="profile.html.php?user=' + friendUser + '">' + friendUser + '</a><button id="cancel" data-data="'+ friendUser +'"class="add">Cancell Request</button></div>' );
                            $("#sent").append('<br><br><br>' );
                            $("#search").val("");
                        }
                        else {
                            $("#sent").html('<div class="box"><a href="profile.html.php?user=' + friendUser + '">' + friendUser + '</a><button id="cancel" data-data="'+ friendUser +'" class="add">Cancell Request</button></div>' );
                            $("#sent").append('<br><br><br>' );
                            $("#search").val("");
                        }
                    }
                    else {
                        if (data.length > 1) {
                            $("#requests").append('<div class="box"><a href="profile.html.php?user=' + username + '">' + username + '</a><button id="accept" data-data="'+ username +'"class="add">Accept</button><button id="cancel" data-data="'+ username +'"class="add">Delete</button></div>' );
                            $("#requests").append('<br><br><br>' );
                            $("#search").val("");
                        }
                        else {
                            $("#requests").html('<div class="box"><a href="profile.html.php?user=' + username + '">' + username + '</a><button id="accept" data-data="'+ username +'"class="add">Accept</button><button id="cancel" data-data="'+ username +'"class="add">Delete</button></div>' );
                            $("#requests").append('<br><br><br>' );
                            $("#search").val("");
                        }
                    }
                }
                $('body').on('click', '#accept', function () {
                    var user = $(this).data('data');
                    $.ajax ({
                        type: 'POST', url: 'acceptFriend.php', data: {user: user}, dataType: 'json', success: function(data)
                        {
                            if (data == true) {
                                alert('Request Accepted');
                            }
                            else {
                                alert('Request could not be accepted');
                            }
                        }
                    });
                });
                $('body').on('click', '#cancel', function () {
                    var user = $(this).data('data');
                    $.ajax ({
                        type: 'POST', url: 'deleteNotification.php', data: {user: user}, dataType: 'json', success: function(data)
                        {
                            if (data == true) {
                                alert('Request Deleted');
                            }
                            else {
                                alert('Request could not be deleted');
                            }
                        }
                    });
                });
            }
        });
    $.ajax({
        url: 'friends.php', data: "", dataType: 'json', success: function(data)
        {
            var u = GetURLParameter("user");
            
            for (var i in data)
            {
                var row = data[i];
                var username = row[0];
                var friendUser = row[1];
                
                if (username == u) {
                    if (data.length > 1) {
                        $("#friends").append('<div class="box"><a href="profile.html.php?user=' + friendUser + '">' + friendUser + '</a></div>' );
                        $("#friends").append('<br><br><br>' );
                        $("#search").val("");
                    }
                    else {
                        $("#friends").html('<div class="box"><a href="profile.html.php?user=' + friendUser + '">' + friendUser + '</a></div>' );
                        $("#search").val("");
                    }
                }
                else {
                    if (data.length > 1) {
                        $("#friends").append('<div class="box"><a href="profile.html.php?user=' + username + '">' + username + '</a></div>' );
                        $("#friends").append('<br><br><br>' );
                        $("#search").val("");
                     }
                    else {
                        $("#friends").html('<div class="box"><a href="profile.html.php?user=' + username + '">' + username + '</a></div>' );
                        $("#search").val("");
                    }
                }
            } 
        }
    });
});
</script>
<body>
<div class="column" id="main">
    <h2 class="h2">Friend Requests</h2>
    <div id="requests">
    </div>
    <h2 class="h2">Sent Requests</h2>
    <div id="sent">
    </div>
    <h2 class="h2">Friends</h2>
    <div id="friends">
    </div>
</div>
</body>
</html>