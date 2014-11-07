<?php
/**
 * utils
 *
 * @author Bubu D.
 * @author Leoni S.
 * @author Muresan V.
 */
require_once 'utils.php';

class User
{
    private $status;
    private $id;
    private $type;
    private $email;
    private $firstName;
    private $lastName;
    private $projectId;
    
    public function __construct($username = NULL, $password = NULL)
    {
        if(!isset($username) || !isset($password))
        {
            $this->status = Constants::$USER_NOT_LOGGED;
            return;
        }
        $xmlDB = simplexml_load_file(Constants::$USERS_FILENAME);
        $result = $xmlDB->xpath('/users/user[email="'.$username.'"][password="'.sha1($password).'"]');
        if(sizeof($result) < 1) //if is less than 1 username or password are wrong, if is more, there will be a problem!
        {
            $this->status = Constants::$USER_NOT_LOGGED;
            return;
        }
        //else
        $user = $result[0];
        //$this->user = $user;
        $this->id = $user->id->__toString();
        $this->type = $user->type->__toString();
        $this->email = $user->email->__toString();
        $this->firstName = $user->firstName->__toString();        
        $this->lastName = $user->lastName->__toString();        
        $this->type = $user->type->__toString();
        if($this->type === Constants::$USER_TYPE_STUDENT)
        {
            $this->projectId = $user->projectId->__toString();
        }
        $this->status = Constants::$USER_LOGGED;
        return;
    }
    
    public function isLogged()
    {
        if($this->status === Constants::$USER_LOGGED)
        {
            return true;
        }
        return false;
    }
    
    /*public function isAdmin()
    {
        if($this->status === BD_USER_LOGGED && $this->getType() === BD_USER_TYPE_ADMIN)
        {
            return true;
        }
        return false;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getUserId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getSurname()
    {
        return $this->surname;
    }
    
    public function getMail()
    {
        return $this->mail;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function toArray()
    {
        $data_array = array();
        $data_array["status"] = $this->status;
        if($this->isLogged())
        {
            $data_array["id"] = $this->id;
            $data_array["user"] = $this->username;
            $data_array["name"] = $this->name;
            $data_array["surname"] = $this->surname;
            $data_array["mail"] = $this->mail;
            $data_array["type"] = $this->type;
        }
        return $data_array;
    }
    
    public function toJson()
    {
        return json_encode($this->toArray());
    }
    
    public static function logoutStatus()
    {
        return BD_USER_UNLOGGED;
    }
    
    public static function getUsernameById($userId)
    {
        global $db;
        $query = "SELECT id, username FROM User WHERE id = '$userId'";
        $result = $db->query($query);
        // max one row cause username is unique
        $row = mysqli_fetch_assoc($result);
        if(!$row)
        {
            return BD_USER_NOT_EXIST;
        }
        return $row["username"];
    }    */
}