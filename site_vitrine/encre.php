<div class="banner10">
    <div class="container">
        <h2>Encre</h2> 
    </div>
</div>

<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Encre</li>
			</ul>
		</div>
</div>

<br>


<?php
        include ("db.php");

        // On récupère tout le contenu de la table 
        $reponse = $bdd->query('SELECT * FROM consommables WHERE type like "encre"');

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
        ?>
            <div class="w3ls_dresses_grid_right_grid3">
                <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                        <div class="agile_ecommerce_tab_left dresses_grid">
                            <div class="hs-wrapper hs-wrapper2">
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                            <h5><a href="?page=single"><?php echo $donnees->nom; ?></a></h5>
                            <div class="simpleCart_shelfItem">
                                <p><span><?php  echo $donnees->prix + (20/100)*$donnees->prix . "€"; ?></span> <i class="item_price"><?php  echo $donnees->prix . "€"; ?></i></p>
                                <p><a class="item_add" href="?page=panier?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, '','toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a></p>
                            </div>
                        </div>
                    </div>
            </div>
        <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête

        ?>
        <div class="clearfix"> </div>

                                
               
