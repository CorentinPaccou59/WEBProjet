<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', '');
$getid = intval ($_GET['id']);
$accepte = $bdd -> prepare("UPDATE connexion SET accepte = ? WHERE id_connexion = ?");
$accepte -> execute(array(1, $getid));
header('Location: ../ajoutProducteursAdmin.php');
?>