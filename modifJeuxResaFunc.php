<?php
$servername = "localhost";
$username= "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
$recu = $_POST['recu'];
$Retour=$_POST['Retour'];
$Don = $_POST['Don'];
$NumJeux = $_POST['jeuxID'];
$Nombre = $_POST['nombre'];
$NumReservation = $_POST['NumReservation'];

$IdConcerner = $_POST['IdConcerner'];


#$categ = $_POST['codeCategorie'];


$sql = "UPDATE  concerner SET  NumJeux = '".$NumJeux."' , Nombre = '".$Nombre."', NumJeux= '".$NumJeux."',Retour= '".$Retour."' , recu= '".$recu."' , don= '".$Don."' WHERE IdConcerner='".$IdConcerner."' and NumReservation='".$NumReservation."' ";
// $sql = "SELECT * FROM `editeur`";


//verification connexion base de donnes
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

// $conn->close();
?>
<html>
		<form name="envoie" method="POST" action="InfoReservation.php">
							
                            <input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
        </form>
        <script type="text/javascript"> document.envoie.submit();</script>
		
</html>

