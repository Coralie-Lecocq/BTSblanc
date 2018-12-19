<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logos/favicon.png" />

    <title>Chiiiiize - Votre location de borne photo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php
        // J'inclus le header contenu dans header.php
        include("navbar.php");


        // Ici on traite le corps de la page en utilisant les données GET "page"
        if (isset($_GET['page'])){
            // Je vais inclure la page
            $mapage = $_GET['page'].".php";
            if (file_exists ($mapage)){
                if ($mapage == "header.php" or $mapage == "footer.php"){
                    echo '<section id="noExist">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-12 text-center">
                              <h2 class="section-heading text-uppercase">La page demandée n\'existe pas</h2>
                            </div>
                        </div>
                    </section>';
                } else{
                    include($mapage);
                }
            } else {
                echo '<section id="noExist">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-12 text-center">
                              <h2 class="section-heading text-uppercase">La page demandée n\'existe pas</h2>
                            </div>
                        </div>
                    </section>';
            }

        } else {
            include("home.php");
        }

    include("footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

</body>

</html>
