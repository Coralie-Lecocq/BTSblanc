<head>

    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>



    <meta charset="UTF-8">
    <link href="css/log.css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
    <?php include("func.php");?>
        <body id="LoginForm">


            <div class="container">
                <div class="login-form">
                    <div class="main-div">
                    <a href="index.php">  <img src="img/fleche.png" style="width: 10%; float: left;" alt="retour vers Accueil" ></a>

                        <img src="img/logos/entlogo.png" class="img-responsive" alt="">
                        <div class="panel">
                            <h1 class="form-heading">Connexion</h1>
                        </div>


                        <?php
                        require('recaptcha/autoload.php');
                          if (isset($_POST['submitPOST'])){
                            if(isset($_POST['g-recaptcha-response'])){
                              $recaptcha = new \ReCaptcha\ReCaptcha('6LdQGXYUAAAAALnVqICzgG_nwBAssm-Lc_ML3NJk');
                              $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
                              if ($resp->isSuccess())
                              {
                                echo '<div class="alert alert-success error" role="alert"><p> captcha valide ! </p></div>';
                                  if (isset($_POST["mail"], $_POST["pwd"])){

                                      $mail = addslashes($_POST["mail"]);
                                      $password = md5($_POST["pwd"]);

                                      $reqVerif = $bdd->query('SELECT idClient, prenom, nom, mail, pwd FROM clients WHERE mail = "'.$mail.'";');
                                      if ($resultVerif = $reqVerif->fetch())
                                      {
                                          if ($resultVerif->pwd == $password){
                                              echo "<div class='alert alert-success error'><p>Vous êtes bien connecté <strong>".$resultVerif->prenom. " " .$resultVerif->nom. ".</strong> <br> Redirection...</p></div>" ;
                                              header("Refresh:2; url=index.php");
                                              $_SESSION["id"] = $resultVerif->idClient;
                                          }
                                          else{
                                              echo   '<div class="alert alert-danger error" role="alert"><p> *Ce n\'est pas le bon mot de passe ! </p></div>';
                                          }
                                      }
                                      else{
                                          echo '<div class="alert alert-danger error" role="alert"><p>*Aucun mail ne correspond à un compte ! </p></div>';
                                      }
                                  }
                              }
                              else{
                                $errors = $resp->getErrorCodes();
                                echo '<div class="alert alert-danger error" role="alert"><p> captcha invalide ! </p></div>';
                              }
                            }
                            else {
                              echo '<div class="alert alert-danger error" role="alert"><p> captcha non rempli ! </p></div>';
                            }
                          }
                  ?>
                        <form id="Login" method="post" action="">
                            <div class="form-group">
                                <input type="email" class="form-control" name="mail" id="inputEmail" placeholder="Email"
                                <?php
                                    if (isset($_POST["mail"])) {
                                      echo "value='".$_POST['mail']."'";
                                    }
                                ?>
                                 required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" id="inputPassword" placeholder="Mot de passe"
                                <?php
                                    if (isset($_POST["pwd"])) {
                                      echo "value='".$_POST['pwd']."'";
                                    }
                                ?>
                                required>
                            </div>
                            <div class="forgot">
                                <a href="forgot.php">mot de passe oublié?</a>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LdQGXYUAAAAAAMuoReIPXi_92MoccOa2AJqL-dA"></div>

                            <button type="submit" name="submitPOST" class="btn btn-primary">Valider</button>
                            <div class="forgot">
                                <a href="inscription.php">Pas encore de compte?</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </body>
