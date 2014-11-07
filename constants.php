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
    static public $USERS_FILENAME = "xml/users.xml";
    static public $PROJECTS_FILENAME = "xml/projects.xml";
    
    static public $USER_NOT_LOGGED = "USER_NOT_LOGGED";
    static public $USER_LOGGED = "USER_LOGGED";
    static public $USER_UNLOGGED = "USER_UNLOGGED";
    static public $USER_DATA_NOT_SET = "DATA_NOT_SET";
    static public $USER_NOT_EXIST = "USER_NOT_EXIST";
    static public $USER_TYPE_STUDENT = "Student";
    static public $USER_TYPE_PROFESSOR = "Coordinator";
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