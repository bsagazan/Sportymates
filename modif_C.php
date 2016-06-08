<?php
require_once("../modele/connect.php");

  $req = $bdd->prepare('UPDATE club SET nomClub = :cl, adresse = :adresse, telephone= :tel, heureOuverture= :ho,
    heureFermeture= :hf, jourOuverture= :jo, jourFermeture= :jf  WHERE idClub= :idclub ');
  $req->execute(array(
    'cl' => $_POST['nclub'],
    'adresse' => $_POST['adresse'],
    'tel' =>$_POST['tel'],
    'ho' =>$_POST['houverture'],
    'hf' =>$_POST['hfermeture'],
    'jo' =>$_POST['jouverture'],
    'jf' =>$_POST['jfermeture'],
    'idclub' =>$_GET['club']
  ));

  header('Location: http://localhost/Sportymates/vue/club/club.php');
?>
