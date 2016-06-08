<?php
require_once("../modele/connect.php");

if(isset($_GET['pseudo'], $_GET['key']) AND !empty($_GET['pseudo']) AND !empty($_GET['key'])) {
 $pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
 $key = htmlspecialchars($_GET['key']);
 $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND confirmkey = ?");
 $requser->execute(array($pseudo, $key));
 $userexist = $requser->rowCount();
 if($userexist == 1) {
    $user = $requser->fetch();
    if($user['confirme'] == 0) {
       $updateuser = $bdd->prepare("UPDATE membres SET confirme = 1 WHERE pseudo = ? AND confirmkey = ?");
       $updateuser->execute(array($pseudo,$key));
       echo "Votre compte a bien été confirmé ! <a href='http://localhost/Sportymates/vue/accueil.php'>Retour à la page d'accueil!!</a>";
    } else {
       echo "Votre compte a déjà été confirmé ! <a href='http://localhost/Sportymates/vue/accueil.php'>Retour à la page d'accueil!!</a>";
    }
 } else {
    echo "L'utilisateur n'existe pas !";
 }
}
?>
