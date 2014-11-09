<?php
    require_once 'utils.php';
    $user = getSessionUser();
    if(!$user)
    {
        performError(Errors::$ERROR_80, Constants::$PAGE_LOGIN);
    }
    //else
    if(!User::isStudent($user->getId()))
    {
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
        
        $stringData .= "</data>";
        //var_dump(htmlspecialchars($stringData));
        $data = simplexml_load_string($stringData);
        $xsl = simplexml_load_file(Constants::$XSLT_HOME);
        $xslt = new XSLTProcessor;
        $xslt->importStyleSheet($xsl);
        die($xslt->transformToXML($data));
        //var_dump($data);
        //die();
        
        /*$xsl = simplexml_load_file(Constants::$XSLT_HOME);
        $xslt = new XSLTProcessor;
        $xslt->importStyleSheet($xsl);
        die($xslt->transformToXML($notifications[0]));
        exit();*/
        /*
        $xmlString = "<errors><error><message>".$message."</message></error><goto>".$goTo."</goto></errors>";
        $errors = simplexml_load_string($xmlString);
        die($xslt->transformToXML($errors));*/
    }
    
    //$response = stripslashes(file_get_contents(Constants::$PAGE_PROJECT_HTML));
    //    echo $response;
    //case student
        //show notification area
        //show searchbox
        //show your project
        //show your application
    //case professor
        //notification
        //show searchbox
        //owned project
    