<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', ''); //connection à la bdd

  if(isset($_POST['boutonconnect'])){
      $login = htmlspecialchars(trim($_POST['login']));
      $mdp = htmlspecialchars(trim($_POST['mdp']));

      if($login&&$mdp) //Si touts les champs sont entrés
       {

            $requser = $bdd->prepare("SELECT * FROM connexion WHERE login = ? AND mdp = ? ");
            $requser -> execute(array($login, $mdp));
            $userexist = $requser -> rowCount();
            $userinfo = $requser -> fetch();
              if($userexist ==1)
              {
                if($userinfo['accepte'] ==1)
                {

                $_SESSION['id_connexion'] = $userinfo ['id_connexion'];
                $_SESSION['login'] = $userinfo ['login'];
                $_SESSION['mdp'] = $userinfo ['mdp'];
                $_SESSION['id_droit'] = $userinfo ['id_droit'];
                header("Location: accueil.php");

                }else $messageErreur = '<p class = "phrase">Votre compte n\'a pas encore été activé <p/>';

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
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
                    <input type="text" class="form-control" name="login" id="text" placeholder="Entrez votre login">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <input type="password" class="form-control" name="mdp" id="pwd" placeholder="Entrez votre mot de passe">
                </div>
        </div>
        <center>
        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" name="boutonconnect" class="btn btn-default"><b>Se connecter</b></button>
                <br><br>
                <a class="sinscrire" href="pageInscription.php">S'inscrire en tant que client?</a> <br> <br>
                <a class="sinscrire" href="pageInscriptionProdExt.php">Vous êtes producteur extérieur? Faire une demande d'inscription.</a>
                <br><br>
        <?php 
            if(isset($messageErreur)){

            echo $messageErreur;
            }
        ?>
            </div>
        </div>
        </center>
       
    </form>
    </div>

    </body>

    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>

</html>