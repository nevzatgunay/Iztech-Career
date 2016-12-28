<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IZTECH Career - Contact</title>

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
            <div class="col-lg-12">
                <h3>Contact</h3>
            </div>
        </div>
		
        <div class="row text-center">
		
		<p>
			This page is a contact form for any question,wish or complaint. You can use the mail form below.
		</p>
		
		<form action="contact.php" method="post">
        Name:<br/>
        <input type="text" name="name"/><br/>
        E-Mail:<br/>
        <input type="text" name="email"/><br/>
        Subject:<br/>
        <input type="text" name="subject"/><br/>
        Your Message:</br>
        <textarea name="message"></textarea><br/>
        <input type="submit" value="Submit"/>
     </form>
	 
	 <?php
	 
		if(isset($_[POST]['name']) && isset($_[POST]['email']) && isset($_[POST]['subject']) && isset($_[POST]['message']))
		{
		   if(empty($_[POST]['name']) || empty($_[POST]['email']) || empty($_[POST]['subject']) || empty($_[POST]['message']))
		   {
			  echo "Please,fill the form!";
		   }
		   else
		   {
			  $name    = strip_tags($_POST['name']);
			  $email   = strip_tags($_POST['email']);
			  $subject = strip_tags($_POST['subject']);
			  $message = strip_tags($_POST['message']);
			  $content  = 'Name: ' .$name. '<br/>E-Mail: ' .$email. '<br/>'. $message;
			  mail('gunaynevzat@yandex.com', $subject, $content);
			  
			  echo "Your message is send";
		   }
		}
		else
		{
		   echo 'Please,fill the form!';
		}
	 
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
