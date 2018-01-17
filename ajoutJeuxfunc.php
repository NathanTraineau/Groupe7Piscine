<?php

$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');// la connexion a la bse de donnes
//on recupere des donnees en utilisant la methode POST
$nomJeux = $_POST['nomJeux'];
$nombre=$_POST['nombre'];
$DateSortie = $_POST['DateSortie'];
$DureePartie = $_POST['DureePartie'];
$editeur = $_POST['numEditeur'];
$commentaire= $_POST['CommentaireJeux'];
$categ = $_POST['codeCategorie'];

$sqltest = "SELECT * from Festival where Courant = '1' ";// On selection l'elemt de type festival qui remplie la condition

$test = $myPDO->query($sqltest);//on fait une interrogation a la base de donnes
$Festival = $test->fetch(); //on sauvgarde la donnee recuperee

$sql = "INSERT INTO `jeux` VALUES (NULL,  '".$Festival['AnneeFestival']."', '$nomJeux', '$nombre', '$DateSortie', '$DureePartie', '$editeur', '$categ','$commentaire' )";// on ajoute un element de type jeux a la base de donnees

$myPDO->query($sql);//on fait l'interrogation a la base de donnees

?>
<html>
<?php
    
    if (!empty( $_POST['NumReservation'])){   //on verifie s'il exite une reservation et s'il exite on renvoie a la page AjoutJeuxReservation.php
    	?>
    	<form name="envoie" method="POST" action="AjoutJeuxReservation.php">
		<input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
		<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
		</form>
		<script type="text/javascript"> document.envoie.submit();</script>
    	<?php
    }?>
		<script type="text/javascript">location.href = 'jeux.php';</script> <!--si la reservation n'exite on renvoie a la page jeux.php -->
</html>