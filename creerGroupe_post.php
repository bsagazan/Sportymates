<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
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
            move_uploaded_file($_FILES['imgGroupe']['tmp_name'], '../../Vue/Groupes/img-Groupes/'.$adresse);
        }
    }   
}

$req->execute(array(
    'nomGroupe'=> $_POST['nomGroupe'],
    'leader'=> $_POST['nomLeader'],
    'nomSport'=> $_POST['sport'],
    'idClub'=>$_POST['idClub'],
    'ville'=>$_POST['ville'],
    'niveau'=>$_POST['niveau'],
    'nbreMax'=>$_POST['nbreMax'],
    'description'=>$_POST['description'],
    'imgGroupe' =>$adresse
));
header('Location: ../../Vue/Groupes/modele.php?groupe='.$_POST['nomGroupe']);
?>




