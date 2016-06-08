<?php
require_once('../modele/connect.php');
require('../modele/pageEvent.php');


$idEvent = $_GET['idEvent'];
if (isset($idEvent) && $idEvent != NULL){
    $don_event =$req_event->fetch();
    $nom = $don_event['nom'];
    $Hdebut=$don_event['heureDebut'];
    $Hfin=$don_event['heureFin'];
    $Ddebut=$don_event['dateDebut'];
    $Dfin=$don_event['dateFin'];
    $lieu=$don_event['lieu'];
    $imgEvent=$don_event['imgEvenement'];
    $sport=$don_event['sports'];
    $description=$don_event['descriptionEvent'];
    include("../vue/evenement/pageEvent.php");
}
else{
    header('Location: ../vue/accueil.php');
}

?>