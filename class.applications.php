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
        //check if user is student is useless
        $application = $applicationsDB->xpath('/applications/application[studentId="'.$userId.'"][projectId="'.$projectId.'"]');
        return sizeof($application); //0 not exist, 1 exist
    }
    
    public static function getUserApplication($userId)
    {
        global $applicationsDB;
        $applications = $applicationsDB->xpath('/applications/application[studentId="'.$userId.'"]');
        return $applications;
    }
    
    public static function addApplication($userId, $projectId)
    {
        if(Applications::applicationExist($userId, $projectId))
        {
            return 1;
        }
        //else
        global $applicationsDB;
        $newApplication = $applicationsDB->addChild('application');
        $newStudentId = 
        $newNotification = $notificationsDB->addChild('notification');
        $newId = $newNotification->addChild('id', date('Y-m-j_H:i:s_').uniqid());
        $newId = $newNotification->addChild('userId', $userId);
        $newId = $newNotification->addChild('message', $message);
        $newId = $newNotification->addChild('readed', Constants::$NOTIFICATION_UNREADED);
        $notificationsDB->saveXML(Constants::$NOTIFICATIONS_FILENAME);
            
    }
    
    public static function removeUserApplication($userId)
    {
        
    }
}