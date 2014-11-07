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
    public static function listProjects()
    {
        $xmlDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        return $xmlDB;
    }
    
    public static function listAviableProjects()
    {
        $usersDB = simplexml_load_file(Constants::$USERS_FILENAME);
        $projectsDB = simplexml_load_file(Constants::$PROJECTS_FILENAME);
        $projectsAvailable = array();
        foreach ($projectsDB as $project)
        {
            $result = $usersDB->xpath('/users/user[projectId="'.$project->id.'"]');
            if(sizeof($result) < $project->maxNumberOfStudent)
            {
                array_push($projectsAvailable, $project);
            }
        }
        return $projectsAvailable;
    }
}