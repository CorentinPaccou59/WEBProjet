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

        <center> <h1 style="color:darkgreen">Nos vergers</h1></center><br>
        <?php
        $Verger = $bdd->query('SELECT * FROM verger, variete, connexion WHERE variete.id_variete = verger.id_variete
                                                                        AND   verger.id_connexion = connexion.id_connexion');
        while ($donnees = $Verger -> fetch())
            {
        ?>
        <table class="table table-hover">
                <tr> 
                    <th>Nom du verger</th>
                    <th>Superficie </th>
                    <th>Nombre d'arbres en hectares </th>
                    <th>Variété </th>
                    <th>Nom du producteur </th>

                </tr>


                <tr>
                    <td><?php echo $donnees['nom'] ?></td>
                    <td><?php echo $donnees['superficie'] ?></td>
                    <td><?php echo $donnees['arbres_hectare'] ?></td>
                    <td><?php echo $donnees['libelle'] ?></td>
                    <td><?php echo $donnees['login'] ?></td>

                </tr>
                </br> </br>

        <?php
            }
        ?>

        </table>
    </body>

</html>