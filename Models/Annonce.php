<?php

namespace Models;

include_once __DIR__ . "/../Accueil/indexHome.php";
include_once __DIR__ . "/../models/Database.php";

use PDO;

class Annonce

{
    protected $id;
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
        $dateDebut,
        $dateFin,
        $prixReserve,
        $marque,
        $modele,
        $puissance,
        $annee,
        $description,
        $dbh

    ) {

        $this->setDateDebut($dateDebut);
        $this->setDateFin($dateFin);
        $this->setPrix($prixReserve);
        $this->setMarque($marque);
        $this->setModele($modele);
        $this->setPuissance($puissance);
        $this->setAnnee($annee);
        $this->setDescritpion($description);
        $this->dbh = $dbh;
    }

    // get et set car protected->

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
        $this->puissance = $puissance;
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


    public static function buttonConnect()
    {
        if (session_status() != null) {
            echo "<p>🟢</p>";
        } else {
            echo "<p>🔴</p>";
        }
    }


    public function sauvegarde()
    {
        $requery = $this->dbh->prepare("INSERT INTO annonces (dateDebut, dateFin, prixReserve, marque, modele,
        puissance, annee, description) VALUES (?,?,?,?,?,?,?,?)");
        $ret =  $requery->execute([$this->dateDebut, $this->dateFin, $this->prixReserve, $this->marque, $this->modele, $this->puissance, $this->annee, $this->description]);
        var_dump($ret);
        var_dump($requery);
        var_dump($this);
        die();
    }
    /*base de donnée, on y incre les nouvelles donneés, qui y seront sauvegardées*/


    public static function fetchSauv($dbh)
    {
        $requery = $dbh->query("SELECT * FROM annonces");
        $requery->execute();

        $annonces = [];

        if (is_a($requery, "PDOStatement")) {
            $sauvegarde = $requery->fetchAll(PDO::FETCH_ASSOC);

            foreach ($sauvegarde as $sauv) {
                array_push($annonces, new Annonce(
                    $sauv['dateDebut'],
                    $sauv['dateFin'],
                    $sauv['prixReserve'],
                    $sauv['marque'],
                    $sauv['modele'],
                    $sauv['puissance'],
                    $sauv['annee'],
                    $sauv['description'],
                    $dbh
                ));
            }
            foreach ($annonces as $key => $value) { ?>
                <div class="publiannonce">

                    <h1>Annonce</h1>

                    <!-- Ne mettre en affichage de l'acceuil uniquement le prix et le model,
                le detail sera affiché en deuxième page -->
                    <p><?php echo "Date de fin : " . $value->getDateFin() ?></p>
                    <p><?php echo "Prix de réserve : " . $value->getPrix() ?></p>
                    <p><?php echo "Marque : " . $value->getMarque() ?></p>
                    <p><?php echo "Modèle : " . $value->getModele() ?></p>
                    <p><?php echo "Puissance : " . $value->getPuissance() ?></p>
                    <p><?php echo "Année : " . $value->getAnnee() ?></p>
                    <p><?php echo $value->getDescription() ?></p>
                </div>

<?php
            }
        }
    }
}
