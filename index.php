<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IZTECH Career</title>

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
        <header class="jumbotron hero-spacer">
            <h1>IZTECH Career</h1>
            <p>IZTECH Career is a career platform that is to find a right job or internship for students and graduates of all İzmir Institute of Technology.</p>
            <p>IZTECH Career is an open source product of IZTECH SKS(The Center for Health, Culture and Sports).</p>
			<p>You can contribute the project via <a href="https://github.com/nevzatgunay/Iztech-Career">Github</a>.</p>
			<p><a class="btn btn-primary btn-large" href="jobs.php">Find A Job</a>
            </p>
        </header>

        <hr>

        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Jobs</h3>
            </div>
        </div>
		
        <div class="row text-center">
		
		<?php
		

			require_once("connect.php");
			
			$query = "select j.name as jname,j.date as jdate,j.location as jlocation,c.name as cname,c.comid as cid
					from jobs j
					inner join company c on j.comid=c.comid 
					order by rand()
					limit 4";
					
								
			$sql = mysql_query($query) or die(mysql_error());

		
				while($read = mysql_fetch_array($sql))
				{
							
					echo "<div class='col-md-3 col-sm-6 hero-feature'>
							<div class='thumbnail'>
								<img src='images/".$read['cid'].".png' alt=''>
								<div class='caption'>
									<h3>".$read['jname']."</h3>
									<h4>".$read['cname']."</h4>
									<p>".$read['jlocation']."</p>
									<p>".$read['jdate']."</p>
									<p>
										<a href='#' class='btn btn-default'>More</a>
									</p>
								</div>
							</div>
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
