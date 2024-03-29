<?php
/**
 * utils
 *
 * @author Bubu D.
 * @author Leoni S.
 * @author Muresan V.
 */
require_once 'utils.php';

class Applications
{   
    public static function applicationExist($userId, $projectId)
    {
        global $applicationsDB;
        $application = $applicationsDB->xpath('/applications/application[studentId="'.$userId.'"][projectId="'.$projectId.'"]');
        return sizeof($application); //0 not exist, 1 exist
    }
    
    public static function getApplication($userId, $projectId)
    {
        global $applicationsDB;
        $application = $applicationsDB->xpath('/applications/application[studentId="'.$userId.'"][projectId="'.$projectId.'"]');
        if(sizeof($application) != 1)
        {
            return null;
        }
        return $application[0];
    }
    
    public static function listUserApplication($studentId)
    {
        global $applicationsDB;
        $applications = $applicationsDB->xpath('/applications/application[studentId="'.$studentId.'"]');
        return $applications;
    }
    
    public static function listProjectApplication($projectId)
    {
        global $applicationsDB;
        $applications = $applicationsDB->xpath('/applications/application[projectId="'.$projectId.'"]');
        return $applications;
    }
    
    public static function numberApplication($projectId)
    {
        return sizeof(Applications::listProjectApplication($projectId));
    }
    
    public static function addApplication($userId, $projectId)
    {
        if(Applications::applicationExist($userId, $projectId))
        {
            return 1; //already exist application
        }
        //else
        if(!User::userExist($userId))
        {
            return 2; //exist user
        }
        if(!Projects::projectFreeSpot($projectId)) // 0 freespot
        {
            return 3; //not eneught project slot or project not exist
        }
        global $applicationsDB;
        $newApplication = $applicationsDB->addChild('application');
        $newStudentId =  $newApplication->addChild('studentId',$userId);
        $newProjectId =  $newApplication->addChild('projectId',$projectId);
        updateDB($applicationsDB);
        return 0;
    }
    
    public static function removeApplication($userId, $projectId)
    {
        global $applicationsDB;
        $application = Applications::getApplication($userId, $projectId);
        if(!$application)
        {
            return 1; //not exist
        }
        //else
        global $applicationsDB;
        unset($application[0]); //unset the fist element!
        updateDB($applicationsDB);
        return 0;
    }
    
    public static function removeAllUserApplication($userId)
    {
        $applications = Applications::listUserApplication($userId);
        $errors = 0;
        foreach ($applications as $application)
        {
            $project = Projects::getProjectById($application->projectId);
            $student = User::getUserById($application->studentId);
            if($project&&$student) //both not null
            {
                Notifications::addUserNotifications($project->coordinatorId, $student->lastName.Messages::$MSG_24.$project->title);
                $errors += Applications::removeApplication($application->studentId, $application->projectId);
            }
        }
        return $errors;
    }
    
    public static function removeAllProjectApplication($projectId)
    {
        $applications = Applications::listProjectApplication($projectId);
        $errors = 0;
        foreach ($applications as $application)
        {
            //advice all the student
            $project = Projects::getProjectById($application->projectId);
            if($project)
            {
                Notifications::addUserNotifications($application->studentId, Messages::$MSG_13.$project->title);
                $errors += Applications::removeApplication($application->studentId, $application->projectId);
            }
        }
        return $errors;
    }
}