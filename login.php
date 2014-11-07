<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title>Login</title>
    </head>
    <body>
        <?php
            require_once 'utils.php';
            global $user;
            if($user)
            {
        ?>
        <p> already logged in </p>
        <?php
            }
            else
            {
        ?>
        <form method="POST" action="loginHandler.php">
            <p>Username: <input type="text" name="username" /></p>
            <p>Password: <input type="password" name="password" /></p>
            <p><input type="submit" name="login" value="Login!" /></p>
        </form>
        <?php
            }
        ?>
    </body>
</html>