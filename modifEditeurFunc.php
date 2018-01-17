<!DOCTYPE html>
<html>

<?php
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');// connexion a la base de donnes
//recuperer des valeurs avec POST
$num = $_POST['editeurID'];
$nom = $_POST['nomEditeur'];
$ville=$_POST['ville'];
$rue = $_POST['Rue'];
$code = $_POST['code'];

//mise a jour de la base de donnes
$sql = "UPDATE `editeur` SET nomEditeur='".$nom."', villeEditeur='".$ville."', rueEditeur='".$rue."', codePostaleEditeur='".$code."' WHERE numEditeur='".$num."'";

//verification de l'interrogation
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}
?>

<html>
	<script type="text/javascript">location.href = 'editeur.php';</script> <!-- renvoie a la page editeur.php-->
</html>
