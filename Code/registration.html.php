<?php
   $path = "navPreset.php";
   include($path);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
      .center {
          resize: none;
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 100%;
          margin-bottom: 1%;
      }
     body {
        background-color: #EAE7DC;
    }
  </style>
<script>
$(document).ready(function() {
    $('#button').click(function() {
        var username = $('#username').val();
        var email = $('#email').val();
        var firstName = $('#fname').val();
        var lastName = $('#lname').val();
        var dob = $('#dob').val();
        var password = $('#pwd').val();
        var passwordCheck = $('#pwd2').val();
        var about = $('#about').val();
        if (password != passwordCheck) {
            alert("Passwords do not match!");
        }
        else {
            $.ajax({
                type: 'POST', url: 'signup.php', data: {username: username, email: email, firstName: firstName, lastName: lastName, dob: dob, password: password, about: about}, dataType: 'json',  success: function(data)
                {
                    if (data == true) {
                        alert("Username already exists! Please use a different username.");
                    }
                    else {
                        window.location = "loginScreen.html.php";
                    }
                } 
            });   
        }
    });
});
</script>
</head>
<body id="main">
<div class="box">
  <h2 class="heading">Sign Up</h2>
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
    </div>
    <div class="form-group">
      <label for="pwd">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="dob" name="dob">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password</label>
      <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="pwd2" required>
    </div>
    <div class="form-group">
      <label for="about">About:</label>
      <textarea class="center" cols="50" rows="5" id="about"></textarea>
    </div>
    <button type="submit" class="button" id="button">Submit</button>
</div>

</body>
</html>