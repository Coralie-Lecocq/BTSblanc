<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="/favicon.png" />
        <meta charset="UTF-8">
        <link href="css/log.css" rel="stylesheet">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#p").hide();

                $("#ent").click(function() {
                    $("#p").slideToggle();
                    var txt = $(this).html();
                    if(txt == "Je suis une entreprise"){
                        $("#siret").prop('required',true);
                        $(this).html("Je ne suis pas une entreprise");
                    }

                    else{
                        $("#siret").prop('required',false);
                        $(this).html("Je suis une entreprise");
                    }

                });
            });
        </script>
    </head>
<?php include("func.php"); ?>
    <body id="LoginForm">
        <div class="container">
            <div class="login-form">
                <div class="main-div">
                  <a href="index.php">  <img src="img/fleche.png" style="width: 10%; float: left;" alt="retour vers Accueil" ></a>

                    <img src="img/logos/entlogo.png" class="img-responsive" alt="">
                    <div class="panel"><h1 class="form-heading">Inscription</h1></div>
                <?php

                if (isset($_POST["nom"],$_POST["prenom"],$_POST["mail"],$_POST["pwd"],$_POST["pwd_confirm"]))
                {
                    $error = "" ;
                    $nom = addslashes($_POST["nom"]);
                    $prenom = addslashes($_POST["prenom"]);
                    $mail = addslashes($_POST["mail"]);
                    $pwd = md5($_POST["pwd"]);
                    $pwd_confirm = md5($_POST["pwd_confirm"]);

                    $reqUser = $bdd->query("SELECT * FROM clients WHERE mail LIKE '".$mail."';");

                    if ($reqUser->fetch())
                    {

                        //echo "<p id='error'>*Vous avez déja un compte avec ce Email</p>";
                        $error = "Vous avez déja un compte avec ce Email";
                        echo $error ."<br><br>";

                        echo "<p id='error'>*Vous avez déja un compte avec ce Email</p>";
                        //$error = "Vous avez déja un compte avec ce Email";

                    }
                    else
                    {

                        if ($pwd == $pwd_confirm)
                        {


                            $reqInsc = $bdd->query ("INSERT INTO clients (nom, prenom, mail, pwd) VALUES ('".$nom."', '".$prenom."','".$mail."','".$pwd."');");
                            echo "Votre compte a été créé avec succés.";
                echo "<p>Redirection...</p>";
                header("Refresh:2; url=index.php");
                        }
                        else
                        {

                          //  echo "<p id='error'>*Les mots de passe ne correspondent pas</p> ";
                            $error = "Les mots de passe ne correspondent pas";
                            echo $error  ."<br><br>" ;
                        }
                    }
                }
                  // echo $error

                ?>

                    <button id="ent" class="btn btn-primary btn-sm" style="margin-bottom: 25px;">Je suis une entreprise</button>
                    <form id="Login" action="" method="post">
                        <div class="form-group" id="p"><input id="siret" style="margin-bottom: 25px;"class="form-control" name="siret" type="text" size="14" maxlength="14" placeholder="n°Siret"
                          <?php
                              if (isset($_POST["siret"])) {
                                echo "value='".$_POST['siret']."'";
                              }
                          ?>
                          ></div>
                        <div class="form-group"><input class="form-control" type="text" name="nom" placeholder="Nom"
                          <?php
                              if (isset($_POST["siret"])) {
                                echo "value='".$_POST['nom']."'";
                              }
                          ?>
                           required/><br/> </div>
                        <div class="form-group"><input class="form-control" type="text" name="prenom" placeholder="Prénom"
                          <?php
                              if (isset($_POST["siret"])) {
                                echo "value='".$_POST['prenom']."'";
                              }
                          ?>
                           required/><br/></div>
                        <div class="form-group"> <input class="form-control" type="email" name="mail" placeholder="E-mail"
                          <?php
                              if (isset($_POST["siret"])) {
                                echo "value='".$_POST['mail']."'";
                              }
                          ?>
                           required/><br/></div>
                        <div class="form-group"> <input class="form-control" type="password" name="pwd" placeholder="Mot de passe"
                          <?php
                              if (isset($_POST["siret"])) {
                                echo "value='".$_POST['pwd']."'";
                              }
                          ?>
                           required /><br/></div>
                        <div class="form-group"><input class="form-control" type="password" name="pwd_confirm" placeholder="Confirmez votre mot de passe"
                          <?php
                              if (isset($_POST["siret"])) {
                                echo "value='".$_POST['pwd_confirm']."'";
                              }
                          ?>
                           required /><br/></div>
                        <button class="btn btn-primary">Valider</button>
                        <div class="forgot">
                            <a href="login.php">Déja un compte?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
