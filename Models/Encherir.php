<?php

namespace Models;

include_once __DIR__ . "/../models/Database.php";

use Models\Database;
use PDO;

class Encherir
{
    protected $id;
    protected $userId;
    protected $annonceId;
    protected float $enchere;
    protected string $date_enchere;
    protected $dbh;

    public function __construct($id, $userId, $annonceId, $enchere, $date_enchere, $dbh)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->annonceId = $annonceId;
        $this->enchere = $enchere;
        $this->date_enchere = $date_enchere;
        $this->dbh = $dbh;
    }

    public function __get($property)
    {
        if ($property !== "dbh") {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if ($property !== "dbh") {
            $this->$property = $value;
        }
    }

    public function insert()
    {
        $dbh = Database::createDBConnection();
        $query = $dbh->prepare("SELECT * FROM `annonces` WHERE `id` = ? ");
        $query->execute([$this->annonceId]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result[0]['dateFin'] > date("Y-m-d")) {
            if ($result[0]['prixReserve'] < $this->enchere) {
                $query = $this->dbh->prepare("INSERT INTO encherir (userId, annonceId, enchere, date_enchere) VALUES (?,?,?,?)");
                $query->execute([$this->userId, $this->annonceId, $this->enchere, $this->date_enchere]);

                $queryUpdate = $this->dbh->prepare("UPDATE annonces SET prixReserve = ? WHERE id = ?");
                $queryUpdate->execute([$this->enchere, $this->annonceId]);
            } else {
                echo "<p> Veuillez saisir un montant plus élevé </p>";
            }
        } else {
            echo "<p> Vous ne pouvez plus enchérir sur cette annonce. </p>";
        }
    }

    public function fetchEnchere($dbh)
    {
        $query = $dbh->prepare("SELECT * FROM encherir");
        $query->execute();

        $encheres = [];

        if (is_a($query, "PDOStatement")) {
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                array_push($encheres, new Encherir($result['id'], $result['userId'], $result['annonceId'], $result["enchere"], $result["date_enchere"], $dbh));
            }
        }

        foreach ($encheres as $key => $enchere) { ?>
            <div class="publiannonce">
                <h1>Encheres</h1>
                <p><?php echo "Montant dernière enchère : " . $enchere->__get('enchere') . " €" ?></p>
                <p><?php echo "Date de la dernière enchère : " . $enchere->__get('date_enchere') ?></p>
            </div>
            <?php }
    }

    public function getWinner($dbh)
    {
        $query = $dbh->prepare("SELECT users.nom, users.prenom FROM users INNER JOIN encherir ON users.id = encherir.userId");
        $query->execute();

        $encheres = [];

        if (is_a($query, "PDOStatement")) {
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                array_push($encheres, $result['nom'], $result['prenom']);
            }
        }

        if ($this->date_enchere < date("Y-m-d")) {
            foreach ($encheres as $key => $enchere) { ?>
                <div class="enchere">
                    <p><?php echo "Gagnant : " . $enchere['nom'] . $enchere['prenom'] ?></p>
                </div>
<?php }
        }
    }
}
