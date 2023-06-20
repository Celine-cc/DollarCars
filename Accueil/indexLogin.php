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
        <img class="imgroute" src="https://www.euractiv.fr/wp-content/uploads/sites/3/2016/12/route.jpg" alt="">
        <img class="logo" src="../Style/img/Logo3.jpeg" alt="">

        <menu>
            <a href="../Accueil/indexHome.php" class="amenu">Accueil</a>

        </menu>
    </header>



    <div class="formconnect">

        <h2> Connectez-vous</h2>
        <form action="indexLogin.php" method="POST" class="formconnect2">
            <input type="text" id="email" name="email" placeholder="Email" required />
            <input type="password" id="password" name="password" placeholder="Mot-de-passe" required />



            <button type="submit" value="Connection" name="connection">Connexion</button>
            <a class="inscrire" href="../Accueil/indexRegister.php">🟠 Inscription 🟠</a>
        </form>

    </div>
    <footer>Par vos experts: Céline, Théo et Léa ©</footer>


</body>

</html>

<?php
session_start();
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