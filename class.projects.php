<?php
/**
 * utils
 *
 * @author Bubu D.
 * @author Leoni S.
 * @author Muresan V.
 */
require_once 'utils.php';

class Projects
{   
    public static function listAllProjects()
    {
        //$projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        global $projectsDB;
        $projects = array();
        foreach ($projectsDB as $project)
        {
            array_push($projects, $project);
        }
        return $projects;
    }
    
    public static function listAviableProjects()
    {
        //$projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        global $projectsDB;
        $projectsAvailable = array();
        foreach ($projectsDB as $project)
        {
            if(Projects::projectUsedSpot($project->id) < $project->maxNumberOfStudent)
            {
                array_push($projectsAvailable, $project);
            }
        }
        return $projectsAvailable;
    }
    
    public static function listAllCoordinatorProjects($userId)
    {
        global $projectsDB;
        $projectsCoordinated = $projectsDB->xpath('/projects/project[coordinatorId = "'.$userId.'"]');
        return $projectsCoordinated;
    }
    
    public static function projectUsedSpot($projectId)
    {
        //$usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
        global $usersDB;
        $projectUsers = $usersDB->xpath('/users/user[projectId="'.$projectId.'"]');
        $userNumber = sizeof($projectUsers);
        return $userNumber;
    }
    
    public static function projectFreeSpot($projectId)
    {
        //$projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        global $projectsDB;
        $result = $projectsDB->xpath('/projects/project[id = "'.$projectId.'"]');
        if(sizeof($result) != 1)
        {
            return 0;
        }
        //else
        $project = $result[0];
        $freeSpot = $project->maxNumberOfStudent-Projects::projectUsedSpot($projectId);
        return $freeSpot;
    }
    
    public static function addUserToProject($projectId, $userId)
    {
        //$projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        global $projectsDB;
        //$usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
        global $usersDB;
        if(!Projects::projectFreeSpot($projectId)) // 0 freespot
        {
            return 1;
        }
        $user = User::getUserById($userId);
        if(!$user)
        {
            return 2;
        }
        //else
        if(!User::isStudent($userId))
        {
            return 3;
        }
        //else
        $user->projectId = $projectId;
        //$usersDB->saveXML(Constants::$USERS_FILENAME);
        updateDB($usersDB);
        return 0;
    }
    
    public static function removeUserFromProject($projectId, $userId)
    {
        //$projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        global $projectsDB;
        //$usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
        global $usersDB;
        $user = User::getUserById($userId);
        if(!$user)
        {
            return 2;
        }
        //else
        if($user->type != Constants::$USER_TYPE_STUDENT)
        {
            return 3;
        }
        //else
        $user->projectId = Constants::$USERS_NOPROJECT;
        //$usersDB->saveXML(Constants::$USERS_FILENAME);
        updateDB($usersDB);
        return 0;
    }
}