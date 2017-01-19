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

    <title>IZTECH Career - My Account</title>

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
		
		
		
		<div class="latest-jobs">
			<div class="latest-jobs-header">
				<h2 class="latest-header">My Account</h2>
								
				<?php
				
				if(!isset($_SESSION["username"])){
					header("location:sign-in.php");
				}else{
					$userid=$_SESSION["userid"];
					
						
					require_once("connect.php");
			
					if (isset($_POST['button'])) {
						$phone=$_POST['phone'];
						$pass=$_POST['password'];
						
						$sql = "UPDATE user SET user.phone = '$phone',user.password = '$pass' WHERE uid = '$userid'" ;
						$retval = mysql_query( $sql,$connection)or die(mysql_error());
					
						if(! $retval ) {
						   die('Could not update data: ' . mysql_error());
						}
			
						if(isset($_FILES['image'])){
						  $errors= array();
						  $file_name = $userid.".png";
						  $file_tmp =$_FILES['image']['tmp_name'];
						  $file_type=$_FILES['image']['type'];
						  
						  if(!empty($_FILES['image']['name'])){
							  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
							  
							  $expensions= array("png");
						  
							  if(in_array($file_ext,$expensions)=== false){
								 $errors[]="extension not allowed, please choose a PNG file.";
							  }
						  }
						  
						  
						  
						  
										  
						  if(empty($errors)==true){
							 move_uploaded_file($file_tmp,"images/users/".$file_name);
						  }else{
							 print_r($errors);
						  }
						}	
					}
			
					$query ="select user.password as upass,user.phone as uphone from user where uid='$userid'";
			
					$sql = mysql_query($query) or die(mysql_error());
			
			
			
					while($read = mysql_fetch_array($sql)){
						
						echo	"<form name='userinfo' method='POST' enctype='multipart/form-data'>
									<table>
										<tr>
											<td rowspan='4'>
												<img class'person-image' src='images/users/".$userid.".png'/>
											</td>
											
										</tr>
										<tr>
											<td></td>
											<td>Password:<input type='text' name='password' value='".$read['upass']."'/></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td>Phone:<input type='text' name='phone' value='".$read['uphone']."'/></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td>Your image:<input type='file' name='image' /></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td><input type='submit' name='button' value='Update'/></td>
											<td></td>
										</tr>
										<tr>
											<td><a href='logout.php'>Log Out</a></td>
											<td></td>
											<td></td>
										</tr>
									 </table>
								 </form>";
					}
				
				
								
					echo "<table class='job-container'>";
			
			
					$query = "select jobs.jobid as jid,company.comid as cid,jobs.name as jname,jobs.location as jloc,jobs.date as jdate,company.name as cname
							from userjob
							inner join user on user.uid=userjob.uid
							inner join jobs on jobs.jobid=userjob.jobid
							inner join company on jobs.comid=company.comid
							where user.uid='$userid'";
										
					$sql = mysql_query($query) or die(mysql_error());
					$column_number=0;
					
						while($read = mysql_fetch_array($sql))
						{
								if($column_number%4==0){
										echo "<tr>";
								}
								
								
								
									echo "
												<td class='job-border'>
												<div class='thumbnail'>
													<img src='images/".$read['cid'].".png' alt=''>
												</div>
														
														<div class='caption'>
														<h3>".$read['jname']."</h3>
														<h4>".$read['cname']."</h4>
														<p>".$read['jloc']."</p>
														<p>".$read['jdate']."</p>
														
												</div>
														<div class='btn-more'>
													<p>
															<a href='job-detail.php?jobid=".$read['jid']."' class='btn'>More</a>
														</p>
												</div>
														
												</td>
												
												";
												$column_number++;
										if($column_number%4==0){
												echo "</tr>";
										}
										
										
								
										
						}
				
				
					
					
					
				}

				
				
				
				echo "</table>";
				
				
				
				mysql_close($connection);
		?>
		
			</div>
		</div>
		
		<div class="footer">
			<p class="footer-content">Copyright &copy; IZTECH Career 2017 by <a href="https://www.facebook.com/profile.php?id=100005771017510">Pınar Yurdagül</a> & <a href="http://nevzatgunay.net">Nevzat Günay</a></p>
		</div>
        
		
	</div>

</body>

</html>
