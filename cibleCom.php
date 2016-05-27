<?php
session_start();
var_dump($_POST['contenuCom']);
$contenu = $_POST['contenuCom'];
$auteur = $_POST['auteur'];
$groupe = $_POST['groupe'];
try
	{
    $bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8', 'Vincent', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

catch (Exception $e)
	{
       die('Erreur : ' . $e->getMessage());
	}

$bdd->exec("INSERT INTO commentaire (contenu, dateHeure, nomGroupe, auteur) VALUES ('$contenu', NOW(), '$groupe', '$auteur')");

header("Location: pageGroupe?identifiant=$groupe");
exit;
?>