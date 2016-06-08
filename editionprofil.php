<?php
session_start();

require_once("../modele/connect.php");

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newnom']) AND !empty($_POST['newnom'])) {
          $newnom = htmlspecialchars($_POST['newnom']);
          $updatenom = $bdd->prepare('UPDATE membres SET nom = ? WHERE id=?');
          $updatenom->execute(array($newnom,$_SESSION['id']));
          header('Location: profil.php?id='.$_SESSION['id']);
     }
     if(isset($_POST['newprenom']) AND !empty($_POST['newprenom'])) {
            $newprenom = htmlspecialchars($_POST['newprenom']);
            $updateprenom = $bdd->prepare('UPDATE membres SET prenom = ? WHERE id=?');
            $updateprenom->execute(array($newprenom,$_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
       }
       if(isset($_POST['newpays']) AND !empty($_POST['newpays'])) {
              $newpays = htmlspecialchars($_POST['newpays']);
              $updatepays = $bdd->prepare('UPDATE membres SET pays = ? WHERE id=?');
              $updatepays->execute(array($newpays,$_SESSION['id']));
              header('Location: profil.php?id='.$_SESSION['id']);
         }
         if(isset($_POST['newcodepostal']) AND !empty($_POST['newcodepostal'])) {
                $newcodepostal = htmlspecialchars($_POST['newcodepostal']);
                $updatecodepostal = $bdd->prepare('UPDATE membres SET codepostal = ? WHERE id=?');
                $updatecodepostal->execute(array($newcodepostal,$_SESSION['id']));
                header('Location: profil.php?id='.$_SESSION['id']);
           }
           if(isset($_POST['newnumtel']) AND !empty($_POST['newnumtel'])) {
                  $newnumtel = htmlspecialchars($_POST['newnumtel']);
                  $updatenumtel= $bdd->prepare('UPDATE membres SET numtel = ? WHERE id=?');
                  $updatenumtel->execute(array($newnumtel,$_SESSION['id']));
                  header('Location: profil.php?id='.$_SESSION['id']);
             }
             if(isset($_POST['newdatenaissance']) AND !empty($_POST['newdatenaissance'])) {
                    $newdatenaissance = htmlspecialchars($_POST['newdatenaissance']);
                    $updatedatenaissance= $bdd->prepare('UPDATE membres SET datenaissance = ? WHERE id=?');
                    $updatedatenaissance->execute(array($newdatenaissance,$_SESSION['id']));
                    header('Location: profil.php?id='.$_SESSION['id']);
               }
   if(isset($_FILES['photodeprofil']) AND !empty($_FILES['photodeprofil']))
   {
     $tailleMax=2097152;
     $extensionsValides = array('jpg','jpeg','gif','png');
     if($_FILES['photodeprofil']['size']<=$tailleMax)
     {
         $extensionUpload = strtolower(substr(strrchr($_FILES['photodeprofil']['name'],'.'),1));
         if(in_array($extensionUpload,$extensionsValides))
         {
             $chemin = "../vue/membre/photodeprofil/".$_SESSION['id'].".".$extensionUpload;
             $resultat=move_uploaded_file($_FILES['photodeprofil']['tmp_name'],$chemin);
             if($resultat)
             {
                  $updatephotodeprofil = $bdd->prepare('UPDATE membres SET photodeprofil = :photodeprofil WHERE id=:id');
                  $updatephotodeprofil->execute(array('photodeprofil' => $_SESSION['id'].".".$extensionUpload,'id'=>$_SESSION['id']));
                  header('Location: profil.php?id='.$_SESSION['id']);
             }
             else
             {
               $msg="Erreur lors de l'importation de votre photo de profil";
             }
         }
         else
         {
           $msg="Votre photo de profil doit être au format jpg,jpeg,gif ou png";
         }
     }
     else{
       $msg="Votre photo de profil ne doit dépasser 2 Mo";
     }
   }
?>
<html>
   <head>
      <title>Modifier profil</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="http://localhost/Sportymates/style/general.css" />
      <link rel="stylesheet" href="http://localhost/Sportymates/style/edition.css" />
   </head>
   <body>
     <div id='wrapper'>
       <header style="background-image:url(../images/profil3.jpg)">
           <?php
           include("../vue/entete2.php");
           include("../vue/nav.php");
           ?>
       </header>
      <div id="edition">
        <br/>
         <h2>Edition de mon profil</h2><br/><br/>

            <form method="POST" action="" enctype="multipart/form-data">
              <label>Nom :</label>
              <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['nom']; ?>" /><br /><br />
              <label>Prénom :</label>
              <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $user['prenom']; ?>" /><br /><br />
               <label>Pseudo :</label>
               <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
               <label>Pays :</label>
               <input type="text" name="newpays" placeholder="Pays" value="<?php echo $user['pays']; ?>" /><br /><br />
               <label>Code Postal :</label>
               <input type="text" name="newcodepostal" placeholder="Code postal" value="<?php echo $user['codepostal']; ?>" /><br /><br />
               <label>Numéro de téléphone :</label>
               <input type="tel" name="newnumtel" placeholder="num tel" value="<?php echo $user['numtel']; ?>" /><br /><br />
               <label>Date de naissance :</label>
               <input type="date" name="newdatenaissance" placeholder="date de naissance" value="<?php echo $user['datenaissance']; ?>" /><br /><br />
               <label> Photo de profil : </label></br>
               <input type="file" name="photodeprofil"/><br></br>
               <input type="submit" value="Mettre à jour mon profil !" class='bouton' />
               <br/><br/>
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
    </div>
    <?php
    include("../vue/bas.php");
    ?>
   </body>
</html>
<?php
}
else {
   header("Location: connexion.php");
}
?>
