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
  </style>
</head>
<body>
<script>

</script>
<div class="box">
  <h2 class="heading">Sign Up</h2>
  <form action="signup.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter name" name="fname">
    </div>
    <div class="form-group">
      <label for="pwd">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter name" name="lname">
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="lname" placeholder="Enter name" name="dob">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password</label>
      <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="pwd2">
    </div>
    <div class="form-group">
      <label for="about">About:</label>
        <textarea class="center" cols="50" rows="5"></textarea>
    </div>
    <div class="form-group">
      <label for="reletionship">Reletionship</label>
      <select class="form-control" id="reletionship">
        <option>Single</option>
        <option>Married</option>
        <option>Widowed</option>
        <option>Prefer not to say</option>
      </select>
    </div>
    <button type="submit" class="button">Submit</button>
  </form>
</div>

</body>
</html>