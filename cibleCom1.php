<?php
session_start();
require_once("../modele/connect.php");

var_dump($_POST['contenuCom']);
$contenu = $_POST['contenuCom'];
$auteur = $_POST['auteur'];
$club = $_POST['club'];

$bdd->exec("INSERT INTO commentaire (contenu, dateHeure,auteur,nomClub) VALUES ('$contenu', NOW(), '$auteur','$club')");

header("Location: pageclub.php?identifiant=$club");
exit;
?>
