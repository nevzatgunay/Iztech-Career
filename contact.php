<?php
    session_start();
?>

<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IZTECH Career - Contact</title>

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
				<h2 class="latest-header">Contact</h2>
				<table class="company-container">
					<form action="contact.php" method="post">
						<table>
							<tr>
								<td>Your Name:</td>
								<td>
									<input type="text" name="name" size="30"/>
								</td>
							</tr>
							
							<tr>
								<td>Your Email:</td>
								<td>
									<input type="text" name="email" size="30"/>
								</td>
							</tr>
							<tr>
								<td>Your Message:</td>
								<td>
									 <textarea name="message" rows="7" cols="30"></textarea>
								</td>
							</tr>
							
							<tr>
								<td></td>
								<td>
									 <input type="submit" name="button" value="Submit"/>
								</td>
							</tr>
						</table>
					</form>
				<?php
				
				if(isset($_POST['button'])){
					$name = $_POST['name'];
					$email = $_POST['email'];
					$message = $_POST['message'];
					
					
					require("class.phpmailer.php");
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPDebug = 1;
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = 'tls';
					$mail->Host = "smtp.gmail.com";
					$mail->Port = 587;
					$mail->IsHTML(true);
					$mail->SetLanguage("tr", "phpmailer/language");
					$mail->CharSet  ="utf-8";
					$mail->Username = "newzatr57@gmail.com";
					$mail->Password = "sampiyon";
					$mail->SetFrom("newzatr57@gmail.com", "IZTECH Career");
					$mail->AddAddress("newzatr57@gmail.com"); 
					$mail->Subject = "IZTECH Career"; 
					$mail->Body = $message; 
					if(!$mail->Send()){
						echo "Email Sending Error!: ".$mail->ErrorInfo;
					} else {
						echo "Email Send";
					}
					
				}
				

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
