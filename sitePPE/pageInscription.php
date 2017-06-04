<?php
session_start();
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u511042062_ppe;charset=utf8', 'u511042062_root', 'ppegastonberger2017'); //connection à la bdd
if(isset($_POST['bouton'])) //Si l'utilisateur valide
{
$nom = htmlspecialchars(trim($_POST['nom']));
$nomResponsable = htmlspecialchars(trim($_POST['nomResponsable']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$login = htmlspecialchars(trim($_POST['login']));
$mdp = htmlspecialchars(trim($_POST['mdp']));
$mdp2 = htmlspecialchars(trim($_POST['mdp2']));
  if($nom&&$nomResponsable&&$adresse&&$login&&$mdp&&$mdp2) //Si touts les champs sont entrés
  {
    if($mdp==$mdp2) // Si les 2 mots de passes entrés se correspondent
    {
      if(strlen($mdp)>3) // Si le mot de passe est supérieur à 3
      {

         $reqpseudo = $bdd -> prepare("SELECT * FROM infoinscription WHERE login = ?");
         $reqpseudo -> execute(array($login));
         $pseudoexist = $reqpseudo -> rowCount();
        if($pseudoexist == 0)
        {

              $req = $bdd->prepare('INSERT INTO infoinscription(login, mdp, mdp2, nomResponsable, nom, adresse) VALUES(:login, :mdp, :mdp2, :nomResponsable, :nom, :adresse)');

              $req->execute(array(
              'nom' => $nom,
              'nomResponsable' => $nomResponsable,
              'adresse' => $adresse,  
              'login' => $login,
              'mdp' => $mdp,
              'mdp2' => $mdp2
               ));

              $_SESSION['login']=$login;
              $_SESSION['nom']=$nom;
              $_SESSION['nomResponsable']=$nomResponsable;
              $_SESSION['adresse']=$adresse;
              $_SESSION['mdp']=$mdp;
              $_SESSION['mdp2']=$mdp2;
         
              header('location:index.php');

        } else $messageErreur = '<p class = "phrase"> Le nom d\'utilisateur est déjà utilisé</p>';

      }else $messageErreur = '<p class = "phrase"> Le mot de passe est trop petit </p>'; 

    }else $messageErreur = '<p class = "phrase"> Les mots de passes ne sont pas identiques </p>';

  }else $messageErreur ='<p class = "phrase"> Veuillez saisir tous les champs </p>';
}

?>

<html class="inscription">
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

    <body class="sierra">

    <?php
    include('inc/menu.php');
    ?>

    <div class="formPosition">
    <form action="#" method="POST" class="form-horizontal">
        <center><a href="index.php"><img src="images/AgrurLogoFondTransparent+Ins.png"></a></center>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nom" id="text" placeholder="Entrez le Nom de la société">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nomResponsable" id="text" placeholder="Entrez le Nom du Responsable">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="adresse" id="text" placeholder="Entrez l'adresse de la société">
                </div>
        </div>
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
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <input type="password" class="form-control" name="mdp2" id="pwd" placeholder="Confirmez votre mot de passe">
                </div>
        </div>
        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" name="bouton" class="btn btn-default"><b>Valider</b></button>

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

</html>