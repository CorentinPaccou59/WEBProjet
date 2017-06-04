<?php
session_start();
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u511042062_ppe;charset=utf8', 'u511042062_root', 'ppegastonberger2017'); //connection à la bdd

  if(isset($_POST['boutonconnect']))
    {
      $usernameconnect = htmlspecialchars(trim($_POST['login']));
      $passwordconnect = htmlspecialchars(trim($_POST['mdp']));

      if($login&&$mdp) //Si touts les champs sont entrés
       {

            $requser = $bdd->prepare("SELECT * FROM infoinscription WHERE login = ? AND mdp = ? ");
            $requser -> execute(array($usernameconnect, $passwordconnect));
            $userexist = $requser -> rowCount();
              if($userexist ==1)
              {

                $userinfo = $requser -> fetch();
                $_SESSION['id'] = $userinfo ['id'];
                $_SESSION['login'] = $userinfo ['login'];
                $_SESSION['mdp'] = $userinfo ['mdp'];
                header("Location: profil.php?id=".$_SESSION['id']);


              } else $messageErreur = '<p class = "phrase">Nom d\'utilisateur ou mot de passe introuvable <p/>';

       } else $messageErreur = '<p class = "phrase"> Veuillez saisir touts les champs.<p/>';
    }

?>
<head>
	
  <link rel = "stylesheet" href="test.css">	

</head>

<body>
  <form method="POST" action="">
    <section>
    		<br/><br/><br/><br/><br/><br/>
    		<h1> <p class = "titre"> Connexion </p> </h1>

    	<p> nom d'utilisateur: </p>
    		<input type="text" name="usernameconnect"/><br/><br/>
    	
      <p>Password:</p>
    		<input type="password" name="passwordconnect"/><br/><br/>

        <input type="submit" name="boutonconnect" value="valider"> <br/><br/><br/><br/><br/>
        <a href="pageInscription.php">S'inscrire</a>

    </section>		
  </form>
  <br/> <br/>
 <?php 
   if(isset($messageErreur)){

   echo $messageErreur;
    }
   ?>

</body>