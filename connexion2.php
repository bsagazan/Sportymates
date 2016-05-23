<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=sportymates', 'root', '');

if(isset($_POST['connexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
         echo "Mauvais mail ou mot de passe ! ou  alors Une erreur est survenue, veuillez réessayer !";
      }
   } else {
      echo "Tous les champs doivent être complétés !";
   }
}
?>
