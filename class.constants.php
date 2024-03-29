<?php
/**
 * utils
 *
 * @author Bubu D.
 * @author Leoni S.
 * @author Muresan V.
 */
require_once 'utils.php';

class Constants
{
    public static $USERS_FILENAME = "xml/users.xml";
    public static $PROJECTS_FILENAME = "xml/projects.xml";
    public static $NOTIFICATIONS_FILENAME = "xml/notifications.xml";
    public static $APPLICATIONS_FILENAME = "xml/applications.xml";
    
    public static $NOTIFICATION_READED = "readed";
    public static $NOTIFICATION_UNREADED = "unreaded";
    
    public static $USER_NOT_LOGGED = "USER_NOT_LOGGED";
    public static $USER_LOGGED = "USER_LOGGED";
    public static $USER_UNLOGGED = "USER_UNLOGGED";
    public static $USER_DATA_NOT_SET = "DATA_NOT_SET";
    public static $USER_NOT_EXIST = "USER_NOT_EXIST";
   
    public static $USER_TYPE_STUDENT = "Student";
    public static $USER_TYPE_COORDINATOR = "Coordinator";
    public static $USERS_NOPROJECT = "-1";
    
    public static $PAGE_LOGIN = "login.php";
    public static $PAGE_HOME = "home.php";
    
    public static $XSLT_ERROR = "xsl/error.xsl";
    public static $XSLT_HOME = "xsl/home.xsl";
    public static $XSLT_PROJECTS_LIST = "xsl/projects.xsl";
    public static $XSLT_PROJECT = "xsl/project.xsl";
    //public static $XSLT_COORDINATOR_HOME = "xsl/coordinatorHome.xsl";
    
    public static $PAGE_LOGIN_HTML = "login.html";
    public static $PAGE_ABOUT_HTML = "about.html";
    public static $PAGE_INDEX_HTML = "index.html";
    public static $PAGE_PROJECT_HTML = "projects.html";
    public static $PAGE_SHOW_PROJECT = "showProject.php"; //showProject.php?id=0
    
    /*
     * //document
//status
define("BD_DOCUMENT_EMPTY", "BD_DOCUMENT_EMPTY");
define("BD_DOCUMENT_CHANGED", "BD_DOCUMENT_CHANGED");
define("BD_DOCUMENT_UNCHENGED", "BD_DOCUMENT_UNCHENGED");
//document type
define("BD_DOCUMENT_TYPE_UNKNOW", "UNKNOWN");
define("BD_DOCUMENT_TYPE_OTHER", "OTHER");
define("BD_DOCUMENT_TYPE_DOCUMENT", "DOCUMENT");
define("BD_DOCUMENT_TYPE_PHOTO", "PHOTO");
define("BD_DOCUMENT_TYPE_AUDIO", "AUDIO");
define("BD_DOCUMENT_TYPE_VIDEO", "VIDEO");
define("BD_DOCUMENT_TYPE_ARCHIVE", "ARCHIVE");
//default constrains
define("BD_DOCUMENT_DEFAULT_NAME", "NEW UNNAMED DOCUMENT");
define("BD_DOCUMENT_DEFAULT_TYPE", BD_DOCUMENT_TYPE_UNKNOW);

//user
//status
define("BD_USER_NOT_LOGGED", "BD_USER_NOT_LOGGED");
define("BD_USER_LOGGED", "BD_USER_LOGGED");
define("BD_USER_UNLOGGED", "BD_USER_UNLOGGED");
define("BD_USER_DATA_NOT_SET", "DATA_NOT_SET");
define("BD_USER_NOT_EXIST", "USER_NOT_EXIST");
//user type
define("BD_USER_TYPE_ADMIN", "ADMIN");
define("BD_USER_TYPE_USER", "USER");

     */
}
