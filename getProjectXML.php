<?php
require_once 'utils.php';

//check if user is logged or not
$user = getSessionUser();
if(!$user)
{
    performError("You are not logged in");
    return 1;
}
