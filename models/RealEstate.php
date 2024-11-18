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
            $request = "SELECT biens_immobiliers.id, biens_immobiliers.titre, biens_immobiliers.nbr_pieces, biens_immobiliers.surface, biens_immobiliers.prix_vente, biens_immobiliers.description, biens_immobiliers.ges, biens_immobiliers.classe_eco, biens_immobiliers.meuble, biens_immobiliers.localisation, departements.nom_dep, biens_immobiliers.ville, charges_annuelles,  categories.lib_categorie, proprietaires.nom, proprietaires.prenom FROM biens_immobiliers INNER JOIN departements ON biens_immobiliers.num_departement = departements.id_dep INNER JOIN categories ON biens_immobiliers.id_categorie = categories.id_categorie INNER JOIN proprietaires ON biens_immobiliers.id_proprietaire = proprietaires.id_proprietaire WHERE biens_immobiliers.id_utilisateur_commercial = :id ;";
            $rq = $this->connection->prepare($request);
            $rq->bindParam(":id", $_id);
        } else {
            $request = "SELECT biens_immobiliers.id, biens_immobiliers.titre, biens_immobiliers.nbr_pieces, biens_immobiliers.surface, biens_immobiliers.prix_vente, biens_immobiliers.description, biens_immobiliers.ges, biens_immobiliers.classe_eco, biens_immobiliers.meuble, biens_immobiliers.localisation, departements.nom_dep, biens_immobiliers.ville, charges_annuelles,  categories.lib_categorie, proprietaires.nom, proprietaires.prenom FROM biens_immobiliers INNER JOIN departements ON biens_immobiliers.num_departement = departements.id_dep INNER JOIN categories ON biens_immobiliers.id_categorie = categories.id_categorie INNER JOIN proprietaires ON biens_immobiliers.id_proprietaire = proprietaires.id_proprietaire;";
            $rq = $this->connection->prepare($request);
        }

        $rq->execute();
        $montab = $rq->fetchAll(PDO::FETCH_ASSOC);
        $this->result = $montab;
        return $montab;
    }
    public function displayHTMLTable()
    {
        
        $HTMLTable = "<table class='table'> <thead><th scope='col'>Titre</th><th scope='col'>Nombre de pièce</th><th scope='col'>Surface</th><th scope='col'>Prix de vente</th><th scope='col'>Description</th><th scope='col'>GES</th><th scope='col'>Classe éco</th><th scope='col'>Meuble</th><th scope='col'>Localisation</th><th scope='col'>Département</th><th scope='col'>Ville</th><th scope='col'>Charge annuelles</th><th>Catégorie</th><th>Nom du propriétaire</th><th>Prenom du propriétair</th><th scope='col'>Modifier</th><th scope='col'>Supprimer</th></thead><tbody>";

        for ($i = 0; $i < count($this->result); $i++) {
            $realEstatCourrant = $this->result[$i];
            $liste = [];
            // $liste[] = $realEstatCourrant["titre"];
            // $liste[] = $realEstatCourrant["nbr_pieces"];
            // $liste[] = $realEstatCourrant["surface"];
            // $liste[] = $realEstatCourrant["prix_vente"];
            // $liste[] = $realEstatCourrant["description"];
            // $liste[] = $realEstatCourrant["ges"];
            // $liste[] = $realEstatCourrant["class_eco"];
            // $liste[] = $realEstatCourrant["meuble"];
            // $liste[] = $realEstatCourrant["localisation"];
            // $liste[] = $realEstatCourrant["nom_dep"];
            // $liste[] = $realEstatCourrant["ville"];
            // $liste[] = $realEstatCourrant["charges_annuelles"];
            // $liste[] = $realEstatCourrant["lib_categorie"];
            // $liste[] = $realEstatCourrant["nom"];
            // $liste[] = $realEstatCourrant["prenom"];
            $HTMLTable .= "<tr>";
            $HTMLTable .= "<td scope='row'>$liste[0]</th>";
            $HTMLTable .= "</tr>";

        }
        $HTMLTable .= "</tbody></table>";
        return $HTMLTable;
    }
}
