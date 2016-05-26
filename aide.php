<?php
//Connexion à la BDD
require_once("../Modele/connexion.php");
//require_once("../Modele/Aide/rubrique.php");


$rub = $_GET['rub'];
if (isset($rub)){
    $rep = $bdd->query('SELECT question,reponse FROM rubrique WHERE categorie="'.$rub.'"');
    include("../Vue/Aide/rubrique.php");
    
    
}
else{
    include_once("../Vue/Aide/pageaide.php");
}

?>