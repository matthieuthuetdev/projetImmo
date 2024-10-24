<?php
require "./vue/header.php";
require "./vue/menu.php";
require "./vue/slider.php";
require "./models/RealEstate.php";
$realEstat = new RealEstate();
$result = $realEstat->listeRealEstat();
var_dump($result[0]);
?>
<h1>Bonjour <?php echo $_SESSION["firstname"] ?></h1>
<h3>Vos bien immobilier</h3>



<?php
require "./vue/footer.php";
