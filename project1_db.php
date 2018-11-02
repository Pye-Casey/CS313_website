<?php
	function queryDB($query){
		try {
			$dbUrl = getenv('DATABASE_URL');
					
			$dbOpts = parse_url($dbUrl);
					
			$dbHost = $dbOpts["host"];
			$dbPort = $dbOpts["port"];
			$dbUser = $dbOpts["user"];
			$dbPassword = $dbOpts["pass"];
			$dbName = ltrim($dbOpts["path"],'/');
					
			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
					
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// add to database
			$stmt = $db->query($query);
			return $stmt;
        } catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			return false;
			die();
        }
	}
?>