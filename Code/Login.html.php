<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "navPreset.php";
   include_once($path);
?>
<HTML>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="main.css">
<body>
<form action = 'loginScreen.php' method = 'POST' align=center class='box'><h2>Login</h2>
<table>
    <tr>
	   <td><label class='label' for = 'login'> ID</label>
	   <td><input class='input' type='text' name='login' id='login'>
	</tr>
	<tr>
		<td><label class='label' for = 'password'> Password</label>
		<td><input class='input' type='password' name='password' id='password'>
	</tr>
</table>
	<td><input class = 'button1' type = 'submit' value = 'Submit' />
	<td><input class = 'button1' type = 'reset' value = 'Clear'/>