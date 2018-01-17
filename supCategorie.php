
<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		//suppression
		$requete= $mybdd->prepare('DELETE FROM categorie WHERE CodeCategorie=:idCat');
		$requete->execute(array('idCat'=>$_POST['catID']));
?>
<html>
		<script type="text/javascript">location.href = 'categorie.php';</script>
</html>
