<?php
    /**
     * SIGN IN PAGE
     */

    require("redirects.php");
    // forceSSL();
    checkLoginAndRedirect();

    $loginFailed = ($_SESSION["login-fail"] == "true");
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>CS 313 | Sign In</title>
        <meta charset="UTF-8" />
    </head>
    <body>
		<form action="doLogin.php" method="post">
       User name:<br />
       <input type="text" name="username"><br>
       Password:<br />
       <input type="password" name="password">
	   <br /><br />
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