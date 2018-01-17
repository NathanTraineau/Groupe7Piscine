<?php


$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');//connexion a la base de donnes

$num = $_POST['LogementID']; //recuperation de donnes avce POST




//VERIFICATION CONNEXION
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//DELETE FUNCTION
mysqli_query($con,"DELETE FROM logement WHERE numLogement='".$num."'");
mysqli_close($con);
?>

<html>
		<script type="text/javascript">location.href = 'logement.php';</script>
</html>