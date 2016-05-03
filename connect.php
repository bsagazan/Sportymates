+<?php
    $dbname = "sportymates";
    $host='localhost';
    $user='root';
    $pass='';

try
 {
  $db = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
  $db->query("SET NAMES UTF8");
 }
catch (Exception $e)
 {
  die('Erreur :' .$e->getMessage())
}


?>
