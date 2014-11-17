<?php
require_once 'utils.php';
$user = getSessionUser();
if($user)
{
    $response = stripslashes(file_get_contents(Constants::$PAGE_ABOUT_HTML));
    echo $response;
    exit();
}
else
{
    performError(Errors::$ERROR_80, Constants::$PAGE_LOGIN);
}