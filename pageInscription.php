<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', '');
if(isset($_POST['bouton2'])) //Si l'utilisateur valide
{
$nom_Client = htmlspecialchars(trim($_POST['nom_Client']));
$adresse_Client = htmlspecialchars(trim($_POST['adresse_Client']));
$nom_Responsable_Achats = htmlspecialchars(trim($_POST['nom_Responsable_Achats']));
$login = htmlspecialchars(trim($_POST['login']));
$mdp = htmlspecialchars(trim($_POST['mdp']));
$mdp2 = htmlspecialchars(trim($_POST['mdp2']));
  if($nom_Client&&$adresse_Client&&$nom_Responsable_Achats&&$login&&$mdp&&$mdp2) //Si touts les champs sont entrés
  {
    if($mdp==$mdp2) // Si les 2 mots de passes entrés se correspondent
    {
      if(strlen($mdp)>3) // Si le mot de passe est supérieur à 3
      {

        $reqpseudo = $bdd -> prepare("SELECT * FROM connexion WHERE login = ?");
        $reqpseudo -> execute(array($login));
        $pseudoexist = $reqpseudo -> rowCount();
        if($pseudoexist == 0)
        {

              $req = $bdd->prepare('INSERT INTO connexion(login, mdp, mdp2, id_droit, accepte) VALUES(:login, :mdp, :mdp2, :id_droit, :accepte)');

              $req->execute(array(
              'mdp' => $mdp,
              'login' => $login,
              'mdp2' => $mdp2,
              'id_droit' => 3,
              'accepte' => 1
               ));


              $req2 = $bdd->prepare('INSERT INTO client(nom_Client, adresse_Client, nom_Responsable_Achats, id_connexion) VALUES(:nom_Client, :adresse_Client, :nom_Responsable_Achats, LAST_INSERT_ID())');

              $req2->execute(array(
              'nom_Client' => $nom_Client,
              'adresse_Client' => $adresse_Client,
              'nom_Responsable_Achats' => $nom_Responsable_Achats
               ));
         
              header('location: index.php');

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
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
                    <input type="text" class="form-control" name="nom_Client" id="text" placeholder="Entrez votre nom">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="adresse_Client" id="text" placeholder="Entrez votre adresse">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nom_Responsable_Achats" id="text" placeholder="Entrez le nom de votre responsable d'achats">
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
                <button type="submit" name="bouton2" class="btn btn-default"><b>Valider</b></button>

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