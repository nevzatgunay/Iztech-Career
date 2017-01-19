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

    <title>IZTECH Career - Companies</title>

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
				<h2 class="latest-header">All Companies</h2>
				<table class="company-container">
				
				<?php
		

			require_once("connect.php");
			
			$query = "select c.name as cname,c.comid as cid
					from company c";
					
				
								
			$sql = mysql_query($query) or die(mysql_error());
			$column_number=0;
			
				while($read = mysql_fetch_array($sql))
				{
						if($column_number%4==0){
								echo "<tr>";
						}
						
						
						
							echo "
						
								<td class='company-border'>
										<div class='company-thumbnail'>
											<img src='images/".$read['cid'].".png' alt=''>
										</div>
										
										<div class='company-caption'>
												
												<h4>".$read['cname']."</h4>
												
												
										</div>
										
										
										
								</td>";
								$column_number++;
								if($column_number%4==0){
										echo "</tr>";
								}
						
						
						
					
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
