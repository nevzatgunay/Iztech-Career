<?php
			$user = "root"; 
			$pwd = "Sampiyon-57"; 
			$host = "localhost"; 
			$db = "iztechcareer"; 
			
			$connection = @mysql_connect($host,$user,$pwd);
			
			if(!$connection) die ("Cannot connect!");
			
			mysql_select_db($db,$connection) or die ("Cannot connect database!");

?>