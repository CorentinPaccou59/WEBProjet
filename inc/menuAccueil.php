        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                    <a class="navbar-brand" href="accueil.php" style="color:orange">Bienvenue sur AGRUR</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                    <?php
                    if ($_SESSION['id_droit'] == 3 || $_SESSION['id_droit'] == 1) {
                    ?>
                    <li style="text-align: center" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" title=Gérez vos commandes Ici !">Commande
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li style="text-align: center"><a href="passerCommande1.php">Passer une Commande</a></li>
                                <li style="text-align: center"><a href="consultCommandes.php">Consulter ses Commandes</a></li> 
                            </ul>
                    </li>
                    <?php
                    }

                    if ($_SESSION['id_droit'] == 2 || $_SESSION['id_droit'] == 1) {
                    ?>
                        <li style="text-align: center" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" title=GérezvoscommandesIci !">Verger
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li style="text-align: center"><a href="verger.php">Ajouter un verger</a></li>
                                <li style="text-align: center"><a href="consultVerger.php">Consulter ces verger</a></li> 
                            </ul>
                    </li>
                    <?php
                    }

                    if ($_SESSION['id_droit'] == 4 || $_SESSION['id_droit'] == 1) {
                    ?>
                        <li style="text-align: center" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" title=Gérez vos commandes Ici !">Lot
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li style="text-align: center"><a href="ajoutLot.php">Ajouter un lot</a></li>
                                <li style="text-align: center"><a href="consultLot.php">Consulter les lots</a></li> 
                            </ul>
                    </li>
                    <?php
                    }
                    if ($_SESSION['id_droit'] == 4){
                    ?>
                    <li style="text-align: center"><a href="consultVergerAgrur.php">Verger</a></li> 
                    <li style="text-align: center"><a href="consultCommandesAgrur.php">Voir les commandes</a></li> 
                    <?php
                    }
                    if ($_SESSION['id_droit'] == 1) {
                    ?>
                    <li style="text-align: center" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" title=Gérez vos commandes Ici !">Producteurs
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li style="text-align: center"><a href="voirProducteursAdmin.php">Voir tous les producteurs</a></li> 
                                <li style="text-align: center"><a href="ajoutProducteursAdmin.php">Ajouter un producteur</a></li> 
                            </ul>
                    </li>
                    <?php
                    }
                    ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="text-align: center; color: darkseagreen"><span class="glyphicon glyphicon-log-in"></span> Profil de <?php echo $_SESSION['login']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <?php
                    if ($_SESSION['id_droit'] == 2) {
                    ?>
                        <li style="text-align: center"><a href="profil.php?id=<?php echo $_SESSION['id_connexion']; ?>">Mon profil</a></li>
                    <?php 
                    }elseif ($_SESSION['id_droit'] == 3) {
                    ?>
                        <li style="text-align: center"><a href="profilClient.php?id=<?php echo $_SESSION['id_connexion']; ?>">Mon profil</a></li>
                    <?php
                    }
                    ?>
                        <li style="text-align: center"><a href="deconnexion.php">Déconnexion</a></li> 
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>