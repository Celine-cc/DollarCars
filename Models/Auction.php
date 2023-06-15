<?php

namespace Models;


use PDO;

class User
{
    protected string $author;
    protected string $format;

    public function __construct($HTPrice, $nom, $categorie, $stock, $description, $author, $format)
    {
        $this->author = $author;
        $this->format = $format;
    }

    public function displayBook()
    {
        // echo "<h2>" . $this->nom . "</h2>";
        echo "<p> Author : " . $this->author . "</p>";
        echo "<p> Résumé : " . $this->description . "</p>";
    }

    public function displayProduct()
    {
        $this->displayBook();
    }
}
