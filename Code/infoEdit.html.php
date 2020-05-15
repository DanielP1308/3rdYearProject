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
  <title>Update Info</title>
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
        url: 'getInfo.php', data: "", dataType: 'json',  success: function(data)
        {
            for (var i in data) {
                var row = data[i];
                
                var fName = row[0];
                var lName = row[1];
                var email = row[2];
                var about = row[3];
                var dob = row[4];
                var interests = row[5];
                var school = row[6];
                var college = row[7];
                var work = row[8];
                var phone = row[9];
                var country = row[10];
                var reletionship = row[11];
                
                $("#email").attr("value", email);
                $("#firstName").attr("value", fName);
                $("#lastName").attr("value", lName);
                $("#dob").attr("value", dob);
                $("#interests").attr("value", interests);
                $("#prim").attr("value", school);
                $("#college").attr("value", college);
                $("#work").attr("value", work);
                $("#country").attr("value", country);
                $("#phone").attr("value", phone);
                $("#about").val(about);
                $("#reletionship").val(reletionship);
                
            }
        } 
    });
});
</script>
</head>
<body id="main">
<div class="box">
  <h2 class="heading">Update Info</h2>
    <form action="updateInfo.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="" name="email" required>
    </div>
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="firstName" value="" name="firstName">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lastName" value="" name="lastName">
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="dob" name="dob" value=""> 
    </div>
    <div class="form-group">
      <label for="pwd">Interests:</label>
      <input type="text" class="form-control" id="interests" value="" name="interests" required>
    </div>
    <div class="form-group">
      <label for="prim">Primary / Secondary School</label>
      <input type="text" class="form-control" id="prim" value="" name="prim" required>
    </div>
    <div class="form-group">
      <label for="college">College:</label>
      <input type="text" class="form-control" id="college" value="" name="college" required>
    </div>
    <div class="form-group">
      <label for="pwd">Workplace:</label>
      <input type="text" class="form-control" id="work" value="" name="work" required>
    </div>
    <div class="form-group">
      <label for="pwd">Country:</label>
      <input type="text" class="form-control" id="country" value="" name="country" required>
    </div>
    <div class="form-group">
      <label for="pwd">Phone:</label>
      <input type="number" class="form-control" id="phone" value="" name="phone" required>
    </div>
    <div class="form-group">
      <label for="about">About:</label>
      <textarea class="center" cols="50" rows="5" id="about"  name="about"></textarea>
    </div>
    <div class="form-group">
      <label for="reletionship">Reletionship Status:</label>
      <select class="form-control" id="reletionship" name="reletionship" value="">
        <option>Prefer not to say</option>
        <option>Single</option>
        <option>Married</option>
        <option>Widowed</option>
      </select>
    </div>
    <button type="submit" class="button" id="button">Edit</button>
</form>
</div>

</body>
</html>