<?php
require_once 'utils.php';

$user = getSessionUser();
if(!$user)
{
    performXmlError(Errors::$ERROR_80);
}

if(!isset($_GET["id"]))
{
    performXmlError(Errors::$ERROR_90."_GET[\"id\"]");
}

$id = htmlspecialchars($_GET["id"]);

$notification = Notifications::getNotification($id);
if(!$notification)
{
    performXmlError(Errors::$ERROR_11."malformed id parameter?");
}

if($notification->userId != $user->getId())
{
    performXmlError(Errors::$ERROR_82);
}

if(Notifications::readedNotification($id))
{
    performXmlError(Errors::$ERROR_00);
}

performXmlResponse("ok");

