<?php
require_once("../modele/connect.php");

$req = $bdd->prepare('INSERT INTO rubrique(reponse,question,categorie) VALUES (:reponse,:question,:categorie)');

$req->execute(array(
    'reponse'=> $_POST['reponse'],
    'question'=> $_POST['question'],
    'categorie'=> $_POST['categorie'],

));
header('Location: admin5.php');
?>
