<?php
require_once 'utils.php';

$user = getSessionUser();
if(!$user)
{
    performXmlError(Errors::$ERROR_80);
}

if(!isset($_GET["projectId"]))
{
    performXmlError(Errors::$ERROR_90."_GET[\"projectId\"]");
}

if(!isset($_GET["studentId"]))
{
    performXmlError(Errors::$ERROR_90."_GET[\"studentId\"]");
}

$projectId = htmlspecialchars($_GET["projectId"]);
$studentId = htmlspecialchars($_GET["studentId"]);

$project = Projects::getProjectById($projectId);
$student = User::getUserById($studentId);

if(!$project || !$student)
{
    performXmlError(Errors::$ERROR_11);
}

if(User::isStudent($user->getId()))
{
    performXmlError(Errors::$ERROR_20);
}

if($project->coordinatorId != $user->getId())
{
    performXmlError(Errors::$ERROR_21);
}

if(!Applications::applicationExist($student->id, $project->id))
{
    performXmlError(Errors::$ERROR_11);
}

$errorCode = Projects::addUserToProject($project->id, $student->id);
if(!$errorCode) //error code = 0 => no error;
{
    Applications::removeApplication($student->id, $project->id);
    Notifications::addUserNotifications($student->id, $user->getLastName().Messages::$MSG_12.$project->title);
    Notifications::addUserNotifications($project->coordinatorId, Messages::$MSG_22.$student->lastName);
    //remove application to all other project
    Applications::removeAllUserApplication($student->id); //automatic professor notification inside
    Notifications::addUserNotifications($student->id, Messages::$MSG_14);
    // check if full
    $freeSpot = Projects::projectFreeSpot($project->id);
    if(!$freeSpot) //all slot used
    {
        //remove application from all other student
        Applications::removeAllProjectApplication($project->id); //automatic student notification inside
        //advice professor
        Notifications::addUserNotifications($project->coordinatorId, Messages::$MSG_23.$project->title);
    }
    performXmlResponse("ok");
}
else
{
    performXmlError(Errors::$ERROR_01.$errorCode." from Applications::removeApplication(".$student->id.",".$project->id.")");
}