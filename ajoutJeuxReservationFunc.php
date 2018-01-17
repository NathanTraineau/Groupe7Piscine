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
$nombre = $_POST['nombre'];
$NumReservation = $_POST['NumReservation'];
$NumZone = $_POST['NumZone'];



#$categ = $_POST['codeCategorie'];


$sql = "INSERT INTO `concerner` VALUES (NULL, '".$NumReservation."', '".$NumJeux."', '".$NumZone."', '".$Nombre."', '".$Recu."', '".$Retour."', '".$don."' )";
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
		<form name="envoie" method="POST" action="AjoutJeuxReservation.php">
							
                            <input type="hidden" name="infoID" value="<?php echo $_POST['infoID'] ; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
        </form>
        <script type="text/javascript"> document.envoie.submit();</script>
		<script type="text/javascript">location.href = 'AjoutJeuxReservation.php';</script>
</html>



