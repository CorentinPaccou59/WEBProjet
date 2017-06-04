<?php
session_start();
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u511042062_ppe;charset=utf8', 'u511042062_root', 'ppegastonberger2017'); //connection à la bdd

  if(isset($_SESSION['id']))
    {
      $requser = $bdd ->prepare("SELECT * FROM infoinscription WHERE id = ?");
      $requser -> execute(array($_SESSION['id']));
      $user = $requser -> fetch();

      if(isset($_POST['newlogin'])AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $user['login'])

      {
        $newlogin = htmlspecialchars($_POST['newlogin']);
        $insertpseudo = $bdd -> prepare("UPDATE infoinscription SET login = ? WHERE id = ?");
        $insertpseudo -> execute(array($newlogin, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
      }
      
      if(isset($_POST['newMdp1'])AND !empty($_POST['newMdp1']) AND isset($_POST['newMdp2'])AND !empty($_POST['newMdp2']))

      {
        $newMdp1 = htmlspecialchars($_POST['newMdp1']);
        $newMdp2 = htmlspecialchars($_POST['newMdp2']);

        if($newMdp1 == $newMdp2)
        {
          $insertnewMdp1 = $bdd->prepare("UPDATE infoinscription SET mdp = ? WHERE id = ?");
          $insertnewMdp1 -> execute(array($newMdp1, $_SESSION['id']));
          $insertnewMdp2 = $bdd->prepare("UPDATE infoinscription SET mdp2 = ? WHERE id = ?");
          $insertnewMdp2 -> execute(array($newMdp2, $_SESSION['id']));
          header('Location: profil.php?id='.$_SESSION['id']);
        
        } else $msg = "Vos deux mots de passe ne sont pas identiques";


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
    include('inc/menuAccueil.php');
    ?>

    <div class="formPosition">
    <form action="#" method="POST" class="form-horizontal">
        <center><a href="index.php"><img src="images/AgrurLogoModif.png"></a></center>

        <h1> <p class = "titre"> Edition de mon profil </p> </h1>

        <p> nom d'utilisateur: </p>
            <input type="text" name="newlogin" value="<?php echo $user['login']; ?>"/><br/><br/>
        
      <p>Password:</p>
            <input type="password" name="newMdp1" value="<?php echo $user['mdp']; ?>"/><br/><br/>

      <p> Confirmation du mot de passe </p>  
        <input type="password" name="newMdp2" value="<?php echo $user['mdp2']; ?>"/><br/><br/>

        <input type="submit" name="newboutonconnect" value="Modifier le profil"> 
                
                <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>

        </div>
    </form>
    </div>

    </body>

</html>
<?php
    }else header ("Location: connexion.php")
?>