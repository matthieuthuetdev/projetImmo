<?php
session_start();

require "./vue/header.php";

require "./vue/menu.php";
require "./vue/slider.php";

?>



<?php
require "./models/Database.php";
require "./models/Users.php";
require "./controllers/estateController.php";
require "./models/RealEstate.php";

if ($_GET["pageController"] == "") {
    // chercher le controller de la page d'accueil
} elseif ($_GET["pageController"] == "listEstate") {
    if (isset($_GET["action"]) && $_GET["action"] == "display") {
        if (isset($_GET["id"]) &&  !empty($_GET["id"])) {

            $controllerEstate = new EstateController($_GET["id"]);
            $controllerEstate->displayRealEstate();
        } elseif (isset($_GET["id"]) && empty($_GET["id"])) {
            $controllerEstate = new EstateController();
            $controllerEstate->displayRealEstate();
        } else {
            // chercher le controller de la page d'accueil

        }
    }
    else {
   // chercher le controller de la page d'accueil

    }



} else {   // chercher le controller de la page d'accueil

}






if (isset($_POST["identifiant"])) {
    $user = new Users();
    $result = $user->signIn($_POST["identifiant"], $_POST["pwd"]);
    if (!empty($result)) {
        $_SESSION["userId"] = $result["id_utilisateur"];
        $_SESSION["name"] = $result["nom_utilisateur"];
        $_SESSION["firstname"] = $result["prenom_utilisateur"];
        $_SESSION["email"] = $result["mail_utilisateur"];
        $_SESSION["levelName"] = $result["libelle_niveau"];
        echo "connection réussi !";
        $controllerEstate = new EstateController($result["id_utilisateur"]);
        $controllerEstate->displayRealEstate();
    }
}



if (!isset($_SESSION["name"])) {
    require "./vue/acces_membre.php";
} else {
    echo "<a href='./vue/signout.php'class='btn btn-primary'>déconnexion</a>";
}

require "./vue/footer.php";
