<header class="header">
    <div id="en-tete">

        <!-- ---------------- TROIS LIGNES EN HAUT ------------------- -->

        <div id="lines">
            <div id="line1"></div>
            <div id="line2"></div>
            <div id="line3"></div>
        </div>

        <!-- Titre -->

        <h1><a href="?page=home"><img id="logo" src="img/logo.jpg"></a></h1>

        <!-- Lien fixé sur la page -->

        <a id="fixrdv" href="?page=rdv">Fixer un rendez-vous</a>

        <!-- Si on est connecté, afficher "Déconnexion" sinon, "Connexion/Inscription" -->
        <?php
            session_start();
            if (!empty($_SESSION['mail'])){
             echo '<div class="connecte">
                <p>Bonjour, vous êtes bien connectés. <a href="deconnexion.php" id="disconnect">Déconnexion</a></p>
            </div>';
            } else{   
        ?>
            <nav class="connexion">
                <ul>
                    <li><a href="connexion.php">Connexion</a></li> /
                    <li><a href="inscription.php">Inscription</a></li>
                </ul>
            </nav>
        <?php
            ;}
        ?>

        <p class="appel">Appelez-nous : 01 18 94 35 79</p>
    </div>

    <!-- ----------------- MENU DE NAVIGATION ------------------- -->

    <nav id="menu">
        <ul>
            <a id="accueil" href="?page=home">
                <li>Accueil</li>
            </a>
            <a href="?page=rdv">
                <li>Rendez-vous</li>
            </a>
            <a href="?page=actu">
                <li>Actualités</li>
            </a>
            <a href="quiz.html" target="_blank">
                <li>Quiz</li>
            </a>

            <!-- Si on est connecté, afficher "Déconnexion" dans le menu, sinon afficher "Inscription" et "Connexion" -->

            <?php
            if (!empty($_SESSION['mail'])){
            ?>
            <section class="version_mob"><a href="deconnexion.php" class="disconnect">Déconnexion</a></section>
            <?php ;
            } else{
            ?>
            <section class="version_mob">
                <a href="inscription.php">
                    <li>Inscription</li>
                </a>
                <a href="connexion.php">
                    <li>Connexion</li>
                </a>
            </section>
            <?php ;
            }
            ?>

        </ul>
    </nav>
</header>