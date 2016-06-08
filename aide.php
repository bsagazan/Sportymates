<?php
//Connexion à la BDD
require_once("../modele/connect.php");
//require_once("../Modele/Aide/rubrique.php");

if (isset($_GET['rub'])){
    $rep = $bdd->query('SELECT question,reponse,idRubrique FROM rubrique WHERE categorie="'.$_GET['rub'].'"');
    include_once("../vue/aide/rubrique.php");
}
else{
    include_once("../vue/aide/pageAide.php");
}

?>
