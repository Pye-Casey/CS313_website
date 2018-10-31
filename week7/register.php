<?php
    /**
     * SIGN UP PAGE
     */

    require("redirects.php");
    // forceSSL();

    $registerFailed = ($_SESSION["register-fail"] == "true");
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>CS 313 | Register</title>
        <meta charset="UTF-8" />
    </head>
    <body>
		<form action="doRegister.php" method="post">
       User name:<br />
       <input type="text" name="username"><br>
       Password:<br />
       <input type="password" name="password">
	   <br />
	   Confirm Password:<br />
       <input type="password" name="confirm">
	   <br />
       <input type="submit" value="Sign Up">
       <input type="reset">
     </form>
	 
    </body>
</html>

<?php
    // this section resets the "fail" flag(s) so that if the user
    // refreshes the page, then any previous error messages will
    // not render
    resetFailFlags();
?>