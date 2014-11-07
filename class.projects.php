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
        return $projectsDB;
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
            return 0;
        }
        //else
        $project = $result[0];
        $freeSpot = $project->maxNumberOfStudent-Projects::projectUsedSpot($projectId);
        return $freeSpot;
    }
    
    public static function addUserToProject($projectId, $userId)
    {
        
    }
    
    public static function removeUserFromProject($projectId, $userId)
    {
        
    }
}