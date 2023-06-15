<?php

//namespace
include_once __DIR__ . "\DollarCars\Accueil\indexHome.php";

use PDO;

class Annonce

{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $mail;
    protected $typeVoiture;
    protected $marque;
    protected $puissance;
    protected $annee;
    protected $kilometrage;
    protected $carburant;
    protected $description;


    public function __construct(
        $id,
        $nom,
        $prenom,
        $mail,
        $typeVoiture,
        $marque,
        $puissance,
        $annee,
        $kilometrage,
        $carburant,
        $description
    ) {

        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->typeVoiture = $typeVoiture;
        $this->marque = $marque;
        $this->puissance = $puissance;
        $this->annee = $annee;
        $this->kilometrage = $kilometrage;
        $this->carburant = $carburant;
        $this->description = $description;
    }
    public function annonce()
    {
    }

    public function __get($donnees)
    { if 
    }
}
