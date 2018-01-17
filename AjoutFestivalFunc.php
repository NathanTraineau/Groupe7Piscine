<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Creation de la connection

$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');// etabli la connexion a la base de donnees

$AnneeFestival = $_POST['AnneeFestival'];
$DateFestival =$_POST['DateFestival'];
$NombreTables = $_POST['NombreTables'];
$PrixPlaceStandard = $_POST['PrixPlaceStandard'];

// ajouter au tableau Festival une nouveau festival
$sql2 = "INSERT INTO `Festival` VALUES ('$AnneeFestival', '$DateFestival', '$NombreTables', '$PrixPlaceStandard', '0'  )";

if ($myPDO->query($sql2) == TRUE) {    //verification de l'interrogation a la base de donnes 
?>
	<html>
		<script type="text/javascript">location.href = 'login.php';</script> <!--redirection vers la page de login si le festival a ete ajoute dans la base de donnes-->
	</html>
<?php
}
?>
<html>
	<script type="text/javascript">location.href = 'acceuil.php';</script> <!-- renvoie a la page d'acceuil si le festival n'a pas ete enregistre-->
</html>

