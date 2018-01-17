<?php
	include 'inc/header.php';

	$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

	$IDediteur = $_POST['IDediteur'];
	$dateContact = $_POST['dateContact'];
	$nbrRelance = $_POST['nbrRelance'];
	$Reponse = $_POST['reponse'];
	$aRelancerStr = $_POST['relance'];
	$annee = $_POST['annee'];
	
	//var_dump($Reponse);
	
	
	if ($aRelancerStr=="non" or $Reponse=="non"){			//on transforme en booléen pour stocker dans la base de données
		$aRelancerBool = false ;
	}
	else{
		$aRelancerBool = true ;
	}
	
	$postName ='';
	$contactJoint[]=null ;
	$blbl = 0 ;
	for ($indice=1 ; $indice<10 ; $indice=$indice+1){			//on stocke dans un tableau les numero des contacts déjà contactés
		$postName = "contact".$indice ;
		if (isset($_POST[$postName])){
			$contactJoint[$blbl]= $indice ;
			$blbl=$blbl+1 ;
		}
	}
	$contactsJoints = serialize($contactJoint); //penser a unserialize() pour la résupération
	echo "</br> ";

	$sql = "INSERT INTO `suivi` VALUES (NULL, '".$dateContact."', '".$nbrRelance."', '".$Reponse."', '".$contactsJoints."', '".$IDediteur."','".$aRelancerBool."','".$annee."')";	//on insert dans la base de données
	$myPDO->exec($sql) ;
?>




<?php // A chaque fois on doit faire passer la variable NumEditeur pour que lorsqu'on revient sur la page infoEditeur il affiche les données de l'editeur
?>

	<form name="envoie" method="POST" action="infoEditeur.php">
		<input type="hidden" name="infoID" value="<?php echo $IDediteur; ?>" />	
	</form>
	
	<script type="text/javascript"> document.envoie.submit();</script>
	<script type="text/javascript">location.href = 'infoSuivi.php';</script>

<body>
</html>


