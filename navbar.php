<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">
            <img id="logo" src="img/logos/ent.png">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php#about">À propos de nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "concept"){echo 'active';} ?>" href="?page=concept">Le concept</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "informations"){echo 'active';} ?>" href="?page=informations">Pourquoi louer ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "contact"){echo 'active';} ?>" href="?page=contact">Contactez-nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
