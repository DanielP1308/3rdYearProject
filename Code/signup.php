<?php  
	   $path = "navPreset.php";
	   include_once($path);
?>
<?php
	$path = "db.inc.php";
	include($path);
		
	$sql = "Insert into Members (FirstName, LastName, Email, Password, About)
	VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[email]', '$_POST[pwd]', '$_POST[about]')" ;
	
	if (!mysqli_query($conn,$sql))
	{
		die ("An Error in the SQL Query: ".mysqli_error($conn) ) ;
	}
	mysqli_close($conn) ;
	
	echo "<script type='text/javascript'>alert('Sign Up Successfull');
			javascript:window.location.href = 'http://localhost/Project/Code/underConstruction.html.php' ;
	</script>";
?>	