<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', '');
ini_set( 'display_errors', 'on' );
error_reporting( E_ALL );

?>

<html class="inscription">
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="index2.css" />
        <link href="/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

        <title>Projet PPE</title>
    </head>

        <div class="banniere">
        <center><br><img src="images/AgrurLogoFondTransparent.png" width="150px" height="100px"></center>
        <br></div>
        
        <?php
        include('inc/menuAccueil.php');   
        ?>

        <center> <h1 style="color:darkgreen">Producteurs</h1></center><br>
        <table class="table table-hover">
                <tr> 
                    <th>Login</th>
                    <th>Nom du responsable</th>
                    <th>Nom de l'entreprise </th>
                    <th>Adresse de l'entreprise</th>
                    <th>Interne/Externe</th>

                </tr>
        <?php

        $Verger = $bdd->query('SELECT * FROM connexion, producteurs WHERE connexion.id_connexion = producteurs.id_connexion');
        while ($donnees = $Verger -> fetch())
            {

                
        ?>

                <tr>
                    <td><?php echo $donnees['login'] ?></td>
                    <td><?php echo $donnees['nom_Responsable'] ?></td>
                    <td><?php echo $donnees['nom_Entreprise'] ?></td>
                    <td><?php echo $donnees['adresse_Entreprise'] ?></td>
                    <td><?php echo $donnees['Interne'] ?></td>
                </tr>
        

        <?php
            }
        ?>
        </table>
    </body>

</html>