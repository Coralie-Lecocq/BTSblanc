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

</head>

<body id="LoginForm">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
              <a href="login.php">  <img src="img/fleche.png" style="width: 10%; float: left;" alt="retour vers Connexion" ></a>

              <img src="img/logos/entlogo.png" class="img-responsive" alt="">
                <div class="panel">
                    <h1 class="form-heading">Récuperation du mot de passe</h1>
                </div>
<?php
include("func.php");

if (isset($_GET['section'])) {
  $section = htmlspecialchars($_GET['section']);

}else {
  $section = "";
}
if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
   if(!empty($_POST['recup_mail'])) {
      $recup_mail = htmlspecialchars($_POST['recup_mail']);
      if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {

         $mailexist = $bdd->prepare('SELECT idClient, prenom, nom FROM clients WHERE mail = ?');
         $mailexist->execute(array($recup_mail));
         $mailexist_count = $mailexist->rowCount();
         if($mailexist_count == 1) {
            $prenom = $mailexist->fetch();
            $pseudo = $prenom->prenom;

            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code = "";
            for($i=0; $i < 8; $i++) {
               $recup_code .= mt_rand(0,9);
            }

            $mail_recup_exist = $bdd->prepare('SELECT mail FROM recup_pwd WHERE mail = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();

            if($mail_recup_exist == 1) {
               $recup_insert = $bdd->prepare('UPDATE recup_pwd SET code = ? WHERE mail = ?');
               $recup_insert->execute(array($recup_code,$recup_mail));
            } else {
               $recup_insert = $bdd->prepare('INSERT INTO recup_pwd(mail,code) VALUES (?, ?)');
               $recup_insert->execute(array($recup_mail,$recup_code));
            }

            echo "<div class='alert alert-success error'>Un mail a été envoyé avec votre nouveau code </div>";

         } else {
            $error = "Cette adresse mail n'est pas enregistrée";
         }
      } else {
         $error = "Adresse mail invalide";
      }
   } else {
      $error = "Veuillez entrer votre adresse mail";
   }
}
if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $bdd->prepare('SELECT id FROM recup_pwd WHERE mail = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $bdd->prepare('UPDATE recup_pwd SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
      //   header('Location:http://127.0.0.1/path/recuperation.php?section=changemdp');
      } else {
         $error = "Code invalide";
      }
   } else {
      $error = "Veuillez entrer votre code de confirmation";
   }
}
if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      $verif_confirme = $bdd->prepare('SELECT confirme FROM recup_pwd WHERE mail = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];

      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);

         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $bdd->prepare('UPDATE membres SET motdepasse = ? WHERE mail = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
              $del_req = $bdd->prepare('DELETE FROM recup_pwd WHERE mail = ?');
              $del_req->execute(array($_SESSION['recup_mail']));
               header('Location:http://127.0.0.1/path/connexion/');
            } else {
               $error = "Vos mots de passes ne correspondent pas";
            }
         } else {
            $error = "Veuillez remplir tous les champs";
         }
      } else {
         $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
      }
   } else {
      $error = "Veuillez remplir tous les champs";
   }
} ?>
<?php if($section == 'code') { ?>
Un code de vérification vous a été envoyé par mail: <?= $_SESSION['recup_mail'] ?>
<br/>
<form method="post">
   <input type="text" placeholder="Code de vérification" name="verif_code"/><br/>
   <input type="submit" value="Valider" name="verif_submit"/>
</form>
<?php } elseif($section == "changemdp") { ?>
Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?>
<form method="post">
   <input type="password" placeholder="Nouveau mot de passe" name="change_mdp"/><br/>
   <input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"/><br/>
   <input type="submit" value="Valider" name="change_submit"/>
</form>
<?php } else { ?>
    <form id="Login" method="post" action="">
        <div class="form-group"><input type="email" class="form-control" name="recup_mail" id="inputEmail" placeholder="Email" required></div>
        <button type="submit" class="btn btn-primary" name="recup_submit">Valider</button>
    </form>
  <?php } ?>
    <?php if(isset($error)) { echo '<div class="alert alert-danger error" role="alert">'.$error.'</div>';} else { echo "<br>";}?>
      </div>
    </div>
  </div>
</body>
