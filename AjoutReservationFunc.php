
<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "piscine";


$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root');

	
	//include'conexion2.php';





    $sqlannee = "SELECT * from Festival where Courant = '1' ";
	$annee = $myPDO->query($sqlannee);
	$Festival = $annee->fetch();

$NumEditeurReservation = $_POST['infoID'];
$FestivalReservation = $Festival['AnneeFestival'];
$dateReservation = $_POST['dateReservation'];
$Commentaire=$_POST['Commentaire'];

$PrixEspace = $_POST['PrixEspace'];
if (!empty($_POST['EtatFacture'])){
	$EtatFacture=$_POST['EtatFacture'];

} else {
	$EtatFacture='0'; # si facture pas payée case pas cochée
}





$sql = "INSERT INTO `reservation` VALUES (NULL, '$FestivalReservation', '$NumEditeurReservation', '$dateReservation', '$Commentaire', '$PrixEspace', '1', '$EtatFacture')";










if ($myPDO->query($sql) == TRUE) {
	
?>
	<html>

<form name="envoie" method="POST" action="AjoutJeuxReservation.php">
	
	<input type="hidden" name="infoID" value="<?php echo $NumEditeurReservation; ?>" />
	
</form>
	<script type="text/javascript"> document.envoie.submit();</script>

</html>
<?php

    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

?>



    		
            </tbody>
                        
                        
                        <!-- ajout jeux reservation : ajoute dans concerner les trucs avec le num de résa jsp comment 

                        	Si temps faire un bouton qui suppr le jeux de concerner
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            