<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', '');
$getid = intval ($_GET['id']);
$accepte = $bdd -> prepare("UPDATE commande SET etat = ? WHERE numCommande = ?");
$accepte -> execute(array("Conditionné", $getid));

$dateCond = $bdd -> prepare("UPDATE commande SET date_conditionnement = ? WHERE numCommande = ?");
$dateCond -> execute(array(" le ".date("d-m-y")." à ".date("H:i:s"), $getid));

header('Location: ./consultCommandesAgrur.php');
?>