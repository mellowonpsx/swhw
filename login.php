<?php
require_once 'utils.php';
$user = getSessionUser();
if($user)
{
    //performError(Errors::$ERROR_81, Constants::$PAGE_INDEX_PHP);
    header("Location: ".Constants::$PAGE_HOME);
    exit();
}
else
{
    $response = stripslashes(file_get_contents(Constants::$PAGE_LOGIN_HTML));
    echo $response;
}