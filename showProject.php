<?php
require_once 'utils.php';
$user = getSessionUser();
if(!$user)
{
    performError(Errors::$ERROR_80, Constants::$PAGE_LOGIN);
}

$previousPage = Constants::$PAGE_HOME;
if(isset($_SERVER['HTTP_REFERER']))
{
    $previousPage = $_SERVER['HTTP_REFERER'];    
}

if(!isset($_GET["id"]))
{
    performError(Errors::$ERROR_90."_GET[\"id\"]", $previousPage);
}

$id = htmlspecialchars($_GET["id"]);
$project = Projects::getProjectById($id);
if(!$project)
{
    performError(Errors::$ERROR_11."if you get here with a link, please contact the administrator", $previousPage);
}

//else
$stringData = "<data>\n";
$stringData .= "<projects>\n";
$stringData .= "<project>\n";
$stringData .= "<id>".$project->id."</id>\n";
//show more information about coordinator?
$coordinator = User::getUserById($project->coordinatorId);
$stringData .= "<coordinator>".$coordinator->lastName.", ".$coordinator->firstName."</coordinator>\n";
// end show coordinator
$stringData .= "<title>".$project->title."</title>\n";
$stringData .= "<description>".$project->description."</description>\n";
foreach($project->keyword as $keyword)
{
    $stringData .= "<keyword>".$keyword."</keyword>\n";
}
$stringData .= "<numberOfStudent>".Projects::projectUsedSpot($project->id)."</numberOfStudent>\n";
$stringData .= "<maxNumberOfStudent>".$project->maxNumberOfStudent."</maxNumberOfStudent>\n";
$stringData .= "<numberOfApplication>".Applications::numberApplication($project->id)."</numberOfApplication>\n";
$freeSpot = Projects::projectFreeSpot($project->id);
if($freeSpot) // != 0
{
    $stringData .= "<projectAvailable />\n";    
}
$stringData .= "</project>\n";
$stringData .= "</projects>\n";
$stringData .= "</data>";
//var_dump(htmlspecialchars($stringData));
$data = simplexml_load_string($stringData);
$xsl = simplexml_load_file(Constants::$XSLT_HOME);
$xslt = new XSLTProcessor;
$xslt->importStyleSheet($xsl);
die($xslt->transformToXML($data));