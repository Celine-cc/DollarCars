<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Style/User.css" />


</head>

<body>


    <header>

        <img src="../Style/img/Logo$Cars.png" alt="">

        <menu>
            <a href="../Accueil/indexHome.php">Accueil</a>
            <a href="../Accueil/indexRegister.php">S'inscrire</a>
        </menu>
    </header>



    <div class="formconnect">

        <h2> Connectez-vous</h2>
        <form action="/DollarCars/Accueil/indexLogin.php" method="POST" class="formconnect2">
            <input type="text" id="email" name="email" placeholder="Email" required />
            <input type="password" id="password" name="password" placeholder="Mot-de-passe" required />


            <button type="submit" value="Connection">Connection</button>
        </form>

    </div>
    <footer>Par vos experts: Céline, Théo et Léa ©</footer>


</body>

</html>

<?php

include_once __DIR__ . "/../Models/User.php";

use Models\User;
use Models\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connected = new User(
        null,
        null,
        null,
        $_POST["email"],
        $_POST["password"],
        $dbh = Database::createDBConnection(),
    );

    $connected->login($dbh);
}





?>