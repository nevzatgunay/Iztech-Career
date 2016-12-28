<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IZTECH Career - Job Details</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">IZTECH Career</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="jobs.php">Browse Jobs</a>
                    </li>
					<li>
                        <a href="company.php">Companies</a>
                    </li>
                    <li>
                        <a href="sign-up.php">Sign Up</a>
                    </li>
					<li>
                        <a href="sign-in.php">Sign In</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
		
		<?php
			$jobid="";
			
			if(isset($_GET['jobid'])){
					$jobid=$_GET['jobid'];
			}

			require_once("connect.php");
			
			$query = "select j.jobid as jid,j.name as jname,j.description as jdesc,j.date as jdate,j.location as jlocation,c.name as cname,c.comid as cid
					from jobs j
					inner join company c on j.comid=c.comid 
					where jobid=".$jobid;
					
								
			$sql = mysql_query($query) or die(mysql_error());

		
				while($read = mysql_fetch_array($sql))
				{
							
					echo "<div class='col-lg-12'>
							<h3>".$read['jname']."</h3>
							<p><span>".$read['jlocation']."</span> / <span>".$read['jdate']."</span></p>
							<p>".$read['jdesc']."</p>
							<p>
								<h4>".$read['cname']."</h4>
							</p>
							
						  </div>";
					
				}
			

			mysql_close($connection);

		?>
			
        </div>
        
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; IZTECH Career 2016 by <a href="http://nevzatgunay.net">Nevzat Günay</a></p>
                </div>
            </div>
        </footer>

    </div>
	
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
