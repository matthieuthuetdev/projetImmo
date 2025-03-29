<?php


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
require "./controllers/UserController.php";



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
            if (isset($_SESSION["name"])) {
                if (isset($_GET["action"]) && $_GET["action"] == "display") {
                    if (isset($_SESSION["userId"]) &&  !empty($_SESSION["userId"])) {

                        $controllerEstate = new EstateController($_SESSION["userId"]);
                        $controllerEstate->displayRealEstate();
                    } else {

                        $controllerEstate = new EstateController(null);
                        $controllerEstate->displayRealEstate();
                    }
                } else {
                    $objhome = new HomepageController();
                    $objhome->displayHome();
                }
            } else {
                $controllerUser = new UserController();
                $controllerUser->signIn();
            }


            break;
        case "user";
            if (isset($_GET["action"]) && $_GET["action"] == "signIn") {
                $controllerUser = new UserController();
                $controllerUser->signIn();
            } elseif (isset($_GET["action"]) && $_GET["action"] == "signOut") {
                $controllerUser = new UserController();
                $controllerUser->signOut();
                $objhome = new HomepageController();
                $objhome->displayHome();
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
require "./vue/footer.php";
var_export($_SESSION);
