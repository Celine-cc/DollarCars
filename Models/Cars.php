<?php

namespace Models;

include_once __DIR__ . "\DollarCars\Accueil\indexHome.php";

use PDO;

class Annonce

{
    protected $id;
    protected $typeVoiture;
    protected $marque;
    protected $puissance;
    protected $annee;
    protected $description;
    protected $prix;


    public function __construct(
        $id,
        $typeVoiture,
        $marque,
        $puissance,
        $annee,
        $description,
        $prix
    ) {

        $this->id = $id;
        $this->typeVoiture = $typeVoiture;
        $this->marque = $marque;
        $this->puissance = $puissance;
        $this->annee = $annee;
        $this->description = $description;
        $this->prix = $prix;
    }
    public function annonce()
    {
    }

    public function __get($donnees)
    {
    }
}
