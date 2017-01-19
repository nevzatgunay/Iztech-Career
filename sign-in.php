
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IZTECH Career - Sign In</title>

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
			
			<form action="sign-in.php" method="post" class="sign-in-form">
			<h2>Please your instituonal email and password for signing in.</h2>
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
						<td>Password:</td>
						<td><input type="password" name="password"/></td>
						<td></td>
					</tr>
					<tr>
					<td></td>
					<td><input type="submit" name="button" value="Sign In"/></td>
					<td></td>
					</tr>
					
				</table>
			</form>
			
			<?php
				if(isset($_POST['button'])){
					$namesurname=$_POST['namesurname'];
					$password=$_POST['password'];
					$email=$_POST['email'];
					if(empty($namesurname) || empty($password) || empty($email)){
						echo "Please,fill the all of the inputs";
					}else{
						require_once("connect.php");
						
						$username=$namesurname.$email;
											
						$sql = mysql_query("select u.uid as uid,u.password as up,u.mail as umail
						from user u
						where mail='$username'") or die(mysql_error());

					
							while($read = mysql_fetch_array($sql))
							{
								if($read['up']==$password && $read['umail']==$username){
									session_start();
									$_SESSION["username"] = $username;
									$_SESSION["userid"] = $read['uid'];
									header("Location: index.php");
								}else
									echo "Not found an user!";
							}
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
