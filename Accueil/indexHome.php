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
            <input type="text" id="typevoiture" name="model" placeholder="Modèle de voiture" required />
            <input type="text" id="marque" name="brand" placeholder="Marque" required />
            <input type="number" id="puissance" name="power" placeholder="Puissance (en CV)" required />
            <input type="date" id="annee" name="year" placeholder="Année" required />
            <input type="text" id="description" name="description" placeholder="Description" required />
            <input type="number" name="price" id="prix" placeholder="Prix de réserve (en €)" required>
            <input type="submit" value="PUBLIER">
        </form>
    </div>
    <?php

    include_once __DIR__ . "\..\Models\Auction.php";
    include_once __DIR__ . "\..\Models\Cars.php";

    use Models\Encherir;
    use Models\Annonces as Annonce;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $publiAnnonce = new Encherir(
            $_POST["model"],
            $_POST["brand"],
            $_POST["power"],
            $_POST["year"],
            $_POST["description"],
            $_POST["price"],
            $_POST["auction_end"]
        );
        $publiAnnonce->displayAnnonce();
    } ?>
    <footer>Par vos experts: Céline, Théo et Léa ©</footer>
</body>

</html>