<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=sportymates', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Mon profil</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="http://localhost/Sportymates1/style/accueil2.css" />
      <link rel="stylesheet" href="http://localhost/Sportymates1/style/profil.css" />
   </head>
   <body>
     <div id='wrapper'>
       <header style="background-image:url(../images/profil3.jpg)">
           <?php
           include("../vue/banniere_entete2.php");
           include("../vue/nav.php");
           ?>
       </header>
      <div align="center">
        <br /><br />
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br />
         <?php
         if(!empty($userinfo['photodeprofil']))
         {
          ?>
          <img width="150" src="membres/photodeprofil/<?php echo $userinfo['photodeprofil'];?>"/>
         <?php
          }
         ?>
         <br /><br />
         <?php
         if(!empty($userinfo['nom']))
         {
          ?>
          <strong>Nom : </strong><?php echo $userinfo['nom']; ?>
         <?php
          }
         ?>
         <br /><br />
         <?php
         if(!empty($userinfo['prenom']))
         {
          ?>
        <strong>Prenom : </strong><?php echo $userinfo['prenom']; ?>
         <?php
          }
         ?>
         <br /><br />
         <?php
         if(!empty($userinfo['pays']))
         {
          ?>
        <strong>Pays : </strong><?php echo $userinfo['pays']; ?>
         <?php
          }
         ?>
         <br /><br />
         <?php
         if(!empty($userinfo['codepostal']))
         {
          ?>
          <strong>  Code Postal :   </strong><?php echo $userinfo['codepostal']; ?>
         <?php
          }
         ?>
         <br /><br />
         <?php
         if(!empty($userinfo['numtel']))
         {
          ?>
            <strong>Numéro de teléphone : </strong><?php echo $userinfo['numtel']; ?>
         <?php
          }
         ?>
         <br /><br />
         <?php
         if(!empty($userinfo['datenaissance']))
         {
          ?>
            <strong>Date de naissance :  </strong> <?php echo $userinfo['datenaissance']; ?>
         <?php
          }
         ?>
         <br /><br />
           <strong>Pseudo : </strong><?php echo $userinfo['pseudo']; ?>
         <br /><br />
           <strong>Mail : </strong><?php echo $userinfo['mail']; ?>
         <br /><br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <input class="boutons" type="submit" value="Editer mon profil" onClick="window.location = 'editionprofil.php'"></code>
         <input class="boutons" type="submit" value="Se déconnecter" onClick="window.location = 'deconnexion.php'"></code>
         <input class="boutons" type="submit" value="Retourner à l'accueil" onClick="window.location = '../vue/accueilv3.php'"></code>

         <?php
         }
         ?>
         <br /><br />
      </div>
    </div>
   </body>
   <?php
   include("../vue/bas.php");
   ?>
</html>
<?php
}
?>
