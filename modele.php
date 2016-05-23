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
    $rep = $bdd->prepare('SELECT * FROM groupe WHERE nomGroupe = ?');
    $rep->execute(array($var1));
    $don=$rep->fetch();
    $titre = $don['nomGroupe'];
    $nomSport = $don['nomSport'];
    $niveau = $don['niveau'];
    $description = $don['description'];
    $imgGroupe = $don['imgGroupe'];
    $nbreMax = $don['nbreMax'];
    include("profil-groupe.php");
}
else{
    echo "Erreur !";
}


?>