<?php
require "./models/Database.php";
class RealEstate
{
    private $connection;
    private $result;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function listeRealEstat(): array
    {
        $pdoStatement = $this->connection->query("SELECT * FROM biens_immobiliers", PDO::FETCH_ASSOC);
        $montab = $pdoStatement->fetchAll();
        $this->result = $montab;
        return $montab;
    }
    // public function displayHTMLTable()
    // {
    //     $HTMLTable = "<table> <thead><th>Nom</th><th>Adresse</th><th>prix</th><th>Commentaire</th><th>Note</th><th>Visite</th><th>Modifier</th><th>Supprimer</th></thead><tbody>";

    //     for ($i = 0; $i < count($this->result); $i++) {
    //         $realEstatCourrant = $this->result[$i];
    //         $nom = $realEstatCourrant["nom"];
    //         $adresse = $realEstatCourrant["adresse"];
    //         $prix = $realEstatCourrant["prix"];
    //         $commentaire = $realEstatCourrant["commentaire"];
    //         $note = $realEstatCourrant["note"];
    //         $visite = $realEstatCourrant["visite"];
    //         $id = $realEstatCourrant["id"];

    //         $HTMLTable .= "<tr><td>$nom</td><td>$adresse</td><td>$prix</td><td>$commentaire</td><td>$note</td><td>$visite</td><td><form action='index.php?p=updaterealEstat' method='post'> <input type='hidden' name='realEstatId' id='realEstatId' value='$id'><input type='submit' name='goUpdate' value='Modifier'></form></td><td><a href='index.php?p=deleteRestaurant&id=$id'>Supprimer</a></td></tr>";
    //     }
    //     $HTMLTable .= "</tbody></table";
    //     return $HTMLTable;
    // }

}
