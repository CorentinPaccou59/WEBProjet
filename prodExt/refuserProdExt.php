<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', '');

	$getid = intval($_GET['id']);
	$supp = ("DELETE FROM connexion WHERE id_Connexion = $getid");
	$bdd ->exec($supp);
	header("Location: ../ajoutProducteursAdmin.php");
?>