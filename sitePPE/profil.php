<?php
session_start();
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u511042062_ppe;charset=utf8', 'u511042062_root', 'ppegastonberger2017'); //connection à la bdd
  if(isset($_SESSION['id']))
    {
      $requser = $bdd ->prepare("SELECT * FROM infoinscription WHERE id = ?");
      $requser -> execute(array($_SESSION['id']));
      $user = $requser -> fetch();
  }

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
        <title>Projet PPE</title>
    </head>

  <body>
            <div class="banniere">
        <center><br><img src="images/AgrurLogoFondTransparent.png" width="13%" height="13%"></center>
        <br></div>
    <?php
      include('inc/menuAccueil.php');
      ?>
    <form method="POST" action="#">
      <section>
        <h1>Profil de <?php echo $user['login']; ?> </h1> <br/>

        pseudo : <?php echo $user['login']; ?> <br/>

        mot de passe : <?php echo $user['mdp']; ?> <br/>
        <?php
        if(isset($_SESSION['id']) AND $user['id'] == $_SESSION['id'])
        {
          ?>
          <a href="pageModification.php">Editer mon profil </a> <br/>

          <?php
        }
          ?>
      

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