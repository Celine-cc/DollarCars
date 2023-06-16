<?php

namespace Models;

include_once __DIR__ . "/../Accueil/indexHome.php";
include_once __DIR__ . "/../models/Database.php";

use PDO;

class Annonce

{
    protected int $id;
    protected $dbh;
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
        $dbh,
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
        $this->dbh = $dbh;
        $this->setDateDebut($dateDebut);
        $this->setDateFin($dateFin);
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


    public function sauvegarde()
    {
        $requery = $this->dbh->query("INSERT INTO annonces (dateDebut, dateFin, prixReserve, marque, modele,
        puissance, annee, description) VALUES (?,?,?,?,?)");
        return $requery->execute([
            $this->dateDebut, $this->dateFin, $this->prixReserve, $this->marque, $this->modele,
            $this->puissance, $this->annee, $this->description
        ]);
    }



    public function fetchSauv($dbh)
    {
        $requery = $dbh->query("SELECT * FROM annonces");
        $requery->execute();

        $annonces = [];

        if (is_a($requery, "PDOStatement")) {
            $sauvegarde = $requery->fetchsauvegarde(PDO::FETCH_ASSOC);

            foreach ($sauvegarde as $sauv) {
                array_push($annonces, new Annonce(
                    $sauv['id'],
                    $sauv['dbh'],
                    $sauv['dateDebut'],
                    $sauv['dateFin'],
                    $sauv['prixReserve'],
                    $sauv['marque'],
                    $sauv['modele'],
                    $sauv['puissance'],
                    $sauv['annee'],
                    $sauv['description']
                ));
            }
            return $annonces;
        }
    }
}
