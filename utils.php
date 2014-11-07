<?php
/**
 * utils
 *
 * @author Bubu D.
 * @author Leoni S.
 * @author Muresan V.
 */
error_reporting(E_ALL); //test error reporting
function __autoload($classname)
{
    $filename =  strtolower("class.$classname.php");
    if(file_exists($filename))
    {
        require_once $filename;
    }
    else
    {
        $filename =  strtolower("class/class.$classname.php");
        require_once $filename;
    }
}

require_once 'constants.php';
require_once 'errors.php';

//start ob to prevent error output
//ob_start(); //disable_for_test

function getSessionUser()
{
    $sessionId = session_id(); 
    if(empty($sessionId))
    {
        session_start() or die("Could not start session");
    }
    if(isset($_SESSION["user"]))
    {
        $user = $_SESSION["user"];
    }
    else
    {
        $user = NULL;
    }
    return $user;
}

function setSessionUser($user)
{
    $sessionId = session_id(); 
    if(empty($sessionId))
    {
        session_start() or die("Could not start session");
    }
    $_SESSION["user"] = $user;
}

function removeSession()
{
    $sessionId = session_id(); 
    if(empty($sessionId))
    {
        session_start() or die("Could not start session");
    }
    $_SESSION["user"] = NULL;
    session_destroy();
}

/*function objectToArray($obj)
{
    if(is_object($obj)) $obj = (array) $obj;
    if(is_array($obj))
    {
        $new = array();
        foreach($obj as $key => $val)
        {
            $new[$key] = objectToArray($val);
        }
    }
    else $new = $obj;
    return $new;
}

function json_error($message)
{
    $result_array = array();
    $result_array["status"] = "false";
    $result_array["error"] = $message;
    ob_end_clean();
    echo json_encode($result_array);
    exit();
}

function json_ok($json_data = NULL)
{
    $result_array = array();
    $result_array["status"] = "true";
    if($json_data !== NULL)
    {
        $result_array["data"] = $json_data;
    }
    ob_end_clean();
    echo json_encode($result_array);
    exit();
}

function document_error($data = NULL)
{
    ob_end_clean();
    global $config;
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"".basename($config->getParam("defaultErrorFilename"))."\"");
    echo $data;
    exit();
}
*/

$user = getSessionUser();