<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IZTECH Career - Apply</title>

    <link href="style.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
		<div class="menu">
			<ul>
			  <li><a href="index.php">Home</a></li>
			  <li><a href="jobs.php">Browse Jobs</a></li>
			  <li><a href="company.php">Companies</a></li>
			  <li><a href="sign-up.php">Sign Up</a></li>
			  <li><a href="contact.php">Contact</a></li>
			  <li style="float:right">
					<?php

						if(isset($_SESSION["username"]))
							echo "<a class='active' href='myaccount.php'> Welcome, ".$_SESSION["username"]."</a>";
						else
							echo "<a class='active' href='sign-in.php'>Sign In</a>"; 
					?>
				  
			  </li>
			</ul>
		</div>
		
		<div class="latest-jobs">
			<div class="latest-jobs-header">
				<h2 class="latest-header">Apply</h2>
				<table class="company-container">
				
				<?php	

					if(isset($_SESSION["username"])){
						$jobid = $_GET['jobid'];
						$userid = $_SESSION["userid"];
						require_once("connect.php");
						$query = "INSERT INTO userjob(uid, jobid) VALUES($userid,$jobid)";
									
						$retval = mysql_query($query);
						
						if(! $retval ) {
							  die('Error! ' . mysql_error());
						}
						   
						header("Location: jobs.php");
						
					}else{
						header("Location: sign-in.php");
					}
			
			mysql_close($connection);

		?>
			</table>
			</div>
		</div>
		
		<div class="footer">
			<p class="footer-content">Copyright &copy; IZTECH Career 2017 by <a href="https://www.facebook.com/profile.php?id=100005771017510">Pınar Yurdagül</a> & <a href="http://nevzatgunay.net">Nevzat Günay</a></p>
		</div>
        
		
	</div>

</body>

</html>
