<?php
	include 'inc/header.php';
	
	
	$IDediteur = $_POST['infoID'];

	$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
	
	$getEditeur = "SELECT NomEditeur FROM editeur WHERE NumEditeur='".$IDediteur."'";
	$editeur = $myPDO->query($getEditeur) ;

	$getSuivi = "SELECT * FROM suivi WHERE NumEditeur='".$IDediteur."'";
	$suivi = $myPDO->query($getSuivi) ;
	$ligneSuivi = $suivi->fetch(PDO::FETCH_ASSOC);
	
	$getContacts = "SELECT NumContact, NomContact FROM contact WHERE NumEditeur='".$_POST['infoID']."'";
	$resultatContacts = $myPDO->query($getContacts);
	
	$sqlannee = "SELECT * from Festival where Courant = '1' ";
	$festival = $myPDO->query($sqlannee);
	$Festivaligne = $festival->fetch();
	$annee = $Festivaligne['AnneeFestival'];
?>


<div class="container">
<table class="table table-bordered table-condensed" id="suivi">
	<thead>
		<h3>Suivi de 	<?php $ligneEditeur=$editeur->fetch(PDO::FETCH_ASSOC);
						echo $ligneEditeur['NomEditeur'];
						?>
		</h3>
		<tr>
			<th>Réponse de l'éditeur</th>							<?php //on affiche dans un table les valeurs actuelles du suivi ?>
			<th>A Editeur à relancer ?</th>
			<th>Date de premier contact</th>
			<th>Nombre de relance</th>
			<th>Contacts déjà joints</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td><?php
		if($ligneSuivi['Reponse']=="oui"){
			echo "L'éditeur participe";
		}
		else if ($ligneSuivi['Reponse']=="non"){
			echo ("L'éditeur ne participe pas");
		}
		else if($ligneSuivi['Reponse']=='peutetre'){
			echo "L'éditeur ne s'est pas encore décidé";
		}
		else if($ligneSuivi['Reponse']=='rien'){
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

</br>

<form action= "modifSuiviFunc.php" method="POST" >						<?php //on présélectionne les champs du formulaire en fonction ddes valeurs actuelles du suivi ?>
    <h3>Modifier ce suivi :</h3>
	
	<input type="hidden" name="IDediteur" value="<?php echo$IDediteur; ?>" />
	<input type="hidden" name="annee" <?php echo 'value="'.$annee.'"';?> />
	
	<label for="dateContact">Date de premier contact</label> : <input type="Date" name="dateContact" <?php echo 'value="'.$ligneSuivi['PremierContact'].'"'; ?> id="dateContact" required  /></br>
	</br>
    
	<h4>Editeur à relancer ?</h4>
	<?php
		if($ligneSuivi['aRelancer']==True){
			echo '<label for="relanceoui">oui</label> : <input type="radio" name="relance" id="relanceoui" value="oui"  checked="checked" />
				<label for="relancenon">non</label> : <input type="radio" name="relance" id="relancenon" value="non"  />  </br> ' ;
		}
		else{
			echo '<label for="relanceoui">oui</label> : <input type="radio" name="relance" id="relanceoui" value="oui"  checked="checked" />
				<label for="relancenon">non</label> : <input type="radio" name="relance" id="relancenon" value="non"  />  </br> ' ;
		}
	?>
	
	
	<label for="nbrRelance">Nombre de relances</label> : <input type="number" step="1" value="<?php echo $ligneSuivi['NbrRelance']; ?>" name="nbrRelance" id="nbrRelance" required /></br>
	</br>
	
	<h4> Réponse de l'éditeur :</h4>
	<?php												//on affiche avec une case pré-sélectionnée, en fonction de la réponse déjà enregistrée
	if($ligneSuivi['Reponse']=="oui"){ echo "
		<input type=\"radio\" name=\"reponse\" id=\"repOui\" checked value=\"oui\"/><label for=\"repOui\">oui</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repPeutetre\" value=\"peutetre\"/><label for=\"repPeutetre\">Peut etre</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repNon\" value=\"non\"/><label for=\"repNon\">non</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repRien\" value=\"rien\"/><label for=\"repRien\">Aucune réponse</label></br> ";
	}
	else if($ligneSuivi['Reponse']=="non"){ echo "
		<input type=\"radio\" name=\"reponse\" id=\"repOui\" value=\"oui\"/><label for=\"repOui\">oui</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repPeutetre\" value=\"peutetre\"/><label for=\"repPeutetre\">Peut etre</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repNon\" checked value=\"non\"/><label for=\"repNon\">non</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repRien\" value=\"rien\"/><label for=\"repRien\">Aucune réponse</label></br> ";
	}
	else if($ligneSuivi['Reponse']=="rien"){ echo "
		<input type=\"radio\" name=\"reponse\" id=\"repOui\" value=\"oui\"/><label for=\"repOui\">oui</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repPeutetre\" value=\"peutetre\"/><label for=\"repPeutetre\">Peut etre</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repNon\" value=\"non\"/><label for=\"repNon\">non</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repRien\" checked value=\"rien\"/><label for=\"repRien\">Aucune réponse</label></br> ";
	}
	else{ echo "
		<input type=\"radio\" name=\"reponse\" id=\"repOui\" value=\"oui\"/><label for=\"repOui\">oui</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repPeutetre\" checked value=\"peutetre\"/><label for=\"repPeutetre\">Peut etre</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repNon\" value=\"non\"/><label for=\"repNon\">non</label></br>
		<input type=\"radio\" name=\"reponse\" id=\"repRien\" value=\"rien\"/><label for=\"repRien\">Aucune réponse</label></br> ";
	}
	?>
	</br>

	<h4>Contacts de cet éditeur déjà contacté(s)</h4>
	<?php 
		while ($contact = $resultatContacts->fetch()){
			$precoche = false ;
			for ($i=0 ; $i<$nbr ; $i++){
				if ($ContactsJoints[$i]==$contact['NumContact']){
					$precoche = true ;
				}
			}
			$nomContact = $contact['NomContact'] ;
			$numContact = $contact['NumContact'] ;
			if ($precoche){
				echo ("<input type='checkbox' name='contact".$numContact."' checked id='".$nomContact."'> <label for ='".$nomContact."'> ".$nomContact."</label></br>") ;
			}
			else{
				echo ("<input type='checkbox' name='contact".$numContact."' id='".$nomContact."'> <label for ='".$nomContact."'> ".$nomContact."</label></br>") ;
			} 
		}
		?>
		<button class="button" type="submit"  id = "modifSuivi" >Modifier le Suivi</button>
</form>
</div>
<style>
#suivi {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#suivi th {
    border: 1px solid #ddd;
    padding: 8px;
}

#suivi tr:nth-child(even){background-color: #f2f2f2;}

#suivi tr:hover {background-color: #ddd;}

#suivi th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;

}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button:hover {
    background-color: #4CAF50;
    color: white;
}
</style>
</html>