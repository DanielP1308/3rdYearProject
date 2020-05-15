<?php
if (!isset($_SESSION)) {
    session_start();
}

echo '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
        a {
        color: black;
        font-size: 16px;
    }
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="HomePage.html.php">Social Media</a>
    </div>';
    if (isset($_SESSION['user'])) {
        echo       
    '<ul class="nav navbar-nav">
      <li class="active"><a href="HomePage.html.php">Home</a></li>
    <li><a  href="friends.html.php?user='.$_SESSION["user"].'">Friends</a></li>
    </ul>
    <div id="isSet">
    <ul class="nav navbar-nav">
      <li><a href="searchResult.html.php">Search</a></li>
      <li><a href="messages.html.php?user='.$_SESSION["user"].'">Messages</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li id="user"><a href="profile.html.php?user='.$_SESSION["user"].'">'.$_SESSION["user"].'</a></li>
        <li><a href="logout.php">Log Out</a></li>
        ';
    }

    if (!isset($_SESSION['user'])) {
      echo '<ul class="nav navbar-nav navbar-right">
                <li><a href="http://localhost/Project/Code/registration.html.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="http://localhost/Project/Code/loginScreen.html.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
    }

    echo '</ul>
  </div>
</nav>
';
?>