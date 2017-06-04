<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', '');
ini_set( 'display_errors', 'on' );
error_reporting( E_ALL );


    $req = 'SELECT * FROM variete';
            $vari = $bdd->prepare($req);
            if (!$vari->execute()) {
                echo 'Erreur recup donnees RAISON';
    
            } else {
                $donneesVariete = $vari->fetchAll(PDO::FETCH_ASSOC);

            if(isset($_POST['bouton']))
            {
            $nom = htmlspecialchars(trim($_POST['nom']));
            $superficie = htmlspecialchars(trim($_POST['superficie']));
            $arbres_hectare = htmlspecialchars(trim($_POST['arbres_hectare']));
            $id_variete = htmlspecialchars(trim($_POST['id_variete']));


                $req = 'INSERT INTO verger(nom, superficie, arbres_hectare, id_variete, id_connexion) VALUES(:nom, :superficie, :arbres_hectare, :id_variete, :id_connexion)';
            
                $exec = $bdd->prepare($req);
            
                $exec->bindValue(':nom',$nom, PDO::PARAM_STR);
                $exec->bindValue(':superficie',$superficie, PDO::PARAM_STR);
                $exec->bindValue(':arbres_hectare',$arbres_hectare, PDO::PARAM_INT);
                $exec->bindValue(':id_variete',$id_variete, PDO::PARAM_STR);
                $exec->bindValue(':id_connexion',$_SESSION['id_connexion'], PDO::PARAM_STR);
            
                $exec -> execute();



              header('#');
      }
}
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
    <center>
    <div class="formPosition">
    <form action="#" method="POST" class="form-horizontal">
        <center> <h1 style="color:darkgreen">Verger</h1> </center>
        <br>
        <div class="form-group"> <!-- NOM VERGER -->
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nom" id="text" placeholder="Entrez le nom du verger">
                </div>
        </div>
        <div class="form-group"> <!-- SUPERFICIE -->
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="superficie" id="text" placeholder="Entrez la superficie du verger">
                </div>
        </div>
        <div class="form-group"> <!-- HECTARE -->
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="arbres_hectare" id="text" placeholder="Entrez le nom d'hectare">
                </div>
        </div>

        <div class="form-group"> <!-- VARIETE -->
            
             Variété de la noix : 
              <SELECT value="id_variete" name="id_variete" type="text" size="1">
                  
                  <?php
                  foreach ($donneesVariete AS $donneeVariete)
                  {
                    ?>
                  
                  <option value="<?php echo $donneeVariete['id_variete']; ?>"> <?php echo $donneeVariete['id_variete']."- ".$donneeVariete['libelle']; ?> </option>

                  <?php
                  }
                  ?>
                      </SELECT>

			  </div>

        <div class="form-group"> <!-- BOUTON VALIDER -->
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" name="bouton" class="btn btn-default"><b>Valider</b></button>

            </div>
        </div>
    </div>
    </form>
    </div>
    </center>

    </body>

</html>