<?php
	session_start() ;
	unset($_SESSION['user']);

	session_destroy();
	$_SESSION = array();
	echo "	<script type='text/javascript'>alert('You have been logged out');
				javascript:window.location.href = 'loginScreen.html.php' ;
			</script>";
	exit();
 ?>