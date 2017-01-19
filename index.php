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

    <title>IZTECH Career</title>

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

						if(isset($_SESSION["username"])){
							echo "<a class='active' href='myaccount.php'> Welcome, ".$_SESSION["username"]."</a>";
						}
						else
							echo "<a class='active' href='sign-in.php'>Sign In</a>"; 
					?>
				  
			  </li>
			</ul>
		</div>
		
		<div class="header">
			<div class="header-info">
				<h1>IZTECH Career</h1>
				<p>IZTECH Career is a platform that is to find a right job or internship for all students and graduates of <a href="http://www.iyte.edu.tr">İzmir Institute of Technology</a>.</p>
				<p>IZTECH Career is an open source product of IZTECH SKS(The Center for Health,Culture and Sports).</p>
				<p>You can contribute the project via <a href="https://github.com/nevzatgunay/Iztech-Career">Github</a>.</p>
				
				<a href="jobs.php" class="btn">Find A Job!</a>
			</div>
		</div>
		
		<div class="latest-jobs">
			<div class="latest-jobs-header">
				<h2 class="latest-header">Latest Jobs</h2>
				<table class="job-container">
				<tr>
				<?php


			require_once("connect.php");
			
			$query = "select j.jobid as jid,j.name as jname,j.date as jdate,j.location as jlocation,c.name as cname,c.comid as cid
					from jobs j
					inner join company c on j.comid=c.comid 
					order by rand()
					limit 4";
					
								
			$sql = mysql_query($query) or die(mysql_error());

		
				while($read = mysql_fetch_array($sql))
				{
							
					echo "
					
					<td class='job-border'>
							<div class='thumbnail'>
								<img src='images/".$read['cid'].".png' alt=''>
							</div>
							
							<div class='caption'>
									<h3>".$read['jname']."</h3>
									<h4>".$read['cname']."</h4>
									<p>".$read['jlocation']."</p>
									<p>".$read['jdate']."</p>
									
							</div>
							<div class='btn-more'>
								<p>
										<a href='job-detail.php?jobid=".$read['jid']."' class='btn btn-default'>More</a>
									</p>
							</div>
					</td>";
					
				}
			

			mysql_close($connection);

		?>
		</tr></table>
			</div>
		</div>
		
		<div class="footer">
			<p class="footer-content">Copyright &copy; IZTECH Career 2017 by <a href="https://www.facebook.com/profile.php?id=100005771017510">Pınar Yurdagül</a> & <a href="http://nevzatgunay.net">Nevzat Günay</a></p>
		</div>
        
		
	</div>

</body>

</html>
