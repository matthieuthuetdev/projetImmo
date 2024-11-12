USE immochateau;
SELECT
    biens_immobiliers.id,
    biens_immobiliers.titre,
    biens_immobiliers.nbr_pieces,
    biens_immobiliers.surface,
    biens_immobiliers.prix_vente,
    biens_immobiliers.description,
    biens_immobiliers.ges,
    biens_immobiliers.classe_eco,
    biens_immobiliers.meuble,
    biens_immobiliers.localisation,
    departements.nom_dep,
    biens_immobiliers.ville,
    charges_annuellescategories,
    id_utilisateur_commercial,
    categorie.lib_categorie,
    proprietaires.nom
FROM
    biens_immobiliers
    INNER JOIN departements ON departements.nom_dep = departements.id_dep;
    INNER JOIN categorie ON categorie.lib_categorie = categorie.id;
    INNER JOIN proprietaires ON proprietaires.proprietaires.nom = proprietaires.id;
