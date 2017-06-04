<?php
session_start();
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u511042062_ppe;charset=utf8', 'u511042062_root', 'ppegastonberger2017'); //connection à la bdd

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval ($_GET['id']); //Sécuriser la variable
    $requser = $bdd -> prepare ('SELECT * FROM infoinscription WHERE id = ?');
    $requser ->execute(array($getid));
    $userinfo = $requser -> fetch();

    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']){

 ?>

<!DOCTYPE html>
<html>
    <head>
    	<!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="index2.css" />
        <link href="/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Accueil - AGRUR</title>
    </head>

	<body>
        <div class="banniere">
        <center><br><img src="images/AgrurLogoFondTransparent.png" width="13%" height="13%"></center>
        <br></div>
        
        <?php
        include('inc/menuAccueil.php');

            if(isset($messageErreur)){

            echo $messageErreur;
            }
        ?>
        
    </body>

    <?php 
        }
    } 
    ?>

    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>