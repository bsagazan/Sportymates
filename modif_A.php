<?php
require_once("../modele/connect.php");


  $req = $bdd->prepare('UPDATE rubrique SET reponse = :reponse, question = :question, categorie= :categorie  WHERE idRubrique= :idRubrique ');
  $req->execute(array(
    'reponse' => $_POST['reponse'],
    'question' => $_POST['question'],
    'categorie' =>$_POST['categorie'],
    'idRubrique' =>$_GET['rubrique']
  ));

  header('Location: ../vue/membre/Back_Aide.php');
?>
