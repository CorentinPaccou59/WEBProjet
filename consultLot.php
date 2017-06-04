<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', '');
ini_set( 'display_errors', 'on' );
error_reporting( E_ALL );

?>

<html class="inscription">
    <head>
        <!-- BOOTSTRAP -->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="index2.css" />
        <link href="/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <title>Projet PPE</title>
    </head>

        <div class="banniere">
        <center><br><img src="images/AgrurLogoFondTransparent.png" width="150px" height="100px"></center>
        <br></div>
        
        <?php
        include('inc/menuAccueil.php');   
        ?>

        <center> <h1 style="color:darkgreen">Nos lots</h1> </center><br>
        <?php
            $Lot = $bdd->query('SELECT * FROM lot, variete, typeproduit WHERE lot.id_variete = variete.id_variete AND lot.id_typeProduit = typeproduit.id_typeProduit'); 
            $i=1;
            while ($donnees = $Lot -> fetch())
            { 
        ?>
        <table class="table table-hover">
        Lot n°<?php echo $i;?>
                <tr> 
                    <th>Nom de la variété</th>
                    <th>Nom du type de produit </th>
                    <th>Le calibre </th>
                    <th>La quantité </th>

                </tr>
            
                <tr>
                    <td><?php echo $donnees['libelle'] ?></td>
                    <td><?php echo $donnees['libelle_typeProduit'] ?></td>
                    <td><?php echo $donnees['calibre'] ?></td>
                    <td><?php echo $donnees['quantite_Lot'] ?></td>
                </tr>
        <?php
            $i = $i + 1;
            }
        ?>
        </table>
    </body>

</html>