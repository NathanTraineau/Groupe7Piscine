
<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		
		
		//suppression
		$requete= $mybdd->prepare('DELETE FROM zone WHERE NumZone=:idZone');
		$requete->execute(array('idZone'=>$_POST['zoneID']));
		
		//Si c'est une zone editeur
		$ZoneED=$mybdd->prepare('SELECT * FROM regrouper WHERE NumZone=:idZone');
		$ZoneED->execute(array('idZone'=>$_POST['zoneID']));

		
	 	if ( !empty($ZoneED)){
	
			$requete2= $mybdd->prepare('DELETE FROM regrouper WHERE NumZone=:idZone');
			$requete2->execute(array('idZone'=>$_POST['zoneID']));

		}?>



<html>
		<script type="text/javascript">location.href = 'zone.php';</script>
</html>
