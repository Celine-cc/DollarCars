<?php

include_once __DIR__ . "/../models/Annonce.php";
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../Models/Encherir.php";

use Models\Encherir;
use Models\Annonce;
use Models\Database;

session_start();

$dbh = Database::createDBConnection();
Annonce::afficherDetails($dbh);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $enchere = new Encherir(
        null,
        $_SESSION['userId'],
        $_GET['id'],
        $_POST['enchere'],
        date("Y-m-d"),
        $dbh
    );

    $enchere->insert();

    $enchere->fetchEnchere($dbh);

    $enchere->getWinner($dbh);
}

// $value 
// Annonce::afficherDetails($value);
