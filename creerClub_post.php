<?php
require_once("../modele/connect.php");

$req = $bdd->prepare('INSERT INTO club( adresse, telephone, heureOuverture, heureFermeture, jourOuverture, jourFermeture, description,nomClub, imgClub) VALUES (:adresse,:telephone,:heureOuverture,:heureFermeture,:jourOuverture, :jourFermeture,:description,:nomClub,:imgClub)');

if(isset($_FILES['imgClub']) AND $_FILES['imgClub']['error'] == 0)
{

    if($_FILES['imgClub']['size'] <= 1048576)
    {

        $infosfichier = pathinfo($_FILES['imgClub']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg','jpeg','gif','png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            $nom = strtolower(str_replace(' ','-',$_POST['nomClub']));
            $adresse = $nom.'.'.$extension_upload;
            move_uploaded_file($_FILES['imgClub']['tmp_name'], 'Clubs/img-Clubs/'.$adresse);
        }
    }
}

$req->execute(array(
    'adresse'=> $_POST['adresse'],
    'telephone'=> $_POST['telephone'],
    'heureOuverture'=>$_POST['heureOuverture'],
    'heureFermeture'=>$_POST['heureFermeture'],
    'jourOuverture'=>$_POST['jourOuverture'],
    'jourFermeture'=>$_POST['jourFermeture'],
    'description'=>$_POST['description'],
    'nomClub'=> $_POST['nomClub'],
    'imgClub' =>$adresse
));
header('Location: pageclub.php?identifiant='.$_POST['nomClub']);
?>
