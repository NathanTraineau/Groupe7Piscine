<?php
	include 'inc/header.php';

	$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

	$IDediteur = $_POST['IDediteur'];
	$dateContact = $_POST['dateContact'];
	$nbrRelance = $_POST['nbrRelance'];
	$Reponse = $_POST['reponse'];
	$aRelancerStr = $_POST['relance'];
	$annee = $_POST['annee'];
	
	if ($aRelancerStr=="non" or $Reponse=="non"){			//on transforme en booléen pour stocker dans la base de données
		$aRelancerBool = false ;
	}
	else{
		$aRelancerBool = true ;
	}
	
	$postName ='';
	$contactJoint[]=null ;
	$blbl = 0 ;
	for ($indice=1 ; $indice<10 ; $indice=$indice+1){
		$postName = "contact".$indice ;
		if (isset($_POST[$postName])){
			echo "indice :".$indice ;
			$contactJoint[$blbl]= $indice ;
			$blbl=$blbl+1 ;
		}
	}
	var_dump($contactJoint);
	$contactsJoints = serialize($contactJoint); //penser a unserialize() pour la résupération
	echo "</br> ";
	
	// on modifie les valeurs dans la base de données
	$sql = "UPDATE suivi SET PremierContact='".$dateContact."', NbrRelance='".$nbrRelance."' , Reponse='".$Reponse."' , ContactsJoints='".$contactsJoints."', aRelancer='".$aRelancerBool."' WHERE NumEditeur='".$IDediteur."' AND anneeSuivi='".$annee."'";
	$count = $myPDO->exec($sql) ;
?>




<?php // A chaque fois on doit faire passer la variable NumEditeur pour que lorsqu'on revient sur la page infoEditeur il affiche les données de l'editeur
?>
	<form name="envoie" method="POST" action="InfoEditeur.php">
		<input type="hidden" name="infoID" value="<?php echo $IDediteur; ?>" />	
	</form>
	
	<script type="text/javascript"> document.envoie.submit();</script>
	<script type="text/javascript">location.href = 'infoSuivi.php';</script>

<body>

</html>
