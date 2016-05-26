<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8','root','root');
}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$var1 = $_GET["groupe"];
if (isset($var1)){
    $reponse = $bdd->prepare('SELECT * FROM groupe WHERE nomGroupe = ?');
    $reponse -> execute(array($var1));
    $donnees = $reponse->fetch();
    $titre = $donnees['nomGroupe'];
    $nomSport = $donnees['nomSport'];
    $niveau = $donnees['niveau'];
    $description = $donnees['description'];
    $imgGroupe = $donnees['imgGroupe'];
    $nbreMax = $donnees['nbreMax'];   
    
    $req = $bdd->prepare('SELECT COUNT(nomUtilisateur) FROM faitpartide WHERE nomGroupe = ?');
    $req -> execute(array($var1));
    $don = $req->fetch();
    $nbreMembre = $don['COUNT(nomUtilisateur)'];
    include("profil-groupe.php");
    
}
else{
    echo "Erreur !";
}
$reponse->closeCursor();

?>