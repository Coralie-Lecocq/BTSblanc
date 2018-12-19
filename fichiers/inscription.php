<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/mobile.css" />
    <meta name="viewport" content="width=device-width" />
    <link href="http://fr.allfont.net/allfont.css?fonts=open-sans" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="img/GSB.png" />
    <title>GSB - Inscription</title>
</head>

<body>
    <header class="header_form">
        <h1>Inscription</h1>
    </header>
    <div class="back">
        <a href="index.php"><img src="../img/fleche.png"></a><a href="index.php" class="retour">Retour</a>
    </div>

        <?php
            // on se connecte à MySQL    
    
            $db = mysqli_connect('adm.minecraft-mania.fr', '292013120534090', 'ppe110218'); 
            mysqli_select_db($db,'a292013120413440188534090');

            $nom_recup = ($_POST['Nom']);
            $prenom_recup = $_POST['Prenom'];
            $mail_recup = $_POST['Email'];
            $psw_recup = $_POST['Password'];
            $psw2_recup = $_POST['Password_confirm'];
            $code_recup = $_POST['Code'];

            if(isset($_POST) && !empty($nom_recup) && !empty($prenom_recup) && !empty($mail_recup) && !empty($psw_recup) && !empty($psw2_recup) && !empty($code_recup)) {

                if($psw_recup == $psw2_recup){
                    $sql = "INSERT INTO `membres`(`id`, `nom`, `prenom`, `mail`, `mdp`) VALUES (NULL,'$nom_recup','$prenom_recup','$mail_recup','$psw_recup')";
                    $req = mysqli_query($db,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));

                    session_start();
                    $_SESSION['mail'] = $mail;
                    ?>
                        <div class="on-connect">Inscription réussie, redirection vers la page de connexion.
                            <meta http-equiv="refresh" content="5; URL=connexion.php">
                        </div>
                    <?php
                }
                else{
                    ?>
                        <p class="on-connect">Les mots de passe ne correspondent pas. Réessayez</p>
                    <?php
                }
            }
            else{
                ?>
                    <p class="on-connect">Merci de remplir tous les champs.</p>
                <?php
            }

        ?>

        <form method="post" action="" class="form_insc">
            <input class="style_form" type="text" name="Nom" placeholder="Nom" /><br/>
            <input class="style_form" type="text" name="Prenom" placeholder="Prénom" /><br/>
            <input class="style_form" type="email" name="Email" placeholder="E-mail" /><br/>
            <input class="style_form" type="password" name="Password" placeholder="Mot de passe" /><br/>
            <input class="style_form" type="password" name="Password_confirm" placeholder="Confirmez votre mot de passe" /><br/>
            <input class="style_form" type="text" name="Code" placeholder="Code d'identification" id="identif" />
            <span>Ce code d'identification vous a été donné par notre équipe. Si vous n'en avez pas possession, veuillez nous contacter par mail ou par téléphone.</span><br/>
            <select class="style_form">
                <option>Membre médical</option>
                <option>Comptable</option>
            </select><br/>
            <input id="inscription" type="submit" name="Inscription" value="S'inscrire" />
        </form>
        
        <p id="member">Déjà membre ? <a href="connexion.php">Connexion</a></p>


</body>

</html>
