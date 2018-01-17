<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "piscine";


$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root');

$dateReservation = $_POST['dateReservation'];

$Commentaire=$_POST['Commentaire'];


$PrixEspace = $_POST['PrixEspace'];
$Statut = $_POST['Statut'];
$EtatFacture=$_POST['EtatFacture'];



$sql = "INSERT INTO `reservation` VALUES (NULL, '$dateReservation', '$Commentaire', '$PrixEspace', '$Statut', '$EtatFacture')";







if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}


?>

<html>

		<script type="text/javascript">location.href = 'reservation.php';</script>

</html>