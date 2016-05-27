<?php
session_start();
$groupe = $_POST['groupe'];
$auteur = $_POST['auteur'];
$note = $_POST['note'];

try
	{
    $bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8', 'Vincent', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

catch (Exception $e)
	{
       die('Erreur : ' . $e->getMessage());
	}

$bdd->exec("INSERT INTO notergroupe (nomGroupe, nomUtilisateur, note) VALUES ('$groupe', '$auteur', '$note')");

header("Location: pageGroupe?identifiant=$groupe");
exit;
?>