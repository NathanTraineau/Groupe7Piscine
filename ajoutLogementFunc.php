<!DOCTYPE html>
<html>

<?php


$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root');// connexion a la base de donnes
//recuperer des donnes avec la methode POST
$ville = $_POST['VilleLogement'];
$rue=$_POST['RueLogement'];
$code = $_POST['CodePostaleLogement'];
$chambres= $_POST['NombreChambres'];
$cout=$_POST['CoutLogementNuit'];
$NomLogement=$_POST['NomLogement'];
//ajouter un elemet dans la base de donnees
$sql = "INSERT INTO `logement` VALUES (NULL, '$NomLogement', '$ville', '$rue', '$code', '$chambres', '$cout')";


//interrogation a la base de donnes
$q = $myPDO->query($sql);
?>
<?php
    
    if (!empty( $_POST['NumReservation'])){ //verification si existe une reservation s'il exite renvoie a AjoutJeuxReservation.php
    	?>
    	<form name="envoie" method="POST" action="AjoutJeuxReservation.php">
		<input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
		<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
		</form>
		<script type="text/javascript"> document.envoie.submit();</script>
    	<?php
    } elseif (!empty( $_POST['infoID'])){ //si infoID existe renvoie a ajoutReservation.php
    	?>
    	<form name="envoie" method="POST" action="ajoutReservation.php">
		<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
		</form>
		<script type="text/javascript"> document.envoie.submit();</script>
    	<?php
    }
    ?>

	

<html>
		<script type="text/javascript">location.href = 'logement.php';</script><!--renvoie a logement.php-->
</html>