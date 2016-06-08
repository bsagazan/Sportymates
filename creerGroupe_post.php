<?php
session_start();
require_once("../modele/connect.php");

$req = $bdd->prepare('INSERT INTO groupe(nomGroupe, leader, nomSport, idClub, creation, ville, niveau, nbreMax, description,imgGroupe) VALUES (:nomGroupe,:leader,:nomSport,:idClub,NOW(),:ville,:niveau, :nbreMax, :description,:imgGroupe)');

if(isset($_FILES['imgGroupe']) AND $_FILES['imgGroupe']['error'] == 0)
{

    if($_FILES['imgGroupe']['size'] <= 1048576)
    {

        $infosfichier = pathinfo($_FILES['imgGroupe']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg','jpeg','gif','png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            $nom = strtolower(str_replace(' ','-',$_POST['nomGroupe']));
            $adresse = $nom.'.'.$extension_upload;
            move_uploaded_file($_FILES['imgGroupe']['tmp_name'], '../vue/groupe/img-groupe/'.$adresse);
        }
    }
}else{
    $adresse ="default.png";
}

$req->execute(array(
    'nomGroupe'=> $_POST['nomGroupe'],
    'leader'=> $_SESSION['pseudo'],
    'nomSport'=> $_POST['sport'],
    'idClub'=>$_POST['idClub'],
    'ville'=>$_POST['ville'],
    'niveau'=>$_POST['niveau'],
    'nbreMax'=>$_POST['nbreMax'],
    'description'=>$_POST['description'],
    'imgGroupe' =>$adresse
));
header('Location: http://localhost/Sportymates/vue/groupe/pageGroupe.php?identifiant='.$_POST['nomGroupe']);
?>
