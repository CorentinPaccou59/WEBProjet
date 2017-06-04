        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                    <a class="navbar-brand" style="color:orange">Bienvenue sur AGRUR</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                    <li style="text-align: center"><a href="#">ONGLET 1</a></li>
                    <li style="text-align: center"><a href="#">ONGLET 2</a></li>
                    <li style="text-align: center"><a href="#">ONGLET 3</a></li> 
                    <li style="text-align: center"><a href="#">ONGLET 4</a></li> 
                    <li style="text-align: center"><a href="#">ONGLET 5</a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="text-align: center; color: darkseagreen"><span class="glyphicon glyphicon-log-in"></span> Profil de <?php echo $_SESSION['login']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li style="text-align: center"><a href="profil.php">Mon profil</a></li>
                        <li style="text-align: center"><a href="deconnexion.php">Déconnexion</a></li> 
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>