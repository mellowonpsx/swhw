<?php
require_once 'utils.php';

//check if user is logged or not
$user = getSessionUser();
if(!$user)
{
    die(Errors::$ERROR_90."");
    return 1;
}
//else
if(!isset($_GET["projectId"]))
{
    die(Errors::$ERROR_90."_GET[\"projectId\"]");
}



/*
require_once 'utils.php';

if(!isset($_POST["username"]))
{
    die(Errors::$ERROR_90."_POST[\"username\"]");
}

if(!isset($_POST["password"]))
{
    die(Errors::$ERROR_90."_POST[\"username\"]");
}

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

$user = new User($username,$password);
if($user->isLogged())
{
    setSessionUser($user); //set a session
    echo "logged"; //to do
}
else
{
    die(Errors::$ERROR_10);
}*/