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

    <title>IZTECH Career - Jobs Detail</title>

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
				<h2 class="latest-header">Job Detail</h2>
				<table class="company-container">
				
				<?php
				$jobid=$_GET['jobid'];
				
require_once("connect.php");
			
			$query = "select j.jobid as jid,j.name as jname,j.date as jdate,j.location as jlocation,j.description as jdesc,c.name as cname,c.comid as cid
					from jobs j
					inner join company c on j.comid=c.comid 
					where j.jobid='$jobid'";
					
				
								
			$sql = mysql_query($query) or die(mysql_error());
			$column_number=0;
			
				while($read = mysql_fetch_array($sql))
				{						
						
							echo "
						<tr>
								<td class='job-border'>
										<div class='thumbnail'>
											<img src='images/".$read['cid'].".png' alt=''>
										</div>
										
										<div class='caption'>
												<h3>".$read['jname']."</h3>
												<h4>".$read['cname']."</h4>
												<p>".$read['jlocation']."</p>
												<p>".$read['jdate']."</p>
												<p>".$read['jdesc']."</p>
										</div>
										<div class='btn-more'>
											<p>
													<a href='apply.php?jobid=".$read['jid']."' class='btn'>Apply</a>
												</p>
										</div>
										
								</td>
								</tr>
								";
						
						
						
					
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
