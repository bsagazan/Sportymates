<?php
require_once("connect.php");

function redirection($niveau)
{
  switch ($niveau) {
    case "2"://membre
        header("Location: profil1.php?pseudo=".$_SESSION['pseudo']);
        break;
    case "3":
    header("Location: profil1.php?pseudo=".$_SESSION['pseudo']);
        break;
    case "4":
    header("Location: profil1.php?pseudo=".$_SESSION['pseudo']);
        break;
    default:
    header('Location: http://localhost/Sportymates1/vue/accueilv2.php');
  }
?>
