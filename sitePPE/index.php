<?php
session_start();
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u511042062_ppe;charset=utf8', 'u511042062_root', 'ppegastonberger2017'); //connection à la bdd

  if(isset($_POST['boutonconnect'])){
      $login = htmlspecialchars(trim($_POST['login']));
      $mdp = htmlspecialchars(trim($_POST['mdp']));

      if($login&&$mdp) //Si touts les champs sont entrés
       {

            $requser = $bdd->prepare("SELECT * FROM infoinscription WHERE login = ? AND mdp = ? ");
            $requser -> execute(array($login, $mdp));
            $userexist = $requser -> rowCount();
              if($userexist ==1)
              {

                $userinfo = $requser -> fetch();
                $_SESSION['id'] = $userinfo ['id'];
                $_SESSION['login'] = $userinfo ['login'];
                $_SESSION['nomResponsable'] = $userinfo ['nomResponsable'];
                $_SESSION['nom'] = $userinfo ['nom'];
                $_SESSION['adresse'] = $userinfo ['adresse'];
                $_SESSION['mdp2'] = $userinfo ['mdp2'];
                $_SESSION['mdp'] = $userinfo ['mdp'];
                header("Location: accueil.php?id=".$_SESSION['id']);


              } else $messageErreur = '<p class = "phrase">Nom d\'utilisateur ou mot de passe introuvable <p/>';

       } else $messageErreur = '<p class = "phrase"> Veuillez saisir touts les champs.<p/>';
    }

?>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="index.css" />
        <link href="/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Projet PPE</title>
    </head>

    <body>

    <?php
    include('inc/menu.php');
    ?>

    <div class="formPosition">
    <form action="#" method="post" class="form-horizontal">
        <center><a href="index.php"><img src="images/AgrurLogoFondTransparent2.png"></a></center>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="login" id="text" placeholder="Entrer votre login">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <input type="password" class="form-control" name="mdp" id="pwd" placeholder="Entrer votre mot de passe">
                </div>
        </div>
        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" name="boutonconnect" class="btn btn-default"><b>Se connecter</b></button>
                <br><br>
                <a class="sinscrire" href="pageInscription.php">Ou s'incrire ?</a>
<br><br>
        <?php 
            if(isset($messageErreur)){

            echo $messageErreur;
            }
        ?>
            </div>
        </div>
       
    </form>
    </div>

    </body>

    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>

</html>