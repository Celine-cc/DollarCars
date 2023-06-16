<?php

namespace Models;

include_once __DIR__ . "\DollarCars\Accueil\indexHome.php";
include_once __DIR__ . "/.../models/Database.php";

use PDO;

class Annonce

{
    protected int $id;
    protected $dateDebut;
    protected $dateFin;
    protected float $prixReserve;
    protected string $marque;
    protected string $modele;
    protected int $puissance;
    protected int $annee;
    protected string $description;

    public function __construct(
        $id,
        $dateDebut,
        $dateFin,
        $prixReserve,
        $marque,
        $modele,
        $puissance,
        $annee,
        $description,

    ) {

        $this->id = $id;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->setPrix($prixReserve);
        $this->setMarque($marque);
        $this->setModele($modele);
        $this->setPuissance($puissance);
        $this->setAnnee($annee);
        $this->setDescritpion($description);
    }



    public function getId()
    {
        return $this->id;
    }


    public function getModele()
    {
        return $this->modele;
    }
    public function setModele($modele)
    {
        $this->modele = $modele;
    }



    public function getMarque()
    {
        return $this->marque;
    }
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }



    public function getPuissance()
    {
        return $this->puissance;
    }

    public function setPuissance($puissance)
    {
        $this->id = $puissance;
    }



    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }



    public function getDescription()
    {
        return $this->description;
    }
    public function setDescritpion($description)
    {
        $this->description = $description;
    }



    public function getPrix()
    {
        return $this->prixReserve;
    }
    public function setPrix($prixReserve)
    {
        $this->prixReserve = $prixReserve;
    }

    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }


    public function displayAnnonce()
    {
        echo "<p>" . $this->getDateDebut() . "</p>";
        echo "<p>" . $this->getDateFin() . "</p>";
        echo "<p>" . $this->getPrix() . "</p>";
        echo "<p>" . $this->getMarque() . "</p>";
        echo "<p>" . $this->getModele() . "</p>";
        echo "<p>" . $this->getPuissance() . "</p>";
        echo "<p>" . $this->getAnnee() . "</p>";
        echo "<p>" . $this->getDescription() . "</p>";
    }

    public function sauvegarde($dbh)
    {
        $requery = $dbh->query("INSERT INTO auctions");
        $requery->execute();

        $auctions = [];
    }
}
