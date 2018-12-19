<?php
    include("fonctions_panier.php");

 $erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}
?>

<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil</a> <i>/</i></li>
				<li>Panier</li>
			</ul>
		</div>
	</div>

<div class="checkout">
    <div class="container">
        <!-- nb de produit à reprendre dans la base : panier -->
        <h3>Votre panier contient: <span>3 Produits</span></h3>
        
        <form method="post" action="panier.php">
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>N.</th>	
                        <th>Produits</th>
                        <th>Quantité</th>
                        <th>Nom du Produit</th>
                        <th>Charges</th>
                        <th>Prix</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <?php
                if (creationPanier())
                {
                    $nbArticles=count($_SESSION['panier']['libelleProduit']);
                    if ($nbArticles <= 0)
                    echo "<tr><td>Votre panier est vide </ td></tr>";
                    else
                    {
                        for ($i=0 ;$i < $nbArticles ; $i++)
                        {
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($i)."</ td>";
                            echo "<td>".htmlspecialchars($i)."</ td>";
                            echo "<td><input type=\"text\" size=\"4\" name=\"q[]\"value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
                            echo "<td>".htmlspecialchars(5)."</ td>";
                            echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">X</a></td>";
                            echo "</tr>";
                        }

                        echo "<tr><td colspan=\"2\"> </td>";
                        echo "<td colspan=\"2\">";
                        echo "Total : ".MontantGlobal();
                        echo "</td></tr>";

                        echo "<tr><td colspan=\"4\">";
                        echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                        echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                        echo "</td></tr>";
                    }
                }
                ?>
        
                <!-- générer lignes / nb de produit -->
                <!-- LIGNE 1
                <tr class="rem1">
                    <td class="invert">1</td>
                    <td class="invert-image"><a href="single.html"><img src="images/j3.jpg" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Beige solid Chinos</td>
                    <td class="invert">$5.00</td>
                    <td class="invert">$200.00</td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close1"> </div>
                        </div>
                        <script>$(document).ready(function(c) {
                            $('.close1').on('click', function(c){
                                $('.rem1').fadeOut('slow', function(c){
                                    $('.rem1').remove();
                                });
                                });	  
                            });
                       </script>
                    </td>
                </tr>
                <!-- LIGNE 2
                <tr class="rem2">
                    <td class="invert">2</td>
                    <td class="invert-image"><a href="single.html"><img src="images/ss5.jpg" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Floral Border Skirt</td>
                    <td class="invert">$5.00</td>
                    <td class="invert">$270.00</td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close2"> </div>
                        </div>
                        <script>$(document).ready(function(c) {
                            $('.close2').on('click', function(c){
                                $('.rem2').fadeOut('slow', function(c){
                                    $('.rem2').remove();
                                });
                                });	  
                            });
                       </script>
                    </td>
                </tr>
                <!-- LIGNE 3 
                <tr class="rem3">
                    <td class="invert">3</td>
                    <td class="invert-image"><a href="single.html"><img src="images/c7.jpg" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Beige Sandals</td>
                    <td class="invert">$5.00</td>
                    <td class="invert">$212.00</td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close3"> </div>
                        </div>
                        <script>$(document).ready(function(c) {
                            $('.close3').on('click', function(c){
                                $('.rem3').fadeOut('slow', function(c){
                                    $('.rem3').remove();
                                });
                                });	  
                            });
                       </script>
                    </td>
                </tr> -->
                            <!--quantity-->
                                <script>
                                $('.value-plus').on('click', function(){
                                    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                    divUpd.text(newVal);
                                });

                                $('.value-minus').on('click', function(){
                                    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                    if(newVal>=1) divUpd.text(newVal);
                                });
                                </script>
                            <!--quantity-->
            </table>
        </div>
        </form>
        <div class="checkout-left">	
            <div class="checkout-left-basket">
                <h4>Récapitulatif de la commande</h4>
                <ul>
                    <!-- nom produit et prix : base  -->
                    <li>Product1 <i>-</i> <span>$200.00 </span></li>
                    <li>Product2 <i>-</i> <span>$270.00 </span></li>
                    <li>Product3 <i>-</i> <span>$212.00 </span></li>
                    <li>Charges <i>-</i> <span>$15.00</span></li> <!-- somme de la colonne charges -->
                    <li>Total <i>-</i> <span>$697.00</span></li> <!-- total colonne -->
                </ul>
            </div>
            <div class="checkout-right-basket">
                <a href="?page=papier"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continuer vos achats</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
