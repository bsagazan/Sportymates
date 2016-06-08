<?php
 session_start();
 define('ADMIN',$_SESSION['nomUtilisateur']);
 if (!session_is_registered('nomUtilisateur')){

   header("Location:../vue/accueil.php");
 }
 ?>
