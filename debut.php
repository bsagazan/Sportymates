<head>
<?php
if (!empty($titre))
{
    echo '<title> '.$titre.' </title>';
}
else //Sinon, on écrit forum par défaut
{
    echo '<title> Forum </title>';
}
?>

<meta charset="utf-8" />
<link rel="stylesheet" href="http://localhost/Sportymates1/style/Design.css" />
<link rel="stylesheet" href="http://localhost/Sportymates1/style/accueilv2.css" />
<link rel="icon" type="image/ico" href=logo3.png />
<title>Sportymates Forum</title>
</head>

<?php
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

//On inclue les 2 pages restantes
include("functions.php");
include("constants.php");
?>
