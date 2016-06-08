
<?php
require_once("../modele/connect.php");

  $req = $bdd->prepare('UPDATE groupe SET leader = :ld, nomGroupe = :gp, nomSport= :sp, idClub= :club,  ville= :vil, niveau=:niveau,
    nbreMax= :nb, description= :des, imgGroupe= :imgG   WHERE nomGroupe= :ngp ');
    
  $req->execute(array(
    'ld' => $_POST['lead'],
    'gp' => $_POST['ngroupe'],
    'sp' =>$_POST['sport'],
    'club' =>$_POST['idClub'],
    'vil' =>$_POST['ville'],
    'niveau' =>$_POST['niv'],
    'nb' =>$_POST['nbmax'],
    'des' =>$_POST['descript'],
    'imgG' =>$_POST['img'],
    'ngp' => $_GET['groupe']
  ));

  header('Location: http://localhost/Sportymates/vue/groupe/groupe.php');
?>
