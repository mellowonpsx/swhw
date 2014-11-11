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

$errorCode = Applications::removeApplication($student->id, $project->id);
if(!$errorCode) //error code = 0 => no error;
{
    Notifications::addUserNotifications($student->id, $user->getLastName().Messages::$MSG_11.$project->title);
    Notifications::addUserNotifications($project->coordinatorId, Messages::$MSG_21.$student->lastName);
    performXmlResponse("ok");
}
else
{
    performXmlError(Errors::$ERROR_01.$errorCode." from Applications::removeApplication(".$student->id.",".$project->id.")");
}