<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', ''); //connection à la bdd

    $req = 'SELECT * FROM variete';
    $vari = $bdd->prepare($req);
    $vari->execute();
    $donneesVariete = $vari->fetchAll(PDO::FETCH_ASSOC);

    $req = 'SELECT * FROM typeproduit';
    $typeproduit = $bdd->prepare($req);
    $typeproduit->execute();
    $donneesTypeProduit = $typeproduit->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['bouton'])) {


        //Insertion des données dans la bdd
        $id_variete = htmlspecialchars(trim($_POST['id_variete']));
        $id_typeProduit = htmlspecialchars(trim($_POST['id_typeProduit']));
        $calibre = htmlspecialchars(trim($_POST['calibre']));
        $id_variete = htmlspecialchars(trim($_POST['id_variete']));
        $quantite_Lot = htmlspecialchars(trim($_POST['quantite_Lot']));

            $req = 'INSERT INTO lot(id_variete, id_typeProduit, calibre, quantite_Lot) VALUES(:id_variete, :id_typeProduit, :calibre, :quantite_Lot)';
        
            $exec = $bdd->prepare($req);

            $exec->bindValue(':id_variete',$id_variete, PDO::PARAM_STR);
            $exec->bindValue(':id_typeProduit',$id_typeProduit, PDO::PARAM_STR);
            $exec->bindValue(':calibre',$calibre, PDO::PARAM_INT);
            $exec->bindValue(':quantite_Lot',$quantite_Lot, PDO::PARAM_STR);
        
            $exec -> execute();

    }
 ?>

<!DOCTYPE html>
<html>
    <head>
    	<!-- En-tête de la page -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index2.css" />
        <link href="/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Accueil - AGRUR</title>

    </head>

    <body class="sierra">
        <div class="banniere">
        <center><br><img src="images/AgrurLogoFondTransparent.png" width="150px" height="100px"></center>
        <br></div>
         <?php include('inc/menuAccueil.php'); 
		 ?>
		 
		 
		     <form action="#" method="POST" class="form-horizontal">
             <center> <h1 style="color:darkgreen">Ajouter un lot</h1> </center><br>

            <div class="form-group"> <!-- VARIETE -->
            
            <center>Variété de la noix : 
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
            </center>
            <div class="form-group"> <!-- VARIETE -->
            
            <center>Type de noix : 
            <SELECT value="id_typeProduit" name="id_typeProduit" type="text" size="1">
                  
            <?php
                foreach ($donneesTypeProduit AS $donneeTypeProduit)
                {
            ?>
                  
                <option value="<?php echo $donneeTypeProduit['id_typeProduit']; ?>"> <?php echo $donneeTypeProduit['id_typeProduit']."- ".$donneeTypeProduit['libelle_typeProduit']; ?> </option>

                <?php
                }
                ?>
            </SELECT>
            </div>
			</center>
			<div class="form-group"> <!-- calibre de la noix -->
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="calibre" id="calibre" placeholder="Entrez le calibre de la noix (en mm)">
                </div>
            </div>

            <div class="form-group"> <!-- calibre de la noix -->
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="quantite_Lot" id="quantite_Lot" placeholder="Entrez la quantite du lot (en kg)">
                </div>
            </div>
       
        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-4">
                <center> <button type="submit" name="bouton" class="btn btn-default"><b>Valider</b></button>  </center>

                <br><br>   
		 	</center>
		  </form>
		  
    </body>


    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html