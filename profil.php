<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', ''); //connection à la bdd

  $getid = intval ($_GET['id']);
  $req = $bdd -> prepare ('SELECT * FROM connexion, producteurs
                            WHERE producteurs.id_connexion = connexion.id_connexion
                            AND connexion.id_connexion = ?');
  $req ->execute(array($getid));
  $user = $req -> fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
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

  <body>
    <div class="banniere">
      <center>
      <br>
        <img src="images/AgrurLogoFondTransparent.png" width="150px" height="100px">
      </center>
      <br>
    </div>
    <?php
      include('inc/menuAccueil.php');
    ?>
    <a class="retour" href="javascript:history.go(-1)"><img src="images/retour.png"></a>
    <form method="POST" action="#">
      <section>
        <center>
          <h1 style="color:darkgreen">Informations personnelles de <?php echo $user['login']; ?></h1>
        </center>
        <br>

        <div class="infoProfil">
          <b>Nom de votre société :</b> <?php echo $user['nom_Entreprise']; ?><br>
          <b>Nom (reponsable) :</b> <?php echo $user['nom_Responsable']; ?><br>
          <b>Adresse de votre société :</b> <?php echo $user['adresse_Entreprise']; ?><br>
          <b>Login :</b> <?php echo $user['login']; ?><br>
          <b>Mot de passe :</b> 
          <?php 
		  $etoile='';
          for($i=0; $i<strlen($user['mdp']); $i++)
          {
            $etoile=$etoile ."•";
          }
          echo $etoile; ?>
          <br>

          <?php
            if(isset($_SESSION['id_connexion']) AND $user['id_connexion'] == $_SESSION['id_connexion'])
            {
          ?>
            
            <br>
            <a href="pageModification.php" class="btn-default2">Editer mon profil </a><br>

          <?php
            }
          ?>
        </div>

    </section>    
  </form>
<br/> <br/>
 <?php 
   if(isset($messageErreur)){

   echo $messageErreur;
    }
   ?>

  </body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>