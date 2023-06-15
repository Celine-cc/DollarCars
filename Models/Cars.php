<?php

namespace Models;

include_once __DIR__ . "\DollarCars\Accueil\indexHome.php";

use PDO;

class Annonce

{
    protected int $id;
    protected string $typeVoiture;
    protected string $marque;
    protected int $puissance;
    protected int $annee;
    protected string $description;
    protected float $prix;


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
        $this->setTypeVoiture($typeVoiture);
        $this->setMarque($marque);
        $this->setPuissance($puissance);
        $this->setAnnee($annee);
        $this->setDescritpion($description);
        $this->setPrix($prix);
    }



    public function getId()
    {
        return $this->id;
    }


    public function getTypeVoiture()
    {
        return $this->typeVoiture;
    }
    public function setTypeVoiture($typeVoiture)
    {
        $this->typeVoiture = $typeVoiture;
    }



    public function getmarque()
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
        return $this->prix;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public function showAll()
    {
        echo "<p>" . $this->id . "</p>";
        echo "<p>" . $this->typeVoiture . "</p>";
        echo "<p>" . $this->marque . "</p>";
        echo "<p>" . $this->puissance . "</p>";
        echo "<p>" . $this->annee . "</p>";
        echo "<p>" . $this->description . "</p>";
        echo "<p>" . $this->prix . "</p>";
    }
}
