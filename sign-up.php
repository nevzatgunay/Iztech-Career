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

    <title>IZTECH Career - Sign Up</title>

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
			
			<form action="sign-up.php" method="post" class="sign-in-form">
			<h4>Please your instituonal email for sign up and we will send you an email for email verification.</h4>
				<table>
					<tr>
						<td>Name Surname:</td>
						<td>
							<input type="text" name="namesurname"/>
						</td>
						<td>
							<select name="email">
								<option value="@std.iyte.edu.tr">@std.iyte.edu.tr</option>
								<option value="@iyte.edu.tr">@iyte.edu.tr</option>
							</select>
						</td>
					</tr>
					<tr>
					<td></td>
					<td><input type="submit" name="button" value="Activate"/></td>
					<td></td>
					</tr>
					
				</table>
			</form>
			
			<?php
				if(isset($_POST['button'])){
					$name = $_POST['namesurname'];
					$email = $_POST['email'];
					
					$username=$name.$email;
					
					$message ="<a href='http://iztechcareer.nevzatgunay.net/verify.php?verify=1&email=".$username.">Verify</a>";
					
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
					$mail->AddAddress($username); 
					$mail->Subject = "Activate your IZTECH Career account"; 
					$mail->Body = "Please click the link for verification and also your default password:123 ".$message; 
					if(!$mail->Send()){
						echo "Email Sending Error!: ".$mail->ErrorInfo;
					} else {
						echo "Email Send";
					}
					
				}
			?>
		</div>
		
		<div class="footer">
			<p class="footer-content">Copyright &copy; IZTECH Career 2017 by <a href="https://www.facebook.com/profile.php?id=100005771017510">Pınar Yurdagül</a> & <a href="http://nevzatgunay.net">Nevzat Günay</a></p>
		</div>
        
		
	</div>

</body>

</html>
