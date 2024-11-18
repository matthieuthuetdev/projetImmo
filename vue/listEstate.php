<table class='table'>
    <thead>
    <th scope='col'>id</th>
        <th scope='col'>Titre</th>
        <th scope='col'>Nombre de pièce</th>
        <th scope='col'>Surface</th>
        <th scope='col'>Prix de vente</th>
        <th scope='col'>Description</th>
        <th scope='col'>GES</th>
        <th scope='col'>Classe éco</th>
        <th scope='col'>Meuble</th>
        <th scope='col'>Localisation</th>
        <th scope='col'>Département</th>
        <th scope='col'>Ville</th>
        <th scope='col'>Charge annuelles</th>
        <th>Catégorie</th>
        <th>Nom du propriétaire</th>
        <th>Prenom du propriétair</th>
    
    </thead>
    <tbody>
        <?php

        $HTMLTable = "<caption>test tableau </caption>";
        for ($i = 0; $i < count($data); $i++) {
            $realEstatCourrant = $data[$i];
         

            // $liste = [];
            // $liste[] = $realEstatCourrant["titre"];
            // $liste[] = $realEstatCourrant["nbr_pieces"];
            // $liste[] = $realEstatCourrant["surface"];
            // $liste[] = $realEstatCourrant["prix_vente"];
            // $liste[] = $realEstatCourrant["description"];
            // $liste[] = $realEstatCourrant["ges"];
            // $liste[] = $realEstatCourrant["classe_eco"];
            // $liste[] = $realEstatCourrant["meuble"];
            // $liste[] = $realEstatCourrant["localisation"];
            // $liste[] = $realEstatCourrant["nom_dep"];
            // $liste[] = $realEstatCourrant["ville"];
            // $liste[] = $realEstatCourrant["charges_annuelles"];
            // $liste[] = $realEstatCourrant["lib_categorie"];
            // $liste[] = $realEstatCourrant["nom"];
            // $liste[] = $realEstatCourrant["prenom"];

            $HTMLTable .= "<tr>";

            foreach ($realEstatCourrant as $key => $value) {

                $HTMLTable .= "<td>";
                $HTMLTable .= $value;
                $HTMLTable .= "</td>";
            }

            $HTMLTable .= "</tr>";
        }
        echo $HTMLTable;


        ?>
    </tbody>
</table>