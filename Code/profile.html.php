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
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>Profile</title>
<style>
    .box {
        margin-top: 2.5%;
        margin-left: 2%;
        background-color: #E98074;
        float: left;
        display: inline-block;
    }
    .box2 {
        margin-top: 2.5%;
        margin-left: 20%;
        height: 250px;
        width: 40%;
        background-color: #E98074;
        display: inline-block;
    }
    .image {
        height: 250px;
        width: 250px;
    }
    .centerPic {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 700px;
        margin-bottom: 1%;
    }
    .upload {
        float: left;
        background-color: black;
        color: white;
        cursor: pointer;
        margin: 8px 2px;
        margin-top: 5%;
        padding: 8px 8px;
    }
    .editB {
        float: left;
        background-color: black;
        color: white;
        cursor: pointer;
        height: 40px;
        width: 80px;
        margin-top: 100px;
    }
    .but {
        float: left;
        background-color: black;
        color: white;
        cursor: pointer;
        height: 40px;
        width: 80px;
        margin-top: 1.5%;
    }
    body {
        background-color: #EAE7DC;
    }
    a {
        color: black;
        font-size: 16px;
    }
    th {
        font-size: 20px;
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
$(document).ready(function(){
    var username = GetURLParameter("user");
    $("#profilePic").html('<img alt="Images" title="Map Image" src="Photos/stock.jpg" class="image"/>');
    $.ajax({
        type: 'post', url: 'chechLogeduser.php', data: {username: username}, dataType: 'json',  success: function(data)        
        {
            if (data == true) {
                $("#edit").append('<button id="editB" class="editB">Edit</button>');
                $("#edit").append('<button id="uploadPic" class="editB">Profile Picture</button>');
                $("#edit").append('<button id="passChange" class="editB">Change Password</button>');
            }
        }
    });
    //Upload and Show a profile images
    $.ajax({
        type: 'post', url: 'profileImage.php', data: {username: username}, dataType: 'json',  success: function(data)        
        {
            var imagePath = data;
            if (imagePath != "") {
                $("#profilePic").html('<img alt="Images" title="Map Image" src="'+ imagePath +'" class="image"/>');
            }
        }
    });
    //Get user info
    $.ajax({
        type: 'post', url: 'userInfo.php', data: {username: username}, dataType: 'json',  success: function(data)        
        {
            for (var i in data)
            {
                var row = data[i];          

                var interests = row[0];
                var school = row[1];
                var college = row[2];
                var work = row[3];
                var phone = row[4];
                var firstName = row[5];
                var lastName = row[6];
                var dob = row[7];
                var country = row[8];
                var rel = row[9];
                $("#profilePic").append('<h2>' + firstName + ' ' + lastName + '</h2>');
                $("#DOB").html('<th>Date of Birth: ' + dob + '</th>');
                $("#prim").html('<th>Primary/Secondary School: ' + school + '</th>');
                $("#college").html('<th>College: ' + college + '</th>');
                $("#work").html('<th>Workplace: ' + work + '</th>');
                $("#phone").html('<th>Phone: ' + phone + '</th>');
                $("#country").html('<th>Country: ' + country + '</th>');
                $("#Relationship").html('<th>Relationship Status: ' + rel + '</th>');
                $("#interest").html('<th>Interests: '+interests+'</th>');
            }
        }
    });
    //Load images on profile 
    $.ajax({
        type: 'post', url: 'imageLoad.php', data: {username: username}, dataType: 'json',  success: function(data)        
        {
            var count = 0;
            for (var i in data)
            {
                var row = data[i];

                var imagePath = row.Path;
                var username = row.Username;
                var post = row.Post;
                var date = row.Date;
                if (imagePath != "" && post != "") {
                    $("#main").append('<p class="centerPic">'+ post +'</p>');
                    $("#main").append('<img alt="Images" title="Map Image" src="'+ imagePath +'"class="centerPic" />'); 
                    $("#main").append('<p class="centerPic">Posted: ' + date + '</p>'); 
                }
                else if (imagePath != "" && post == "") {
                    $("#main").append('<img alt="Images" title="Map Image" src="'+ imagePath +'"class="centerPic" />'); 
                    $("#main").append('<p class="centerPic">Posted: ' + date + '</p>'); 
                }
                else if (imagePath == "" && post != "") {
                    $("#main").append('<p class="centerPic">'+ post +'</p>');
                    $("#main").append('<p class="centerPic">Posted: ' + date + '</p>'); 
                }
            }
        } 
    });
    $.ajax ({
        type: 'POST', url: 'friendCheck.php', data: {username: username}, dataType: 'json', success: function(data)
        {
            if (data == false) {
                $('#b').html('<button id="addFriend" class="but">Add Friend</button>');
            }
            else if (data == true) {
                $('#b').append('<button id="delete" class="but">Delete Friend</button>');
            }
        }
    });
    $('body').on('click', '#addFriend', function () {
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
    $('body').on('click', '#editB', function () {
        window.location = "infoEdit.html.php?user=" + username;                        
    });
    $('body').on('click', '#uploadPic', function () {
        window.location = "uploadProfilePic.html.php";                        
    });
    $('body').on('click', '#passChange', function () {
        window.location = "passwordChange.html.php?user=" + username;                        
    });
    $('body').on('click', '#delete', function () {
        var user = GetURLParameter("user");
        $.ajax ({
            type: 'POST', url: 'deleteFriend.php', data: {user: user}, dataType: 'json', success: function(data)
            {
                if (data == true) {
                    alert('Friend Removed');
                }
                else {
                    alert('Something went worng. Please try again!');
                }
            }
        });
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
        <tr id="prim">
        </tr>
        <tr id="college">
        </tr>
        <tr id="interest">
        </tr>
        <tr id="work">
        </tr>
        <tr id="phone">
        </tr>
        <tr id="country">
        </tr>
        <tr id="Relationship">
        </tr>
    </table>
    <div id="edit">
    </div>
</div>
<div id="b">
</div>
<div>    
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="column" id="main"></div>
</body>
</html>
