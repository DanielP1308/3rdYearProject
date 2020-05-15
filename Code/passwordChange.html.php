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
</style>
<script>
$(document).ready(function() {
    $('#button').click(function() {
        var oldPass = $('#oldPass').val();
        var newPassword = $('#newPass').val();
        var conNewPass = $('#conNewPass').val();
        
        if (newPassword != conNewPass) {
            alert("Passwords do not match!");
        }
        else {
            $.ajax({
                type: 'POST', url: 'changePassword.php', data: {oldPass: oldPass, newPassword: newPassword}, dataType: 'json',  success: function(success)
                {
                    if (success == true) {
                        alert("Password changed succesfuly!");
                    }
                    else {
                        alert("Something went wrong. Please try again later!");
                    }
                } 
            }); 
        }
    }); 
});
</script>
<body>
    
    <h2 class="heading">Change Password</h2>
    <div class="box">
        <div class="form-group">
            <label for="email">Current Password:</label>
            <input type="password" class="form-control" id="oldPass" placeholder="Enter email" name="username" >
        </div>
        <div class="form-group">
            <label for="pwd">New Password:</label>
            <input type="password" class="form-control" id="newPass" placeholder="Enter password" name="pwd">
        </div>        
        <div class="form-group">
            <label for="pwd">Confirm New Password:</label>
            <input type="password" class="form-control" id="conNewPass" placeholder="Enter password" name="pwd">
        </div>
        <input type="submit" class="button" id="button" value="Submit"/>
    </div>
</body>
</html>