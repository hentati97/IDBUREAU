<?PHP
include "../entities/panier_produit.php";
include "../core/panier_produitc.php";
include "../entities/panier.php";
include "../core/panierc.php";

$cookie_name = "panier";


if(!isset($_COOKIE[$cookie_name])) {

     echo "aucun panier !!";

} else {

    $panC=new panier_produitc();

    $list_prod=$panC->afficherpanier_produit($_COOKIE[$cookie_name]);
    $panii=new panierc();

    $list_somme =$panii->affichersoldepanier($_COOKIE[$cookie_name]);
     foreach($list_somme as $row2){
       $somm = $row2['somme'];
       $date = $row2['date_add'];
     }
     if (!empty($somm) and !empty($date))
     {
      echo' <table border="1">   <tr>
       <td>ID Produit</td>
          <td>Supp</td>
       </tr>' ;
       foreach($list_prod as $row){
         echo '	<tr>
          <td>'.$row["id_produit"].'</td>
          <td>
           <form action="supprimerproduit.php" method="post">
         <input type="submit" name="supprimer" value="supprimer">
	        <input type="hidden" value='.$row["id_produit"].' name="id">
	         </form>
	          </td>
             </tr>';
       }
       echo "</table>";
       echo  "Total: ".$somm;

       echo  "<br> <br> Date: ".$date;
       echo '
       <br>
       <form method ="post" action ="passcommande.php">
       <input type="submit" name="commande"  value="Passer Commande"></input>
       </form>';
        }
        else
        {
          echo "no panier";
        }
}

?>
