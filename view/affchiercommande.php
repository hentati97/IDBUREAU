<?PHP
include "../entities/commande.php";
include "../core/commandec.php";

$comm=new commandec();
$list_cmd=$comm->affichercommande();


echo' <table border="1">   <tr>
 <td>ID commande</td>
    <td>client</td>
    <td>prix</td>
    <td>date</td>
    <td>etat</td>
    <td>comment</td>
    <td>Approved</td>
    <td>Modifier</td>
    <td>Supp</td>
 </tr>' ;
 foreach($list_cmd as $row){
   echo '	<tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["id_client"].'</td>
    <td>'.$row["prix"].'</td>
    <td>'.$row["datecmd"].'</td>
    <td>'.$row["etat"].'</td>
     <form action="trait.php" method="post">
    <td><input type="text"  name= "commnt" value="'.$row["comment"].'"></input></td>
    <td>
   <input type="submit" name="Approved" value="Approved">
    <input type="hidden" value='.$row["id"].' name="id">
       </td>
         <td>
   <input type="submit" name="Modifier" value="Modifier">
    <input type="hidden" value='.$row["id"].' name="id">
      </td>
      <td>
<input type="submit" name="Supprimer" value="Supprimer">
 <input type="hidden" value='.$row["id"].' name="id">
  </form>
   </td>
       </tr>';
 }
 echo "</table>";


?>
