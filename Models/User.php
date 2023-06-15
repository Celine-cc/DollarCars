
<?php

include_once __DIR__ . "/indexHome.php";

use PDO;
namespace User;


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
        $dbh = new PDO("mysql:dbname=dollarcars;host=127.0.0.1;port=8889", "root", "root");

        $query = $dbh ->query("SELECT * FROM users");

        $query->execute(array(
            ":id" => $this->id, 
            ":username" => $this->username, 
            ":password" => $this->password, 
            ":email" => $this->email));

   
    }


}



