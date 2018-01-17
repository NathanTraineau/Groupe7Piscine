<!DOCTYPE html>
<html>

<?php

$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');// connexion a la base de donnees
//recuperer des donnes avec la methode POST
$nom = $_POST['nomEditeur'];
$ville=$_POST['ville'];
$rue = $_POST['Rue'];
$code = $_POST['code'];


$sql = "INSERT INTO `editeur` VALUES (NULL, '$nom', '$ville', '$rue', '$code')";// inserer un element dans la base de donnes

if ($myPDO->query($sql) == TRUE) {// verification de l'interrogation a la base de donnes
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}


?>

<html>
		<script type="text/javascript">location.href = 'editeur.php';</script> <!-- renvoie a la page editeur.php apres l'execution-->
</html>