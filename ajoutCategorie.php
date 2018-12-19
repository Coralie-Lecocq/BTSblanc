<script type="text/javascript">

</script>

<?php
include('func.php');
  if(isset($_POST['nom'], $_POST['prixPart'], $_POST['prixPro'])){
    $nom = addslashes($_POST['nom']);
    $prixPart = $_POST['prixPart'];
    $prixPro = $_POST['prixPro'];
    $description = addslashes($_POST['description']);

    $checkCategorie = "SELECT nomCategorie FROM categorieBorne WHERE nomCategorie = '".$nom."'";
    $recupCategorie = $bdd->query($checkCategorie);
    if($recupCategorie->fetch()) {
      echo '<div class="alert alert-danger error" role="alert">Cette catégorie existe déjà.</div>';
    } else {
      $reqCategorie = "INSERT INTO categorieBorne (nomCategorie, prixPart, prixPro, descriptionCategorie) VALUES ('".$nom."', ".$prixPart.", ".$prixPro.", '".$description."')";
      if ($bdd->query($reqCategorie))
        echo '<div class="alert alert-success error" role="alert">Ajout categorie OK</div>';
    }

  }
?>

<h1>Ajouter une catégorie</h1>
<p>* Champs obligatoires</p>

<form action="" method="post">
  <input type="text" name="nom" placeholder="Nom*" required><br/>
  <input type="number" name="prixPart" placeholder="Prix Particulier*" step="0.01" required>€<br/>
  <input type="number" name="prixPro" placeholder="Prix Professionnel*" step="0.01" required>€<br/>
  <textarea name="description" rows="4" cols="40" placeholder="Description"></textarea>
  <input type="submit" name="" value="Envoyer">
</form>

<div class="">
  <h2>Catégories déjà existantes</h2>
  <table>
    <tr>
      <th>Nom</th>
      <th>Prix Part</th>
      <th>Prix Pro</th>
      <th>Description</th>
    </tr>
    <?php
      $listCategorie = "SELECT * FROM categorieBorne";
      $recuplist = $bdd->query($listCategorie);
      while($result = $recuplist->fetch()) {
        echo "
        <tr>
          <td>".$result->nomCategorie."</td>
          <td>".$result->prixPart."€</td>
          <td>".$result->prixPro."€</td>
          <td>".$result->descriptionCategorie."</td>
        </tr>";
      }
    ?>

  </table>
</div>
