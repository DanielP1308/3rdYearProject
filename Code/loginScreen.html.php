<?php
   $path = "navPreset.php";
   include($path);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
      .box {
        margin-left: 35%;
        margin-right: 35%;
      }
      input, select {
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border-radius: 4px;
        box-sizing: border-box;
      }
      .button {
        width: 50%;
        background-color: black;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-left:25%;
      }
      .heading {
          text-align: center;
      }
    body {
        background-color: #EAE7DC;
    }
</style>
<script>
$(document).ready(function() {
    $('#button').click(function() {
        var username = $('#username').val();
        var password = $('#pwd').val();
        $.ajax({
            type: 'POST', url: 'loginScreen.php', data: {username: username, password: password}, dataType: 'json',  success: function(success)
            {
                if (success == false) {
                    alert("Username and/or password are incorrect!");
                }
                else {
                    
                    if (username == "admin") {
                        window.location.replace("HomeData.html.php");
                    }
                    else {
                        window.location.replace("HomePage.html.php");
                    }
                }
            } 
        });
    }); 
});
</script>
<body>
    
    <h2 class="heading">Login</h2>
    <div class="box">
        <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter email" name="username" >
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
        </div>
        <input type="submit" class="button" id="button" value="Submit"/>
    </div>
</body>
</html>