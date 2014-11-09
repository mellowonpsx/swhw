<?php
require_once 'utils.php';

//check if user is logged or not
$user = getSessionUser();
if(!$user)
{
    performError(Errors::$ERROR_90."");
    return 1;
}
//else
if(!isset($_GET["projectId"]))
{
    performError(Errors::$ERROR_90."_GET[\"projectId\"]");
}