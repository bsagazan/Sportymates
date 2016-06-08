<?php
session_start();

require_once("../modele/connect.php");

if(isset($_POST['connexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
        $user = $requser->fetch();
        if($user['confirme'] == 1) {
         $_SESSION['id'] = $user['id'];
         $_SESSION['pseudo'] = $user['pseudo'];
         $_SESSION['level'] = $user['level'];
         $_SESSION['mail'] = $user['mail'];
         if($_SESSION['level']==4){
           header("Location: http://localhost/Sportymates/vue/membre/BackOffice.php");
         }else{
           header("Location: profil.php?id=".$_SESSION['id']);
         }
       } else {
          echo "Vous n'avez pas confirmé  votre compte !<a href='http://localhost/Sportymates/vue/membre/pageConnexion.php'>Retour à la page connexion!!</a>";
       }
      } else {
         echo "Mauvais mail ou mot de passe ! ou  alors Une erreur est survenue, veuillez réessayer !<a href='http://localhost/Sportymates/vue/membre/pageConnexion.php'>Retour à la page connexion!!</a>";
      }
   } else {
      echo "Tous les champs doivent être complétés !<a href='http://localhost/Sportymates/vue/membre/pageConnexion.php'>Retour à la page connexion!!</a>";
   }
}
?>
