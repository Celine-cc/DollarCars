<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../Style/home.css" />
</head>

<body>
    <header>
        <menu>
            <a href="../Accueil/indexHome.php">Accueil</a>
            <a href="../Accueil/indexLogin.php">Login</a>
            <a href="../Accueil/indexRegister.php">Register</a>
        </menu>

        <h1>
            <strong><i>Dollar Cars $</i></strong>
        </h1>
    </header>

    <p>Site d'enchères en ligne. Vendez ici votre voiture à prix gagnant !
        <br>Dollar Cars le premier site d'annonce en ligne de la region dollar.
    </p>

    <p><strong>Déposez ici votre annonce</strong></p>

    <div class="formContainer">
        <form action="/Accueil/indexHome.php" method="POST">
            <input type="date" id="dateFin" name="dateFin" placeholder="Date de fin des enchères" required />
            <input type="number" id="prixReserve" name="prixReserve" placeholder="Prix de réserve (en €)" required />
            <input type="text" id="marque" name="marque" placeholder="Marque du véhicule" required />
            <input type="text" id="modele" name="modele" placeholder="Modèle du véhicule" required />
            <input type="number" name="puissance" id="puissance" placeholder="Puissance du véhicule (en CV)" required>
            <input type="number" id="annee" name="annee" placeholder="Année de sortie du véhicule" required />
            <input type="text" id="description" name="description" placeholder="Description" required />
            <input type="submit" value="PUBLIER">
        </form>
    </div>
    <?php

    include_once __DIR__ . "\..\Models\Encherir.php";
    include_once __DIR__ . "\..\Models\Annonce.php";

    use Models\Annonce;
    use Models\Encherir;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $publiAnnonce = new Annonce(
            null,
            date("d-m-Y"),
            $_POST["dateFin"],
            $_POST["prixReserve"],
            $_POST["marque"],
            $_POST["modele"],
            $_POST["puissance"],
            $_POST["annee"],
            $_POST["description"],
        );

        $publiAnnonce->fetchSauv();
    }


    ?>
    <footer>Par vos experts: Céline, Théo et Léa ©</footer>
</body>

</html>