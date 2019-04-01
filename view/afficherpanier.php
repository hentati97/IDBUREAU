<?PHP
include "../entities/panier.php";
include "../core/panierc.php";
include "../entities/panier_produit.php";
include "../core/panier_produitc.php";


$panC=new panierc();
$list_pan=$panC->afficherpanier();



echo' <table border="1">   <tr>
 <td>ID pan</td>
    <td>somme</td>
    <td>date</td>
      <td>details</td>
 </tr>' ;
 foreach($list_pan as $row){
   echo '	<tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["somme"].'</td>
    <td>'.$row["date_add"].'</td>
    <td>
     <form action="" method="post">
   <input type="submit" name="prod" value="voir produit">
    <input type="hidden" value='.$row["id_produit_panier"].' name="id">
     </form>
      </td>
       </tr>';
 }
 echo "</table>";


 if (isset($_POST['prod'])){


       $panC=new panier_produitc();

       $list_prod=$panC->afficherpanier_produit($_POST['id']);

   echo' <table border="1">   <tr>
    <td>ID Produit</td>

    </tr>' ;
    foreach($list_prod as $row){
      echo '	<tr>
       <td>'.$row["id"].'</td>
          </tr>';
    }
    echo "</table>";

}



?>
