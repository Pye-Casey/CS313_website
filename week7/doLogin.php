<?php
    /**
     * DO LOGIN
     * This is where the DB query code will go for logging in
     * for an existing user.
     */

    require("redirects.php");
    // forceSSL();

    function isPopulated($val) {
        return isset($val) && !empty($val) && !empty(trim($val));
    }
    
    // get details
    $username = $_POST["username"];
    $password = $_POST["password"];

    // check if valid
    $validUsername = isPopulated($username);
    $validPassword = isPopulated($password);
    if (!$validUsername || !$validPassword) {
        loginFail();
    }

    // sanitize input
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
	//$passHash = password_hash($password, PASSWORD_DEFAULT);

    // query the database
    
        try {
            require("dbconnect.php");
            // add the db->query code here
			$stmt = $db->prepare('SELECT password FROM teach07_user WHERE username=:username');
			$stmt->bindValue(':username', $username);
			$stmt->execute();
			// get rows
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$hash = $row["password"];
			// See the password_hash() example to see where this came from.
			//$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

			if (password_verify($password, $hash)) {
			echo 'Password is valid!';
			} else {
			echo 'Invalid password.';
			}
			var_dump($row);
			die();
			
            $success =  true;
        } catch (PDOException $ex) {
            $success = false;
        }

    // upon login, send the user to the welcome page
    if ($success) {
        login();
    // otherwise, send the user back with an error message
    } else {
        loginFail();
    }
?>