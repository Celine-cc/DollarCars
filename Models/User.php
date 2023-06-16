<?php

namespace Models;

include_once __DIR__ . "/../Models/Database.php";

use Models\Database;
use PDO;


class User
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $dbh;

    public function __construct($id, $nom, $prenom, $email, $password, $dbh)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->dbh = $dbh;
    }

    public function getId()
    {
        return $this->id;
    }



    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        if ($nom != "") {
            $this->nom = $nom;
        }
    }
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        if ($prenom != "") {
            $this->prenom = $prenom;
        }
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if ($email != "") {
            $this->email = $email;
        }
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassWord($password)
    {
        if ($password != "") {
            $this->password = $password;
        }
    }



    public function setPDO()
    {

        $dbh = DataBase::createDBConnection();
        $query = $dbh->query("SELECT * FROM users WHERE password = :password ");

        $query->execute(array(
            ":password" => $this->password,
        ));
    }

    public function createcompte()
    {


        $dbh = DataBase::createDBConnection();
        $crea = $dbh->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?,?,?,?)");
        return $crea->execute([$this->nom, $this->prenom, $this->email, $this->password]);
    }


    public function fetchSauv($dbh)
    {
        $requery = $dbh->query("SELECT * FROM users");
        $requery->execute();

        $contact = [];

        if (is_a($requery, "PDOStatement")) {
            $sauvegarde = $requery->fetchsauvegarde(PDO::FETCH_ASSOC);

            foreach ($sauvegarde as $sauv) {
                array_push($contact, new User(
                    $sauv['id'],
                    $sauv['dbh'],
                    $sauv['nom'],
                    $sauv['prenom'],
                    $sauv['email'],
                    $sauv['password']

                ));
            }
            return $contact;
        }
    }
}
