<?php
//Connexion à la BDD
require_once("../modele/connect.php");
//require_once("../Modele/Aide/rubrique.php");

$sport = $_GET['sport'];
if (isset($sport)){
    $rep  = $bdd->query('SELECT descriptionSport FROM sport WHERE nomSport="'.$sport.'"');
    $rep1 = $bdd->query('SELECT imgEvenement,nom FROM evenement WHERE sports="'.$sport.'" ORDER BY dateDebut AND dateDebut>CURDATE() LIMIT 3');
    $rep2 = $bdd->query('SELECT imgSports FROM sport WHERE nomSport="'.$sport.'"');
    $rep3 = $bdd->query('SELECT imgGroupe,nomGroupe FROM groupe WHERE nomSport="'.$sport.'" ORDER BY creation DESC LIMIT 3');

    include("../vue/sport/pageSport.php");
}else{
    include_once("../vue/sport/allSport.php");
}

?>
