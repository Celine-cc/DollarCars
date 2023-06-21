<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../Style/acceuil.css?t=<? echo time(); ?>" />
</head>

<?php

include_once __DIR__ . "/../Models/Encherir.php";
include_once __DIR__ . "/../Models/Annonce.php";

use Models\Annonce;
use Models\Database; ?>
<header>
    <menu>
        <?php
        session_start();
        if (count($_SESSION) == 0) {
            Annonce::buttonConnect();
        ?><button class="button" onclick='location.href="indexLogin.php"'>Login</button>
            <button class="button" onclick='location.href="indexRegister.php"'>Register</button>
        <?php } else {
            Annonce::buttonConnect();
        ?> <button class="button" onclick='location.href="indexDeconnexion.php"'>Déconnexion</button>
            <button class="button" onclick='location.href="indexChangeProfil.php"'>Profil</button>
        <?php }
        ?>
    </menu>

    <h1>
        <strong><i>Dollar Cars $</i></strong>
    </h1>

</header>

<p>Site d'enchères en ligne. Vendez ici votre voiture à prix gagnant !
    <br>Dollar Cars le premier site d'annonce en ligne de la region dollar.
</p>
<div class="espace"></div>

<div class="formContainer">
    <div class="wrapper">
        <div class="fix">
            <div>
                <form action="indexHome.php" method="POST">
                    <strong>Déposez ici votre annonce</strong>

                    <p><input type="date" id="dateFin" name="dateFin" placeholder="Date de fin des enchères" required /></p>
                    <p><input type="number" id="prixReserve" name="prixReserve" placeholder="Prix de réserve (en €)" required /></p>
                    <p><input type="text" id="marque" name="marque" placeholder="Marque du véhicule" required /></p>
                    <p><input type="text" id="modele" name="modele" placeholder="Modèle du véhicule" required /></p>
                    <p><input type="number" name="puissance" id="puissance" placeholder="Puissance du véhicule (en CV)" required></p>
                    <p><input type="number" id="annee" name="annee" placeholder="Année de sortie du véhicule" required /></p>
                    <p><input type="text" id="description" name="description" placeholder="Description" required /></p>
                    <input type="submit" value="PUBLIER">

                </form>
            </div>
        </div>
    </div>

    <body>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dbh = Database::createDBConnection();
            $publiAnnonce = new Annonce(
                null,
                date("Y-m-d"),
                $_POST["dateFin"],
                $_POST["prixReserve"],
                $_POST["marque"],
                $_POST["modele"],
                $_POST["puissance"],
                $_POST["annee"],
                $_POST["description"],
                $dbh
            );

            $publiAnnonce->sauvegarde();

            $publiAnnonce->fetchSauv($dbh);
        } else {
            $dbh = Database::createDBConnection();
            Annonce::fetchSauv($dbh);
        }


        ?>
    </body>

</html>