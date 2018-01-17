<?php
$servername = "localhost";
$username= "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
$PlacesFrais = $_POST['PlacesFrais'];
$NumReservation=$_POST['NumReservation'];
$NumLogement=$_POST['logement'];




#$categ = $_POST['codeCategorie'];


$sql = "INSERT INTO `loger` VALUES (NULL, '$NumLogement', '$NumReservation', '$PlacesFrais')";
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
							<input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                            <input type="hidden" name="infoID" value="<?php echo $_POST['infoID'] ; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
        </form>
        <script type="text/javascript"> document.envoie.submit();</script>
		<script type="text/javascript">location.href = 'AjoutJeuxReservation.php';</script>
</html>
