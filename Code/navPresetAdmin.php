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
      <a class="navbar-brand" href="#">Social Media</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Log Out</a></li>
        </ul>
  </div>
</nav>
';
?>