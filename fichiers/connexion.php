<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/mobile.css" />
    <meta name="viewport" content="width=device-width" />
    <link href="http://fr.allfont.net/allfont.css?fonts=open-sans" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="img/GSB.png" />
    <title>GSB - Connexion</title>
</head>

<body>

    <header class="header_form">
        <h1>Connexion</h1>
    </header>
    <div class="back">
        <a href="index.php"><img src="../img/fleche.png"></a><a href="index.php" class="retour">Retour</a>
    </div>

    <?php
        // on se connecte à MySQL 
    
        $db = mysqli_connect('adm.minecraft-mania.fr', '292013120534090', 'ppe110218'); 
        mysqli_select_db($db,'a292013120413440188534090'); 

        if(isset($_POST) && !empty($_POST['mail']) && !empty($_POST['password'])) {
            $password=$_POST['password'];
            $mail = $_POST['mail'];
            extract($_POST);
            // on recupére le password de la table qui correspond au login du visiteur
            $sql = "SELECT * FROM membres WHERE mail='".$mail."' AND mdp='".$password."';";
            $req = mysqli_query($db,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));

            $data = mysqli_fetch_assoc($req);
            if(empty($data)) {
                echo '<div class="on-connect">Mauvais identifiant ou mot de passe.</div>';
            }

            else {
                session_start();
                $_SESSION['mail'] = $mail;
                $_SESSION['nom'] = $pseudo;
                echo '<div class="on-connect">Connexion en cours ... Redirection dans 5 secondes.<meta http-equiv="refresh" content="5; URL=index.php">
        </div>';
                // ici vous pouvez afficher un lien pour renvoyer
                // vers la page d'accueil de votre espace membres 
            }    
        }
        else {
            $champs = '<p class="on-connect"><b>(Remplissez tous les champs pour vous connectez !)</b></p>';
        }

    ?>

        <form method="post" action="" class="form_insc">
            <input class="style_form" type="email" name="mail" placeholder="E-mail" /><br/>
            <input class="style_form" type="password" name="password" placeholder="Mot de passe" /><br/>
            <a id="forgotten_passwd" href="#">Mot de passe oublié ?</a><br/><br/>
            <input id="inscription" type="submit" name="Inscription" value="Se connecter" />
        </form>
        <p id="member">Pas encore inscrit ? <a href="inscription.php">Inscription</a></p>


</body>

</html>
