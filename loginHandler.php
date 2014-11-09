<?php
require_once 'utils.php';

if(!isset($_POST["username"]))
{
    performError(Errors::$ERROR_90."_POST[\"username\"]");
}

if(!isset($_POST["password"]))
{
    performError(Errors::$ERROR_90."_POST[\"password\"]");
}

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

$user = new User($username,$password);
if($user->isLogged())
{
    setSessionUser($user); //set a session
    header("Location: ".Constants::$PAGE_HOME);
    exit();
}
else
{
    performError(Errors::$ERROR_10, Constants::$PAGE_LOGIN);
}