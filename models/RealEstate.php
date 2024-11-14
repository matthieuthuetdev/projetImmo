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
    public function listeRealEstat($_id): array
    {
        if (!is_null($_id)) {
            $request = "SELECT biens_immobiliers.id, biens_immobiliers.titre, biens_immobiliers.nbr_pieces, biens_immobiliers.surface, biens_immobiliers.prix_vente, biens_immobiliers.description, biens_immobiliers.ges, biens_immobiliers.classe_eco, biens_immobiliers.meuble, biens_immobiliers.localisation, departements.nom_dep, biens_immobiliers.ville, charges_annuelles, biens_immobiliers.id_utilisateur_commercial, categories.lib_categorie, proprietaires.nom FROM biens_immobiliers INNER JOIN departements ON biens_immobiliers.num_departement = departements.id_dep INNER JOIN categories ON biens_immobiliers.id_categorie = categories.id_categorie INNER JOIN proprietaires ON biens_immobiliers.id_proprietaire = proprietaires.id_proprietaire WHERE biens_immobiliers.id_utilisateur_commercial = :id ;";
            $rq->bindParam(":id", $_id);
        } else {
            $request = "SELECT biens_immobiliers.id, biens_immobiliers.titre, biens_immobiliers.nbr_pieces, biens_immobiliers.surface, biens_immobiliers.prix_vente, biens_immobiliers.description, biens_immobiliers.ges, biens_immobiliers.classe_eco, biens_immobiliers.meuble, biens_immobiliers.localisation, departements.nom_dep, biens_immobiliers.ville, charges_annuelles, biens_immobiliers.id_utilisateur_commercial, categories.lib_categorie, proprietaires.nom FROM biens_immobiliers INNER JOIN departements ON biens_immobiliers.num_departement = departements.id_dep INNER JOIN categories ON biens_immobiliers.id_categorie = categories.id_categorie INNER JOIN proprietaires ON biens_immobiliers.id_proprietaire = proprietaires.id_proprietaire;";
            $rq = $this->connection->prepare($request);
        }

        $rq->execute();
        $montab = $rq->fetchAll(PDO::FETCH_ASSOC);
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
