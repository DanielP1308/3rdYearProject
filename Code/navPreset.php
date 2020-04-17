<?php
if (!isset($_SESSION)) {
    session_start();
}
echo '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="HomePage.html.php">Social Media</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="HomePage.html.php">Home</a></li>
      <li><a href="#">Friends</a></li>
    </ul>';
    if (isset($_SESSION['user'])) {
        echo       
    '<ul class="nav navbar-nav">
      <li><a href="searchResult.html.php">Search</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#">'.$_SESSION['user'].'</a></li>
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