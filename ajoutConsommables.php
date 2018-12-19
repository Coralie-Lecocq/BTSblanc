<?php
include('func.php');
  if(isset($_POST['nom'], $_POST['reference'], $_POST['stock'], $_POST['prix'])){
    $nom = addslashes($_POST['nom']);
    $reference = addslashes($_POST['reference']);
    $stock = $_POST['stock'];
    $prix = $_POST['prix'];
    $description = addslashes($_POST['description']);

    $checkConsommable = "SELECT referenceConso FROM consommables WHERE referenceConso = '".$reference."'";
    $recupConsommable = $bdd->query($checkConsommable);
    if($recupConsommable->fetch()) {
      echo '<div class="alert alert-danger error" role="alert">Votre produit existe déjà.</div>';
    } else {
      $reqConsommable = "INSERT INTO consommables (nom, referenceConso, stock, prix, description) VALUES ('".$nom."', '".$reference."', ".$stock.", ".$prix.", '".$description."')";
      $bdd->query($reqConsommable);
      echo '<div class="alert alert-success error" role="alert">Ajout Consommable OK</div>';
    }
/* mon comentaire sdqsdqsd */
  }
?>

<h1>Ajouter des consommables</h1>
<p>* Champs obligatoires</p>

<form action="" method="post">
    <input type="text" name="nom" placeholder="Nom*" required><br/>
    <input type="text" name="reference" placeholder="Référence Produit*" required><br/>
    <input type="number" name="stock" placeholder="Stock*" required><br/>
    <input type="number" name="prix" placeholder="Prix*" step="0.01" required>€<br/>
    <textarea name="description" rows="5" cols="40" placeholder="Description"></textarea><br/>
    <input type="submit" name="" value="Envoyer">
</form>
