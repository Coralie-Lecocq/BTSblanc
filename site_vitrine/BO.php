
<div class="container">
    <h2>Consultation du stock</h2>
    <form method="post" action="">
    <select name="nom">

<?php
include("db.php");

 $req1 = $bdd->query('SELECT * FROM consommables');

 while ($consult = $req1->fetch())
        { 
        ?>
        <option> <?php echo $consult->nom; ?></option>
        <?php
         if ($consult->nom){
            $stock = $consult->stock;
        }
        }
?>
    </select>
    <input type="submit" value="rechercher" />
    </form>
    <br/> <br/>
    <?php
    if (isset($_POST["nom"])){
        $nom = $_POST["nom"];
        
        $req = $bdd->query('SELECT * FROM consommables WHERE nom LIKE "'.$nom.'"');
        if ($result = $req->fetch()){
            ?>
                 <div id="divStock">Le stock est: <?php echo $result->stock; ?></div>
            <?php
        }
    }
    ?>
   
        
    

    <hr>
    <h2>Modification du stock</h2>
    <form method="POST" action="">
    <select name="nom">
    <?php
        
         $req1 = $bdd->query('SELECT * FROM consommables');
        
         while ($consult = $req1->fetch())
        { 
        ?>
        <option> <?php echo $consult->nom; ?></option>
        <?php
        }
        
    ?>
    </select>
    <br/> <br/>
    <div>Entrez le nouveau stock :
    <input type="text" name="stock" /></div>
    <input type="submit" name="valider"/>
    </form>
    <?php
        if(isset($_POST["stock"]) && isset($_POST["nom"])){
            $stock = $_POST["stock"];
            $nom = $_POST["nom"];
            
            $req2= $bdd->query('UPDATE consommables SET stock='.$stock.' WHERE nom="'.$nom.'"');
            //echo $req2;
        }
    
    ?>
    
    
    <hr>
    
    <h2>ajout d'un noubeau produit</h2> 
    
    <form method="post" action="">
        <label>nom* : </label>
        <input type="text" name="nom" />
        <label>stock* : </label>
        <input type="text" name="stock" />
        <label>prix* : </label>
        <input type="text" name="prix" />
        <label>description* : </label>
        <input type="text" name="description" />
        <label>type* : </label>
        <input type="text" name="type" />
        <input type="submit" name="valider"/>
    </form>
      <?php
        if(isset($_POST["nom"]) && isset($_POST['stock']) && isset($_POST['prix']) && isset($_POST['description']) && isset($_POST['type'])){
            $nom = $_POST["nom"];
            $stock = $_POST["stock"];
            $prix = $_POST["prix"];
            $description = $_POST["description"];
            $type = $_POST["type"];
            
           $req3= $bdd->query('INSERT INTO consommables(nom, stock, prix, description, type) VALUES("'.$nom.'",'.$stock.','.$prix.',"'.$description.'","'.$type.'")');
        }
    
    ?>  
      
</div>
