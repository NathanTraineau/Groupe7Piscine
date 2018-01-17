<!DOCTYPE html>
<html>

<?php


// Connexion a la base de donnes
//recuperation des donnes avec POST
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
$num = $_POST['jeuxID'];
$nom = $_POST['nomJeux'];
$nb=$_POST['nb'];
$date = $_POST['date'];
$duree = $_POST['duree'];


//Mise a jour de la base de donnes
$sql = "UPDATE `jeux` SET nomJeux='".$nom."', NombreJoueur='".$nb."', DateSortie='".$date."', DureePartie='".$duree."' WHERE numJeux='".$num."'";

//verification de l'interrogation
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

?>


<html>
	<script type="text/javascript">location.href = 'jeux.php';</script> <!--renvoie a jeux.php-->
</html>
