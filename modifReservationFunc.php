<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root');

	
	//include'conexion2.php';





    $sqlannee = "SELECT * from Festival where Courant = '1' ";
	$annee = $myPDO->query($sqlannee);
	$Festival = $annee->fetch();

$NumEditeurReservation = $_POST['infoID'];
$FestivalReservation = $Festival['AnneeFestival'];
$DateReservation = $_POST['DateReservation'];
$Commentaire=$_POST['Commentaire'];

$PrixEspace = $_POST['PrixEspace'];

$EtatFacture=$_POST['EtatFacture'];




$sql = "UPDATE `reservation` SET NumEditeurReservation='".$NumEditeurReservation."', FestivalReservation='".$FestivalReservation."', DateReservation='".$DateReservation."', Commentaire='".$Commentaire."', PrixEspace='".$PrixEspace."', EtatFacture='".$EtatFacture."' WHERE NumReservation='".$_POST['NumReservation']."'";




if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

// $conn->close();
?>
<html>
		<form name="envoie" method="POST" action="InfoReservation.php">
							
                            <input type="hidden" name="infoID" value="<?php echo $_POST['infoID'] ; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
        </form>
        <script type="text/javascript"> document.envoie.submit();</script>
		
</html>
