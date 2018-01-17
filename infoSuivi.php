<?php
	include 'inc/header.php';
	
	
	$IDediteur = $_POST['infoID'];
	$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
	
	$getEditeur = "SELECT NomEditeur FROM editeur WHERE NumEditeur='".$IDediteur."'";
	$editeur = $myPDO->query($getEditeur) ;

	$sqlannee = "SELECT * from Festival where Courant = '1' ";
	$festival = $myPDO->query($sqlannee);
	$Festivaligne = $festival->fetch();
	$annee = $Festivaligne['AnneeFestival'];
	
	$getSuivi = "SELECT * FROM suivi WHERE NumEditeur='".$IDediteur."' AND anneeSuivi='".$annee."'";
	$suivi = $myPDO->query($getSuivi) ;
	$ligneSuivi = $suivi->fetch(PDO::FETCH_ASSOC);
	

?>



<table class="table table-bordered table-condensed">
	<thead>
		<h3>Suivi de 	<?php $ligneEditeur=$editeur->fetch(PDO::FETCH_ASSOC);
						echo $ligneEditeur['NomEditeur'];
						?>
		</h3> <?php // RAJOUTER SA REPONSE?>
		<tr>
			<th>Réponse de l'éditeur</th>
			<th>A Editeur à relancer ?</th>
			<th>Date de premier contact</th>
			<th>Nombre de relance</th>
			<th>Contacts déjà joints</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td><?php
		//var_dump ($ligneSuivi['Reponse']) ;
		if($ligneSuivi['Reponse']=="oui"){
			echo "L'éditeur participe";
		}
		else if ($ligneSuivi['Reponse']=="non"){
			echo ("L'éditeur ne participe pas");
		}
		else if($ligneSuivi['Reponse']=="peutetre"){
			echo "L'éditeur ne s'est pas encore décidé";
		}
		else if($ligneSuivi["Reponse"]=="rien"){
			echo "L'éditeur n'a pas répondu";
		} ?>
		</td>
			<td> <?php
					if ($ligneSuivi['aRelancer']){
						echo "Oui" ;
					}
					else{
						echo "Non" ;
					}
				?>
			</td>
			<td><?php echo $ligneSuivi['PremierContact']; ?></td>
			<td><?php echo $ligneSuivi['NbrRelance']; ?></td>
			<td>
			<?php 
				
				$contactsJointsSerial = $ligneSuivi['ContactsJoints'] ;
				$ContactsJoints = unserialize($contactsJointsSerial) ;
				$nbr = count($ContactsJoints) ;
				for ($i=0 ; $i<$nbr ; $i++){
					$getContact = "SELECT * FROM contact WHERE NumContact='".$ContactsJoints[$i]."'";
					$contact = $myPDO->query($getContact) ;
					$ligneContact = $contact->fetch(PDO::FETCH_ASSOC) ;
					echo $ligneContact['NomContact']." ".$ligneContact['PrenomContact']."</br>" ;
				}
			?>
		</tr>
	</tbody>
</table>

<form method="POST" action="modifSuivi.php">
	<input type="hidden" name="infoID" value="<?php echo $IDediteur ; ?>" />
	<button type="submit">Modifier ce suivi</button>
</form>