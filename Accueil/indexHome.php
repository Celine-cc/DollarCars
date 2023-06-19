<?php

include_once __DIR__ . "/../Models/Encherir.php";
include_once __DIR__ . "/../Models/Annonce.php";

use Models\Annonce;
use Models\Database; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../Style/acceuil.css?t=<? echo time(); ?>" />
    <p> <a href="../Accueil/indexLogin.php">Login</a>
        <a href="../Accueil/indexRegister.php">Register</a>
    </p>
    <p>
        <!-- Ajout du bouton Déconnexion -->
        <button class="button" href="/deconnexion.php">
            <span>Déconnexion</span>
        </button>
    </p>
    <?php Annonce::buttonConnect() ?>

    <?php

    $dbh = Database::createDBConnection();
    //connexion dbh

    ?>

    <header>
        <menu>
            <a href="../Accueil/indexLogin.php">Login</a>
            <a href="../Accueil/indexRegister.php">Register</a>
            <?php Annonce::buttonConnect() ?>

            <?php

            $dbh = Database::createDBConnection();
            //connexion dbh

            $sauvegarde = Annonce::fetchSauv($dbh);
            //recup données
            ?>



        </menu>

        <!-- Ajout du bouton Déconnexion -->
        <button class="button" onclick='location.href="../Accueil/indexDeconnexion.php"'><span>Déconnexion </span></button>


        <h1>
            <strong><i>Dollar Cars $</i></strong>
        </h1>

    </header>

    <p>Site d'enchères en ligne. Vendez ici votre voiture à prix gagnant !
        <br>Dollar Cars le premier site d'annonce en ligne de la region dollar.
    </p>


    <div class="formContainer">

        <div class="extra"></div>
        <br />
        <div class="wrapper">

            <div class="fix">



                <div>
                    <form action="../Accueil/indexHome.php" method="POST">
                        <strong>Déposez ici votre annonce</strong>

                        <p><input type="date" id="dateFin" name="dateFin" placeholder="Date de fin des enchères" required /></p>
                        <p><input type="number" id="prixReserve" name="prixReserve" placeholder="Prix de réserve (en €)" required /></p>
                        <p><input type="text" id="marque" name="marque" placeholder="Marque du véhicule" required /></p>
                        <p><input type="text" id="modele" name="modele" placeholder="Modèle du véhicule" required /></p>
                        <p><input type="number" name="puissance" id="puissance" placeholder="Puissance du véhicule (en CV)" required></p>
                        <p><input type="number" id="annee" name="annee" placeholder="Année de sortie du véhicule" required /></p>
                        <p><input type="text" id="description" name="description" placeholder="Description" required /></p>
                        <p></p>
                        <div><input type="submit" value="PUBLIER"></div>

                    </form>
                </div>
            </div>
        </div>
        <br />
        <div class="extra"></div>


    </div>
</head>

<body>
    <menu>
    </menu>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $dbh = Database::createDBConnection();
        $publiAnnonce = new Annonce(
            date("d-m-Y"),
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
    }
    ?>
    <footer></footer>
</body>

</html>