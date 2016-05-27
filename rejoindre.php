<?php
	session_start();
	var_dump($_GET["identifiant"]);
	$idGroupe = $_GET["identifiant"];

	try
		{
    	$bdd = new PDO('mysql:host=localhost;dbname=sportymates;charset=utf8', 'Vincent', '');
    	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

	catch (Exception $e)
		{
        die('Erreur : ' . $e->getMessage());
		}

		$bdd->exec("INSERT INTO groupeinscrit(nomUtilisateur, nomGroupe) VALUES ('$_SESSION["pseudo"]', '$idGroupe')");
?>

<?php
	header("Location: pageGroupe?identifiant=$idGroupe");
	exit;
?>
