<?php
    /**
     * WELCOME PAGE
     */

    require("redirects.php");
    // forceSSL();
    checkUserCredentials();

    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>CS 313 | Welcome</title>
        <meta charset="UTF-8" />
		<?php
			echo "Welcome " . $username;
		?>
    </head>
    <body>
	
    </body>
</html>