<?php

include_once __DIR__ . "/../models/Annonce.php";
include_once __DIR__ . "/../models/Database.php";

use Models\Annonce;
use Models\Database;



$dbh = Database::createDBConnection();
Annonce::fetchSauv($dbh);

// $value 
// Annonce::afficherDetails($value);
