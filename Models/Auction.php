<?php

namespace Models;

use PDO;

class Auction
{
    protected int $id;
    protected int $car_id;
    protected string $auction_start;
    protected string $auction_end;
    protected int $highest_bid;
    protected int $highest_bider_id;
    protected $dbh;

    public function __construct($id, $car_id, $auction_start, $auction_end, $highest_bid, $highest_bider_id, $dbh)
    {
        $this->id = $id;
        $this->car_id = $car_id;
        $this->auction_start = $auction_start;
        $this->auction_end = $auction_end;
        $this->highest_bid = $highest_bid;
        $this->highest_bider_id = $highest_bider_id;
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
        $query = $this->dbh->prepare("INSERT INTO auctions (auction_start, auction_end, highest_bid) VALUES (?,?,?,?)");
        return $query->execute([$this->auction_start, $this->auction_end, $this->highest_bid]);
    }

    public static function fetchArticles($dbh)
    {
        $query = $dbh->prepare("SELECT * FROM auctions");
        $query->execute();

        $auctions = [];

        if (is_a($query, "PDOStatement")) {
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                array_push($articles, new Auction($result['id'], $result['car_id'], $result['auction_start'], $result["auction_end"], $result["highest_bid"], $result['auction_start'], $result["auction_end"], $result["highest_bidder_id"], $dbh));
            }
        }

        return $auctions;
    }

    // public function displayAuction()
    // {
    //     echo "<p> Author : " . $this->author . "</p>";
    //     echo "<p> Résumé : " . $this->description . "</p>";
    // }
}
