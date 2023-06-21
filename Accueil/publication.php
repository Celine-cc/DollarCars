<?php

include_once __DIR__ . "/../models/Annonce.php";
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../Models/Encherir.php";

use Models\Encherir;
use Models\Annonce;
use Models\Database;

$dbh = Database::createDBConnection();
Annonce::afficherDetails($dbh);


// $value 
// Annonce::afficherDetails($value);
