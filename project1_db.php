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
	
	function getName($studentID){
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
			$query = 'SELECT first_name, last_name FROM behavior.students WHERE id="'. $studentID .'"';
			$stmt = $db->query($query);
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$fName = $results["first_name"];
			$lName = $results["last_name"];
			$name = $fName . " " . $lName;
			return $name;
        } catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			return false;
			die();
        }
	}
?>