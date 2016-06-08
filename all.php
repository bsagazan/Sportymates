<?php

//Connexion à la BDD
require_once("../modele/connect.php");

$theme=$_GET['theme'];

if(isset($theme) && $theme != NULL){
    if($theme == "groupe"){
        $rep = $bdd->query('SELECT nomGroupe, imgGroupe FROM groupe ORDER BY nomGroupe ');

    }
    if($theme == "club"){
        $rep = $bdd->query('SELECT nomClub, imgClub FROM club ORDER BY nomClub ');

    }
    if($theme == "sport"){
        $rep = $bdd->query('SELECT nomGroupe, imgSport FROM sport ORDER BY nomSport ');

    }


    include_once("../vue/all.php");
}


?>
