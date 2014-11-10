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

$projectId = htmlspecialchars($_GET["projectId"]);

if(!User::isStudent($user->getId()))
{
    performXmlError(Errors::$ERROR_20);
}

$errorCode = Applications::addApplication($user->getId(), $projectId);
if(!$errorCode) //error code = 0 => no error;
{
    $project = Projects::getProjectById($projectId);
    Notifications::addUserNotifications($user->getId(), Messages::$MSG_10.$project->title);
    Notifications::addUserNotifications($project->coordinatorId, $user->getLastName().Messages::$MSG_20.$project->title);
    performXmlResponse("ok");
}
else
{
    performXmlError(Errors::$ERROR_01.$errorCode." from Applications::addApplication(".$user->getId().",".$projectId.")");
}