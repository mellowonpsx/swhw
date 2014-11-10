<?php
require_once 'utils.php';

removeSession();

$response = stripslashes(file_get_contents(Constants::$PAGE_INDEX_HTML));
echo $response;