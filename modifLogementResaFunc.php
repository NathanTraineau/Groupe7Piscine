<?php
$servername = "localhost";
$username= "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];

$NumLogement = $_POST['logementID'];
$NumReservation = $_POST['NumReservation'];
$PlacesFrais = $_POST['PlacesFrais'];
$IdLoger = $_POST['IdLoger'];


#$categ = $_POST['codeCategorie'];


$sql = 'UPDATE  concerner SET  PlacesFrais = '".$PlacesFrais."' WHERE NumReservation =  \''.$NumReservation.'\' and IdLoger= \''.$IdLoger.'\' ';


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

