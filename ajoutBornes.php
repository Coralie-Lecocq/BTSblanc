<?php
include('func.php');
  if(isset($_POST['libelle'], $_POST['prix'], $_POST['adresseMac'], $_POST['adresseIp'], $_POST['categorie'])){
    $libelle = addslashes($_POST['libelle']);
    $prix = $_POST['prix'];
    $adresseIp = addslashes($_POST['adresseIp']);
    $adresseMac = addslashes($_POST['adresseMac']);
    $categorie = $_POST['categorie'];

    $checkBorne = "SELECT adresseIp, adresseMac FROM borne WHERE adresseIp = '".$adresseIp."' AND adresseMac = '".$adresseMac."'";
    $recupBorne = $bdd->query($checkBorne);
    if($recupBorne->fetch()) {
      echo '<div class="alert alert-danger error" role="alert">Votre borne existe déjà.</div>';
    } else {
      $reqBorne = "INSERT INTO borne (libelle, prix, adresseMac, adresseIp, categorie) VALUES ('".$libelle."', ".$prix.", '".$adresseMac."', '".$adresseIp."', ".$categorie.")";
      if($bdd->query($reqBorne)) {
        echo '<div class="alert alert-success error" role="alert">Ajout borne OK</div>';
      }

    }

  }
?>

<h1>Ajouter des bornes</h1>
<p>* Champs obligatoires</p>

<form action="" method="post">
  <input type="text" name="libelle" placeholder="Libellé*" <?php if (isset($_POST['libelle'])) echo $_POST['libelle']; ?> required><br/>
  <input type="number" name="prix" placeholder="Prix*" step="0.01" required>€<br/>
  <input type="text" name="adresseMac" placeholder="Adresse Mac*" required><br/>
  <input type="text" name="adresseIp" placeholder="Adresse IP*" required><br/>
  <select class="" name="categorie">
    <?php
    $listCategorie = "SELECT nomCategorie, idCategorie FROM categorieBorne ORDER BY nomCategorie ASC";
    $recuplist = $bdd->query($listCategorie);
    while($result = $recuplist->fetch()){
      echo '<option value="'.$result->idCategorie.'">'.$result->nomCategorie.'</option>';
    }
    ?>

  </select>
  <input type="submit" name="" value="Envoyer">
</form>
