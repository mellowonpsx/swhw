<?php
/**
 * utils
 *
 * @author Bubu D.
 * @author Leoni S.
 * @author Muresan V.
 */

// global variables and includes
$usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
$projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
$notificationsDB = simplexml_load_file(Constants::$NOTIFICATIONS_FILENAME);
$applicationsDB = simplexml_load_file(Constants::$APPLICATIONS_FILENAME);

function updateDB($DB)
{
    global $usersDB;
    global $projectsDB;
    global $notificationsDB;
    global $applicationsDB;
    
    if($DB == $usersDB)
    {
        $usersDB->saveXML(Constants::$USERS_FILENAME);
        return;
    }
    if($DB == $projectsDB)
    {
        $projectsDB->saveXML(Constants::$PROJECTS_FILENAME);
        return;
    }
    if($DB == $notificationsDB)
    {
        $notificationsDB->saveXML(Constants::$NOTIFICATIONS_FILENAME);
        return;
    }
    if($DB == $applicationsDB)
    {
        $applicationsDB->saveXML(Constants::$APPLICATIONS_FILENAME);
        return;
    }
}

//start ob to prevent error output in json project
//ob_start(); //disable_for_test

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

function getSessionUser()
{
    $sessionId = session_id(); 
    if(empty($sessionId))
    {
        session_start() or performError("Could not start session");
    }
    if(isset($_SESSION["user"]))
    {
        $user = $_SESSION["user"];
        $user->update();
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
        session_start() or performError("Could not start session");
    }
    $user->update();
    $_SESSION["user"] = $user;
}

function removeSession()
{
    $sessionId = session_id(); 
    if(empty($sessionId))
    {
        session_start() or performError("Could not start session");
    }
    $_SESSION["user"] = NULL;
    session_destroy();
}

function performError($message, $goTo = null)
{
    $xsl = simplexml_load_file(Constants::$XSLT_ERROR);
    $xslt = new XSLTProcessor;
    $xslt->importStyleSheet($xsl);
    if(!$goTo)
    {
        $goTo = Constants::$PAGE_INDEX_HTML;
    }
    $xmlString = "<errors><error><message>".$message."</message></error><goto>".$goTo."</goto></errors>";
    $errors = simplexml_load_string($xmlString);
    die($xslt->transformToXML($errors));
}

function performXmlError($message)
{
    $xmlString = "<response><status>false</status><error>".$message."</error></response>";    
    $errors = simplexml_load_string($xmlString);
    die($errors->asXML());
}

function performXmlResponse($message)
{
    $xmlString = "<response><status>true</status><data>".$message."</data></response>";    
    $response = simplexml_load_string($xmlString);
    die($response->asXML());
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

//$user = getSessionUser();