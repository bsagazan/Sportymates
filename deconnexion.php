<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location:http://localhost/Sportymates/vue/membre/pageConnexion.php");
?>
