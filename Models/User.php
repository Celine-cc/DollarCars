<?php

namespace Models;

include_once __DIR__ . "/../Models/Database.php";

use Models\Database;
use PDO;
use SessionHandler;

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
        $crea2 = $crea->execute([$this->nom, $this->prenom, $this->email, $this->password]);

        if ($crea2) {
            if ($crea->rowCount() > 0) {
                header("Refresh:0; url=indexHome.php");
            }
        }
    }


    public function login($dbh)
    {
        if (isset($this->email) and isset($this->password)) {

            $requery = $dbh->prepare("SELECT * FROM users WHERE password = :password AND email = :email");
            $requery->bindValue(":email", $this->email, PDO::PARAM_STR);
            $requery->bindValue(":password", $this->password, PDO::PARAM_STR);
            $requeryExec = $requery->execute();

            if ($requeryExec) {
                if ($requery->rowCount() > 0) {
                    $_SESSION['userId'] = $this->getId();
                    header("Refresh:0; url=indexHome.php");
                } else {
                    echo "<div class=\"messerror\" ><span>Mot de passe / Email incorrect.</span>
                    <span>Veuillez reessayer ou bien vous inscrire.</span></div>";
                    header("Refresh:10; url=indexHome.php");
                }
            }
        }
    }

    public function modifProfil($dbh)
    {
        var_dump($_SESSION);
        $id = $_SESSION['userId'];
        $requery = $dbh->prepare("UPDATE nom, prenom, email, password FROM users VALUES (?,?,?,?) WHERE user.id = $id ");
        $requery->execute([$this->nom, $this->prenom, $this->email, $this->password]);

        $profil = [];

        if (is_a($requery, "PDOStatement")) {
            $sauvegarde = $requery->fetchAll(PDO::FETCH_ASSOC);
            foreach ($sauvegarde as $sauv) {
                array_push($profil, new User(
                    $sauv['id'],
                    $sauv['nom'],
                    $sauv['prenom'],
                    $sauv['email'],
                    $sauv['password'],
                    $dbh
                ));
            }
        }
    }


    public static function deconnexion()
    {
        session_start();
        session_destroy();
        echo "<script>alert(\"Vous êtes bien déconnecté.\")</script>";
        header("Refresh:0; url=indexHome.php");
    }
}
