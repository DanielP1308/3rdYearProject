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
      .column {
  -ms-flex: 50%;
  flex: 50%;
  padding: 0 4px;
}

.center {
    display: block;
}
.button {
    width: 20%;
    background-color: black;
    color: lavender;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 40%;
}
body {
    background-color: #EAE7DC;
}

  </style>
</head>
<body>
<form method="post" action="profileImageUpload.php" enctype="multipart/form-data">
    <div class="center">
        <input type="file" name="fileToUpload" id="fileToUpload" class="button"/>
    </div>
    <div class="center">
        <input type='submit' value='Submit' class="button" name="submit" />
    </div>
</form>
</body>