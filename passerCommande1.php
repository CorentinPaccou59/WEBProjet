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

        <center> <h1 style="color:darkgreen">Lots disponibles</h1></center><br>
        <?php
        $lot = $bdd->query('SELECT * FROM lot, variete, typeproduit WHERE lot.id_variete = variete.id_variete AND lot.id_typeProduit = typeproduit.id_typeProduit');
        while ($donnees = $lot -> fetch())
            {
        ?>
        <table class="table table-hover">
                <tr> 
                    <th>Variété </th>
                    <th>Type de produits </th>
                    <th>Calibre </th>
                    <th>Quantité disponibles </th>
                    <th></th>

                </tr>


                <tr>
                    <td><?php echo $donnees['libelle'] ?></td>
                    <td><?php echo $donnees['libelle_typeProduit'] ?></td>
                    <td><?php echo $donnees['calibre'] ?></td>
                    <td><?php echo $donnees['quantite_Lot']."kg" ?></td>
                    <td><a href="passerCommande2.php?id=<?php echo $donnees['id_Lot']; ?>"> Commander </td>

                </tr>
                </br> </br>

        <?php

            }
        ?>

        </table>
    </body>

</html>