<?php
/* DEBUT DE L'INITIALISATION DE LA CONNEXION DB */
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=ppe2', "root", "");
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        echo "Impossible de se connecter à la base de données";
        die();
    }
    /* FIN DE L'INITIALISATION DE LA CONNEXION DB */
?>
