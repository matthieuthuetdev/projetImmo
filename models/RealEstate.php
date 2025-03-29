<?php
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
            $rq->bindParam(":id", $_id, PDO::PARAM_INT);
        } else {
            $request = "SELECT biens_immobiliers.id, biens_immobiliers.titre, biens_immobiliers.nbr_pieces, biens_immobiliers.surface, biens_immobiliers.prix_vente, biens_immobiliers.description, biens_immobiliers.ges, biens_immobiliers.classe_eco, biens_immobiliers.meuble, biens_immobiliers.localisation, departements.nom_dep, biens_immobiliers.ville, charges_annuelles,  categories.lib_categorie, proprietaires.nom, proprietaires.prenom FROM biens_immobiliers INNER JOIN departements ON biens_immobiliers.num_departement = departements.id_dep INNER JOIN categories ON biens_immobiliers.id_categorie = categories.id_categorie INNER JOIN proprietaires ON biens_immobiliers.id_proprietaire = proprietaires.id_proprietaire;";
            $rq = $this->connection->prepare($request);
        }

        $rq->execute();
        $montab = $rq->fetchAll(PDO::FETCH_ASSOC);
        $this->result = $montab;
        return $montab;
    }
    public function getNbRoom(){
        $request = "SELECT DISTINCT  ;";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":id", $_id, PDO::PARAM_INT);

    }
}
