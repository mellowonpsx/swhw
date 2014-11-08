<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'utils.php';
            $user = getSessionUser();
            if($user)
            {
                var_dump(Applications::listProjectApplication("0"));
                //var_dump(Applications::listProjectApplication("10"));
                //Applications::removeAllProjectApplication("10");
                //var_dump(Applications::listProjectApplication("10"));
                //var_dump(Applications::listUserApplication("10"));
                //Applications::removeAllUserApplication("10");
                //var_dump(Applications::listUserApplication("10"));
                /*var_dump(Applications::listUserApplication("10"));
                echo "<br /><br /><br /><br />";
                echo Applications::removeApplication("10", "10");
                echo "<br /><br /><br /><br />";
                var_dump(Applications::listUserApplication("10"));*/
                /*var_dump(Projects::listAllProjects());
                echo "<br /><br /><br /><br />";
                var_dump(Projects::listAviableProjects());
                echo "<br /><br /><br /><br />";
                var_dump(User::getUserById($user->getId()));
                echo "<br /><br /><br /><br />";
                echo Projects::addUserToProject("0", $user->getId());
                echo "<br /><br /><br /><br />";
                var_dump(User::getUserById($user->getId()));
                echo "<br /><br /><br /><br />";
                var_dump(Projects::listAllProjects());
                echo "<br /><br /><br /><br />";
                var_dump(Projects::listAviableProjects());
                echo "<br /><br /><br /><br />";
                //echo Projects::removeUserFromProject("0", $user->getId());
                echo "<br /><br /><br /><br />";
                //var_dump(User::getUserById($user->getId()));*/
                //echo "<br /><br /><br /><br />";
                //echo Projects::removeUserFromProject("0", $user->getId());
                //echo "<br /><br /><br /><br />";
                //var_dump(User::getUserById($user->getId()));*/
                
                /*var_dump(Notifications::getUserNotifications($user->getId()));
                echo "<br /><br /><br /><br />";
                var_dump(Notifications::getUserNotifications($user->getId(), true));
                echo "<br /><br /><br /><br />";
                //Notifications::readedNotification("545d166e3ebd5");
                Notifications::readedAllUserNotification($user->getId());
                echo "<br /><br /><br /><br />";
                var_dump(Notifications::getUserNotifications($user->getId(), true));*/
            }
            else
            {
                echo "you are not logged";
            }
        ?>
    </body>
</html>