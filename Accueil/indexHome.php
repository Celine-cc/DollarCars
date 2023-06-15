<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../Style/home.css" />

</head>

<body>
    <menu>
        <a href="/DollarCars/Acceuil/indexHome.php">Acceuil</a>
    </menu>
    <p class="entete">
    <h1><strong><i>Dollar Cars $</i></strong></h1>
    <p>Site d'enchères en ligne. Vendez ici votre voiture à prix gagnant !
        <br>Dollar Cars le premier site d'annonce en ligne de la region dollar.
    </p>
    </p>

    <p><strong>Déposez ici votre annonce</strong></p>

    <div class="formContainer">
        <form action="/Accueil/indexHome.php" method="POST">
            <input type="text" id="typevoiture" name="typevoiture" placeholder="Modèle de voiture" required />
            <input type="text" id="marque" name="marque" placeholder="Marque" required />
            <input type="number" id="puissance" name="puissance" placeholder="Puissance" required />
            <input type="date" id="annee" name="annee" placeholder="Année" required />
            <input type="number" id="kilometrage" name="kilometrage" placeholder="Kilometrage" required />
            <input type="text" id="carburant" name="carburant" placeholder="Carburant" required />
            <input type="text" id="description" name="description" placeholder="Description" required />
            <input type="submit" value="PUBLIER">
        </form>
    </div>
    <?php

    include_once __DIR__ . "\DollarCars\Models\Cars.php";

    use DollarCars\Models\Cars;

    if ($_SERVER) {
        $publiAnnonce = $new(
            $_POST["id"],
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["mail"],
            $_POST["typeVoiture"],
            $_POST["marque"],
            $_POST["puissance"],
            $_POST["annee"],
            $_POST["kilometrage"],
            $_POST["carburant"],
            $_POST["description"]

        );
        $publiAnnonce->displayAnnonce();
    } ?>
    <footer>Par vos experts: Céline, Théo et Léa ©</footer>
</body>

</html>