<?php
session_start();
require_once("../modele/connect.php");

$idClub = $_POST['idClub'];
$auteur = $_POST['auteur'];
$note = $_POST['note'];
$club = $_POST['nomClub'];

$presence = 0;

$reponse = $bdd->query("SELECT * FROM noterclub WHERE idClub = '$idClub' AND pseudo = '$auteur' ");
$club = $_POST['nomClub'];

while ($donnees = $reponse->fetch()) {

	if ($donnees["pseudo"] == $auteur){
		$presence = 1;
	}
}

if ($presence == 1) {
	$bdd->exec("UPDATE noterclub SET note = $note WHERE idClub = '$idClub' AND pseudo = '$auteur'");
}

if ($presence == 0) {
	$bdd->exec("INSERT INTO noterclub (idClub, pseudo, note) VALUES ('$idClub', '$auteur', '$note')");
}

header("Location: pageclub.php?identifiant=$club");
exit;

?>
