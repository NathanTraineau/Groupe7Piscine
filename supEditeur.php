
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

$num = $_POST['editeurID'];

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);// connexion a la base de donnes


//VERIFICATION de l'interrogation
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//DELETE FUNCTION
mysqli_query($con,"DELETE FROM editeur WHERE numEditeur='".$num."'");// suppresion de la base de donnes

?>

<html>
		<script type="text/javascript">location.href = 'editeur.php';</script> <!--envoie a la page editeur.php-->
</html>