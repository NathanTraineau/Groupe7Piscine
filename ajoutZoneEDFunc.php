<html>

	<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		$editeur = $_POST['numEditeur'];

		// on verifie si une zone existe déjà pour cet editeur:
		$existe=$mybdd->prepare(' SELECT IdRegrouper, NumEditeur FROM regrouper WHERE NumEditeur= :num');
		$existe->execute(array('num'=>$editeur));
		$existe = $existe->fetch();
		$existe = $existe['IdRegrouper'];

		if ( !empty($existe)){ ?>
		<h1> Une zone est déjà créée pour cet éditeur </h1>
		<?php }else{
		
		//on récupère le nom de l'editeur
		$sql =	' SELECT NumEditeur, NomEditeur FROM editeur WHERE NumEditeur=\'' . $editeur . '\'';	
		$reponse = $mybdd->query($sql);
		$reponse = $reponse ->fetch();
		$nomEditeur=$reponse['NomEditeur'];

		//Selectionne le festival
		$sqltest = "SELECT * from Festival WHERE Courant = '1' ";
		$test = $mybdd->query($sqltest);
		$Festival = $test->fetch();
		$annee = $Festival['AnneeFestival'];
		
		// on crée une zone à son nom
		$requete1= $mybdd->prepare("INSERT INTO zone (NumZone, NomZone, AnneeZone) VALUES (NULL, :ed,'$annee' )");
		$requete1->execute(array('ed'=>$nomEditeur));

		//on crée l'entité regrouper:
		//on récupère le num de la zone qui vient d'être créé
		$sql2 =	' SELECT NumZone, NomZone FROM zone WHERE NomZone=\'' . $nomEditeur . '\'';	
		$reponse2 = $mybdd->query($sql2);
		$reponse2 = $reponse2 ->fetch();
		$numZone=$reponse2['NumZone'];
		//on crée l'entité regrouper
		$requete2= $mybdd->prepare('INSERT INTO regrouper (IdRegrouper, NumEditeur, NumZone) VALUES (NULL, :numED, :numZ)');
		$requete2->execute(array('numED'=>$editeur, 'numZ'=>$numZone));
		

	?>	
	<!-- RETOUR -->
	
	<script type="text/javascript">location.href = 'zone.php';</script>  
	<?php } ?>
</html>
