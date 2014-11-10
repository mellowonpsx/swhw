<?php
    require_once 'utils.php';
    $user = getSessionUser();
    if($user)
    {
        $response = stripslashes(file_get_contents(Constants::$PAGE_PROJECT_HTML));
        echo $response;
    }
    else
    {
        performError(Errors::$ERROR_80, Constants::$PAGE_LOGIN);
    }