<?php
/**
 * utils
 *
 * @author Bubu D.
 * @author Leoni S.
 * @author Muresan V.
 */
require_once 'utils.php';

class Notifications
{   
    public static function getNotification($id)
    {
        global $notificationsDB;
        $notification = $notificationsDB->xpath('/notifications/notification[id="'.$id.'"]');
        if(sizeof($notification) != 1)
        {
            return null;
        }
        //else
        return $notification[0];
    }
    
    public static function getUserNotifications($userId, $unreadOnly = FALSE)
    {
        //$notificationsDB = simplexml_load_file(Constants::$NOTIFICATIONS_FILENAME);
        global $notificationsDB;
        $userNotifications = $notificationsDB->xpath('/notifications/notification[userId="'.$userId.'"]');
        if(!$unreadOnly)
        {
            return $userNotifications;
        }
        // else
        $unreadedNotification = array();
        foreach ($userNotifications as $notification)
        {
            if($notification->readed != Constants::$NOTIFICATION_READED)
            {
                array_push($unreadedNotification, $notification);
            }
        }
        return $unreadedNotification;
    }
    
    public static function addUserNotifications($userId, $message)
    {
        //$notificationsDB = simplexml_load_file(Constants::$NOTIFICATIONS_FILENAME);
        global $notificationsDB;
        //$newXml = '<<id>'.uniqid().'</id><userId>'.$userId.'</userId><message>'.$message
        //         .'</message><readed>'.Constants::$NOTIFICATION_UNREADED.'</readed>';
        $newNotification = $notificationsDB->addChild('notification');
        $newId = $newNotification->addChild('id', date('Y-m-j_H:i:s_').uniqid());
        $newUserId = $newNotification->addChild('userId', $userId);
        $newMessage = $newNotification->addChild('message', $message);
        $newReaded = $newNotification->addChild('readed', Constants::$NOTIFICATION_UNREADED);
        updateDB($notificationsDB);
    }
    
    public static function readedAllUserNotification($userId)
    {
        //$notificationsDB = simplexml_load_file(Constants::$NOTIFICATIONS_FILENAME);
        global $notificationsDB;
        $userNotifications = $notificationsDB->xpath('/notifications/notification[userId="'.$userId.'"][readed="'.Constants::$NOTIFICATION_UNREADED.'"]');
        foreach ($userNotifications as $notification)
        {
            $notification->readed = Constants::$NOTIFICATION_READED;
        }
        //$notificationsDB->saveXML(Constants::$NOTIFICATIONS_FILENAME);
        updateDB($notificationsDB);
        return 1;
    }
    
    public static function readedNotification($id)
    {
        //$notificationsDB = simplexml_load_file(Constants::$NOTIFICATIONS_FILENAME);
        global $notificationsDB;
        /*$newXml = '<<id>'.uniqid().'</id><userId>'.$userId.'</userId><message>'.$message
                 .'</message><readed>'.Constants::$NOTIFICATION_UNREADED.'</readed>';
        $newNotification = $notificationsDB->addChild('notification');
        $newId = $newNotification->addChild('id', date('Y-m-j_H:i:s_').uniqid());
        $newId = $newNotification->addChild('userId', $userId);
        $newId = $newNotification->addChild('message', $message);
        $newId = $newNotification->addChild('readed', Constants::$NOTIFICATION_UNREADED);*/
        $notification = $notificationsDB->xpath('/notifications/notification[id="'.$id.'"]');
        if(sizeof($notification) != 1)
        {
            return 1;
        }
        //else
        $notification[0]->readed = Constants::$NOTIFICATION_READED;
        //$notificationsDB->saveXML(Constants::$NOTIFICATIONS_FILENAME);
        updateDB($notificationsDB);
        return 0;
    }
}