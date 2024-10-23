<?php
require "./vue/header.php";
require "./vue/menu.php";
require "./vue/slider.php";    ?>
<h1>Liste des biens immobiliers</h1>
<form action="index.php" method="GET" enctype="multipart/form-data">
    <fieldset>
        <legend>Rechercher un Bien immobilier</legend>
        <div class="form-group"> <input type="hidden" name="lib_cat" value="" id="lib_cat" /> <label for="dept">Choisir le département</label>'; <select name="dep" id="dep" class="form-control" style=" max-width:300px">
                <option value="">Choisissez votre département</option>
            </select> </div>
        <div class="form-group"> <label for="budget">Montant budget maximum</label> <span class="currencyinput">€ <input type="number" step="10000" id="bugdet" name="budget" placeholder="Budget Max" min="50000" max="900000000" /> </span> </div>
        <div class="form-group"> <label for="nbpiece">Nombre de pièces souhaitées:</label>'; <select name="nbpieces" id="nbre" class="form-control" style=" max-width:300px">
                <option value=" ">Choisissez le nombre de pièce</option>
            </select> </div>
        <div class="form-group form-button" id="btnsub"> <button type="submit" class="btn btn-primary" name="envoi">Submit</button> </div>
    </fieldset>
</form>
<table class='table table-striped'>

</table>
<?php
if (!isset($_SESSION["name"])) {
    require "./vue/acces_membre.php";
}else{
    echo "<a href='./vue/signout.php'class='btn btn-primary'>déconnexion</a>";
}
var_dump($_POST);
if(isset($_POST["signout"])){
    session_destroy();
}
require "./vue/footer.php";
?>
