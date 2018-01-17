<!DOCTYPE html>
<html>

<?php

$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');//connexion a la base de donnes
//recupere des donnes avec POST
$ville = $_POST['VilleLogement'];
$rue=$_POST['RueLogement'];
$code = $_POST['CodePostaleLogement'];
$chambres= $_POST['NombreChambres'];
$cout=$_POST['CoutLongementNuit'];
$NomLogement=$_POST['NomLogement'];
//mise a jour de la base de donnes
$sql = "UPDATE `logement` SET NomLogement='".$NomLogement."', VilleLogement='".$ville."', RueLogement='".$rue."', CodePostaleLogement='".$code."', NombreChambres='".$chambres."', CoutLongementNuit='".$cout."' WHERE numLogement='".$_POST['LogementID']."'";



//verificaion de l'interrogation 
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}


?>
<html>
		<script type="text/javascript">location.href = 'logement.php';</script>
</html>




