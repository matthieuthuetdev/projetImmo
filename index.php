<?php
session_start();

require "./vue/header.php";

require "./vue/menu.php";
require "./vue/slider.php";
require "./models/departements.php";
require "./controllers/HomepageController.php";

?>



<?php
require "./models/Database.php";
require "./models/Users.php";
require "./controllers/estateController.php";
require "./models/RealEstate.php";
require "./controllers/signInController.php";



if (isset($_GET["pageController"])) {

    switch ($_GET["pageController"]) {
        case '':
            $objhome = new HomepageController();
            $objhome->displayHome();

            break;
        case "home":
            $objhome = new HomepageController();
            $objhome->displayHome();

            break;
        case "listEstate":
            if ($_SESSION["name"]) {
                if (isset($_GET["action"]) && $_GET["action"] == "display") {
                    if (isset($_GET["id"]) &&  !empty($_GET["id"])) {

                        $controllerEstate = new EstateController($_GET["id"]);
                        $controllerEstate->displayRealEstate();
                    } elseif (isset($_GET["id"]) && empty($_GET["id"])) {
                    } else {
                        $controllerEstate = new EstateController();
                        $controllerEstate->displayRealEstate();
                    }
                } else {

                    $objhome = new HomepageController();
                    $objhome->displayHome();
                }
            } else {
                $controllerSignIn = new SignInController();
                $controllerSignIn->display();
            }


            break;
        case "signIn";
            if (isset($_GET["action"]) && $_GET["action"] == "display") {
                $controllerSignIn = new SignInController();
                $controllerSignIn->display();
            } else {

                $objhome = new HomepageController();
                $objhome->displayHome();
            }

            break;


        default:
            $objhome = new HomepageController();
            $objhome->displayHome();

            break;
    }
} else {
    $objhome = new HomepageController();
    $objhome->displayHome();
}
// if ($_GET["pageController"] == "") {
//     // chercher le controller de la page d'accueil
// } elseif ($_GET["pageController"] == "listEstate") {
//     if (isset($_GET["action"]) && $_GET["action"] == "display") {
//         if (isset($_GET["id"]) &&  !empty($_GET["id"])) {

//             $controllerEstate = new EstateController($_GET["id"]);
//             $controllerEstate->displayRealEstate();
//         } elseif (isset($_GET["id"]) && empty($_GET["id"])) {
//             $controllerEstate = new EstateController();
//             $controllerEstate->displayRealEstate();
//         } else {
//             // chercher le controller de la page d'accueil

//         }
//     } else {
//         // chercher le controller de la page d'accueil

//     }
// } else {   // chercher le controller de la page d'accueil

// }









// if (!isset($_SESSION["name"])) {
//     require "./vue/acces_membre.php";
// } else {
//     echo "<a href='./vue/signout.php'class='btn btn-primary'>déconnexion</a>";
// }


require "./vue/footer.php";
