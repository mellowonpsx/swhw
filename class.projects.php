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
        $projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        $projects = array();
        foreach ($projectsDB as $project)
        {
            array_push($projectsAvailable, $project);
        }
        return $projects;
    }
    
    public static function listAviableProjects()
    {
        $projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        $projectsAvailable = array();
        foreach ($projectsDB as $project)
        {
            if(Projects::projectUsedSpot($projectId) < $project->maxNumberOfStudent)
            {
                array_push($projectsAvailable, $project);
            }
        }
        return $projectsAvailable;
    }
    
    public static function projectUsedSpot($projectId)
    {
        $usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
        $projectUsers = $usersDB->xpath('/users/user[projectId="'.$projectId.'"]');
        $userNumber = sizeof($projectUsers);
        return $userNumber;
    }
    
    public static function projectFreeSpot($projectId)
    {
        $projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        $result = $projectsDB->xpath('/projects/project[id = "'.$projectId.'"]');
        if(sizeof($result) != 0)
        {
            return null;
        }
        //else
        $project = $result[0];
        $freeSpot = $project->maxNumberOfStudent-Projects::projectUsedSpot($projectId);
        return $freeSpot;
    }
    
    public static function addUserToProject($projectId, $userId)
    {
        $projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        $usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
        if(!Projects::projectUsedSpot($projectId)) // 0 freespot
        {
            return 1;
        }
        //else
        $result = $usersDB->xpath('/users/user[id="'.$userId.'"]');
        if(sizeof($result) != 1)
        {
            return 2;
        }
        //else
        $user = $result[0];
        if($user->type != Constants::$USER_TYPE_STUDENT)
        {
            return 3;
        }
        //else
        $user->projectId = $projectId;
        $usersDB->saveXML(Constants::$USERS_FILENAME);
        return 0;
    }
    
    public static function removeUserFromProject($projectId, $userId)
    {
        $projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        $usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
        $result = $usersDB->xpath('/users/user[id="'.$userId.'"]');
        if(sizeof($result) != 1)
        {
            return 2;
        }
        //else
        $user = $result[0];
        if($user->type != Constants::$USER_TYPE_STUDENT)
        {
            return 3;
        }
        //else
        $user->projectId = Constants::$USERS_NOPROJECT;
        $usersDB->saveXML(Constants::$USERS_FILENAME);
        return 0;
    }
}