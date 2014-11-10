<?php
require_once 'utils.php';
$user = getSessionUser();
if(!$user)
{
    performError(Errors::$ERROR_80, Constants::$PAGE_LOGIN);
}
//else
$stringData = "<data>\n";
$notifications = Notifications::getUserNotifications($user->getId(), TRUE);
if($notifications) //more than one message
{
    $stringData .= "<notifications>\n";
    foreach($notifications as $notification)
    {
        $stringData .= "<notification>\n";
        $stringData .= "<id>".$notification->id."</id>\n";
        $stringData .= "<message>".$notification->message."</message>\n";
        $stringData .= "</notification>\n";
    }
    $stringData .= "</notifications>\n";
}

if(User::isStudent($user->getId()))
{
    $studentProject = Projects::getUserProject($user->getId());
    if($studentProject)
    {
        $stringData .= "<studentProject>\n";
        $stringData .= "<project>\n";
        $stringData .= "<id>".$studentProject->id."</id>\n";
        //show more information about coordinator?
        $coordinator = User::getUserById($project->coordinatorId);
        $stringData .= "<coordinator>".$coordinator->lastName."</coordinator>\n";
        // end show coordinator
        $stringData .= "<title>".$studentProject->title."</title>\n";
        $stringData .= "<description>".$studentProject->description."</description>\n";
        foreach($studentProject->keyword as $keyword)
        {
            $stringData .= "<keyword>".$keyword."</keyword>\n";
        }
        $stringData .= "<numberOfStudent>".Projects::projectUsedSpot($studentProject->id)."</numberOfStudent>\n";
        $stringData .= "<maxNumberOfStudent>".$studentProject->maxNumberOfStudent."</maxNumberOfStudent>\n";
        $stringData .= "<numberOfApplication>".Applications::numberApplication($studentProject->id)."</numberOfApplication>\n";
        $stringData .= "</project>\n";
        $stringData .= "</studentProject>\n";
    }
    //application
    $studentApplications = Applications::listUserApplication($user->getId());
    if($studentApplications)
    {
        $stringData .= "<studentApplications>\n";
        foreach($studentApplications as $application)
        {
            $project = Projects::getProjectById($application->projectId);
            $stringData .= "<project>\n";
            $stringData .= "<id>".$project->id."</id>\n";
            //show more information about coordinator?
            $coordinator = User::getUserById($project->coordinatorId);
            $stringData .= "<coordinator>".$coordinator->lastName."</coordinator>\n";
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
            $stringData .= "</project>\n";
        }
        $stringData .= "</studentApplications>\n";
    }
    
}
else//!User::isStudent($user->getId()))
{
    $projects = Projects::listAllCoordinatorProjects($user->getId());
    if($projects)
    {
        $stringData .= "<projects>\n";
        foreach($projects as $project)
        {
            $stringData .= "<project>\n";
            $stringData .= "<id>".$project->id."</id>\n";
            $stringData .= "<title>".$project->title."</title>\n";
            $stringData .= "<description>".$project->description."</description>\n";
            foreach($project->keyword as $keyword)
            {
                $stringData .= "<keyword>".$keyword."</keyword>\n";
            }
            $stringData .= "<numberOfStudent>".Projects::projectUsedSpot($project->id)."</numberOfStudent>\n";
            $stringData .= "<maxNumberOfStudent>".$project->maxNumberOfStudent."</maxNumberOfStudent>\n";
            $stringData .= "<numberOfApplication>".Applications::numberApplication($project->id)."</numberOfApplication>\n";
            $stringData .= "</project>\n";
        }
        $stringData .= "</projects>\n";
    }
}
$stringData .= "</data>";
//var_dump(htmlspecialchars($stringData));
$data = simplexml_load_string($stringData);
$xsl = simplexml_load_file(Constants::$XSLT_HOME);
$xslt = new XSLTProcessor;
$xslt->importStyleSheet($xsl);
die($xslt->transformToXML($data));

//case student
    //notification area
    //searchbox
    //your project OR
    //your applications
//case professor
    //notification
    //show searchbox
    //owned projects
