<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/mobile.css" />
        <meta name="viewport" content="width=device-width" />
        <link href="http://fr.allfont.net/allfont.css?fonts=open-sans" rel="stylesheet" type="text/css" />
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnkx3og847-ubPQgG3qynV5zUT62M8hRo&callback=initMap"></script>

        <!-- ----------------- ICONE ONGLET ------------------- -->
        
        <link rel="icon" type="image/png" href="img/GSB.png" />
        
        <title>Laboratoire Galaxy Swiss Bourdin - GSB</title>

    </head>

    <body>
        
        <?php
        // On inclut le header contenu dans header.php
        include("header.php");

        // On traite le corps de la page en utilisant les données GET "page"
        if (isset($_GET['page'])){
            $mapage = $_GET['page'].".php";
            include($mapage);
        }
        else{
            include("home.php");
        }

        // On inclut le footer contenu dans footer.php
        include("footer.php");
        ?>
        
        <!------------------------- EFFET PARRALAXE ----------------------->
        
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnkx3og847-ubPQgG3qynV5zUT62M8hRo&callback=initMap"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
        </script>
        <script src="js/imagesloaded.js"></script>
        <script src="js/skrollr.js"></script>
        <script src="js/_main.js"></script>
        
    </body>
</html>