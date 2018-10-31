<?php
    /**
     * DO REGISTER
     * This is where the DB query code will go for signing up
     * as a new user.
     */

    require("redirects.php");
    // forceSSL();

    function isPopulated($val) {
        return isset($val) && !empty($val) && !empty(trim($val));
    }
    
    // get details
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    // check if valid
    $PASSWORD_MIN_LENGTH = 8;
    $PASSWORD_MAX_LENGTH = 124;
    $validUsername = isPopulated($username);
    $validPassword = (
        isPopulated($password) &&
        strlen($password) >= $PASSWORD_MIN_LENGTH &&
        strlen($password) <= $PASSWORD_MAX_LENGTH &&
        $password == $confirm
    );
    
    if (!$validUsername || !$validPassword) {
        registerFail();
    }

	
    // sanitize input
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
	

    // query the database
    $success = (function() {
        // return true or false depending on success
        try {
            
            // add the db->query code here
			// hash the password
			$password = password_hash($password, PASSWORD_DEFAULT);

			// connect to our db and set $db
			require("dbconnect.php");

			// create this new row
			$stmt_insert_user = $db->prepare('INSERT INTO teach07_user (username, password) VALUES (:username, :password)');
			$stmt_insert_user->bindValue(':username', $username);
			$stmt_insert_user->bindValue(':password', $password);
			$stmt_insert_user->execute();
			
			
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    })();

    // upon registration, redirect the user to the login page
    if ($success) {
        logout();
    // otherwise, send the user back with an error message
    } else {
        registerFail();
    }
?>