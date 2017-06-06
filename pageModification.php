<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', ''); //connection à la bdd

  if(isset($_SESSION['id_connexion']))
    {
      $requser = $bdd ->prepare("SELECT * FROM connexion, producteurs WHERE connexion.id_connexion = ? AND connexion.id_connexion = producteurs.id_connexion");
      $requser -> execute(array($_SESSION['id_connexion']));
      $user = $requser -> fetch();

      //Modification du nom de la société
      if(isset($_POST['newname'])AND !empty($_POST['newname']) AND $_POST['newname'] != $user['nom_Entreprise'])
      {
        $newname = htmlspecialchars($_POST['newname']);
        $insertpseudo = $bdd -> prepare("UPDATE producteurs SET nom_Entreprise = ? WHERE id_connexion = ?");
        $insertpseudo -> execute(array($newname, $_SESSION['id_connexion']));
        header('Location: profil.php?id='.$_SESSION['id_connexion']);
      }

      //Modification du nom du responsable de la société
      if(isset($_POST['newnomresponsable'])AND !empty($_POST['newnomresponsable']) AND $_POST['newnomresponsable'] != $user['nom_Responsable'])
      {
        $newnomresponsable = htmlspecialchars($_POST['newnomresponsable']);
        $insertpseudo = $bdd -> prepare("UPDATE producteurs SET nom_Responsable = ? WHERE id_connexion = ?");
        $insertpseudo -> execute(array($newnomresponsable, $_SESSION['id_connexion']));
        header('Location: profil.php?id='.$_SESSION['id_connexion']);
      }

      //Modification de l'adresse de la société
      if(isset($_POST['newadresse'])AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse_Entreprise'])
      {
        $newadresse = htmlspecialchars($_POST['newadresse']);
        $insertpseudo = $bdd -> prepare("UPDATE producteurs SET adresse_Entreprise = ? WHERE id_connexion = ?");
        $insertpseudo -> execute(array($newadresse, $_SESSION['id_connexion']));
        header('Location: profil.php?id='.$_SESSION['id_connexion']);
      }

      //Modification du login du compte
      if(isset($_POST['newlogin'])AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $user['login'])
      {
        $newlogin = htmlspecialchars($_POST['newlogin']);
        $insertpseudo = $bdd -> prepare("UPDATE connexion SET login = ? WHERE id_connexion = ?");
        $insertpseudo -> execute(array($newlogin, $_SESSION['id_connexion']));
        $_SESSION['login'] = $user ['newlogin'];
        header('Location: profil.php?id='.$_SESSION['id_connexion']);
      }
      
      //Modification du mot de passe du compte  
      if(isset($_POST['newMdp1'])AND !empty($_POST['newMdp1']) AND isset($_POST['newMdp2'])AND !empty($_POST['newMdp2']))
      {
        $newMdp1 = htmlspecialchars($_POST['newMdp1']);
        $newMdp2 = htmlspecialchars($_POST['newMdp2']);

        if($newMdp1 == $newMdp2)
        {
          $insertnewMdp1 = $bdd->prepare("UPDATE connexion SET mdp = ? WHERE id_connexion = ?");
          $insertnewMdp1 -> execute(array($newMdp1, $_SESSION['id_connexion']));
          $insertnewMdp2 = $bdd->prepare("UPDATE connexion SET mdp2 = ? WHERE id_connexion = ?");
          $insertnewMdp2 -> execute(array($newMdp2, $_SESSION['id_connexion']));
          $_SESSION['mdp'] = $user ['newMdp1'];
          header('Location: profil.php?id='.$_SESSION['id_connexion']);
        } else{
          header('pageModification.php');
          $msg = "Vos deux mots de passe ne sont pas identiques";
        } 
      }
?>

<html class="inscription">
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
    <div class="formPosition">
    <form action="#" method="POST" class="form-horizontal">

        <center>
          <h1 style="color:darkgreen">Modification(s) des informations personnelles de <?php echo $user['login']; ?></h1>
        </center>
        <br>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Nom de votre société :</b><input type="text" class="form-control" name="newname" value="<?php echo $user['nom_Entreprise']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Nom (reponsable) :</b><input type="text" class="form-control" name="newnomresponsable" value="<?php echo $user['nom_Responsable']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Adresse de votre société :</b><input type="text" class="form-control" name="newadresse" value="<?php echo $user['adresse_Entreprise']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Login :</b><input type="text" class="form-control" name="newlogin" value="<?php echo $user['login']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Mot de passe :</b><input type="password" class="form-control" name="newMdp1" value="<?php echo $user['mdp']; ?>">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Confirmation de votre mot de passe :</b><input type="password" class="form-control" name="newMdp2" value="<?php echo $user['mdp2']; ?>">
                </div>
        </div>
          <center>
            <input type="submit" name="newboutonconnect" value="Modifier le profil"> 
            <br>
                 <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>
          </center>
    </form>
    </div>
    <?php
      }else header ('Location: index.php');
    ?>
    </body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script> 
</html>	