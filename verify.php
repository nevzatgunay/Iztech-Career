<?php

	$verify = $_GET['verify'];
	$email = mysql_real_escape_string($_GET['email']);
	$password = "123";
	$phone = "555 111 22 33";
	
	if($verify){
		require_once("connect.php");
		$query = "INSERT INTO user(mail,password,phone) VALUES('$email','$password','$phone')";
									
						$retval = mysql_query($query);
						
						if(! $retval ) {
							  die('Error! ' . mysql_error());
						}
						   
						header("Location: sign-in.php");
	}else
		echo "Verification Error!";
	

?>