
<?php

include_once __DIR__ . "/indexHome.php";
include_once __DIR__ . "/.../models/Database.php";



namespace Models;


class User
{
    protected int $id;
    protected string $username;
    protected string $password;
    protected string $email;

    public function __construct($id, $username, $password, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }



    public function getId(){
        return $this->id;
    }


    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username ){
        if ($username != ""){
            $this->username = $username;
        }
    }
    public function getPassword(){
        return $this->password;
    }

    public function setPassWord($password ){
        if ($password != ""){
            $this->password = $password;
        }
    }
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email ){
        if ($email != ""){
            $this->email = $email;
        }
    }

    public function setPDO()
    {

        $dbh = DataBase ::createDBConnection();
        $query = $dbh ->query("SELECT * FROM users");

        $query->execute(array(
            ":id" => $this->id, 
            ":username" => $this->username, 
            ":password" => $this->password, 
            ":email" => $this->email));

   
    }


}



