<?php
			$user = "root"; //veritabanı kullanıcı adı
			$pwd = "Sampiyon-57"; //veritabanı şifresi
			$host = "localhost"; //mysql server
			$db = "iztechcareer"; //veritabanı adı
			
			$connection = @mysql_connect($host,$user,$pwd);
			
			if(!$connection) die ("Cannot connect!");
			
			mysql_select_db($db,$connection) or die ("Cannot connect database!");

?>