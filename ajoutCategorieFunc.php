<html>

	<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		$requete= $mybdd->prepare('INSERT INTO categorie VALUES (NULL, :nomCat)');
		$requete->execute(array('nomCat'=>$_POST['NomCategorie']));

	?>

	<!-- RETOUR -->
	
	<script type="text/javascript">location.href = 'categorie.php';</script>

</html>
