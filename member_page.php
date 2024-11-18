<?php
session_start();
require "./vue/header.php";
require "./vue/menu.php";
require "./vue/slider.php";
require "./models/RealEstate.php";
$realEstat = new RealEstate();
if ($_SESSION["levelName"] == "superadmin") {
    $id = null;
} else {
    $id = $_SESSION["userId"];
    
}
$result = $realEstat->listeRealEstat($id);
var_dump($result);
?>
<h1>Bonjour <?php echo $_SESSION["firstname"] . " " . $_SESSION["name"] ?></h1>
<h3>Vos bien immobilier</h3>
<?php echo $realEstat->displayHTMLTable(); ?>


<?php
require "./vue/footer.php";
