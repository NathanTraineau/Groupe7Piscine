<?php
	include'inc/header.php';
	//include'conexion2.php';

	//function myFunction() {
	//$nom = $_POST['nom'];					//KESKESé ? JESAISPO
	//$pass = $_POST['pass'];
	

	$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
	
	$getContacts = "SELECT NumContact, NomContact FROM contact WHERE NumEditeur='".$_POST['infoID']."'";
	$resultatContacts = $myPDO->query($getContacts);
	
	$sqlannee = "SELECT * from Festival where Courant = '1' ";
	$festival = $myPDO->query($sqlannee);
	$Festivaligne = $festival->fetch();
	$annee = $Festivaligne['AnneeFestival'];

?>
<div class="container">
<form action= "ajoutSuiviFunc.php" method="POST" >
    <legend>Créez un suivi éditeur</legend>
	
	<input type="hidden" name="IDediteur" <?php echo 'value="'.$_POST['infoID'].'"'; ?> />
	<input type="hidden" name="annee" <?php echo 'value="'.$annee.'"';?> />
	
	</br>
    <label for="dateContact">Date de premier contact</label> : <input type="Date" name="dateContact" id="dateContact" required /></br>
	
	</br>
    <label for="nbrRelance">Nombre de relances</label> : <input type="number" name="nbrRelance" id="nbrRelance" required /></br>
	
	</br>
	<h4>Editeur à relancer ?</h4>
	<label for="relanceoui">oui</label> : <input type="radio" name="relance" id="relanceoui" value="oui"  checked="checked" />
	<label for="relancenon">non</label> : <input type="radio" name="relance" id="relancenon" value="non"  />  </br>
	
	</br>
	<h4>Réponse de l'éditeur :</h4>
	<input type="radio" name="reponse" id="repOui" value="oui"/><label for="repOui">Oui</label></br>
	<input type="radio" name="reponse" id="repPeutetre" value="peutetre"/><label for="repPeutetre">Peut etre</label></br>
	<input type="radio" name="reponse" id="repNon" value="non"/><label for="repNon">Non</label></br>
	<input type="radio" name="reponse" id="repRien" checked value="rien"/><label for="repRien">Aucune réponse</label></br>
	
	</br>
	<h4>Contacts de cet éditeur déjà contacté(s)</h4>
	<?php while ($contact = $resultatContacts->fetch()): 				//on fait une boucle pour afficher les contactes les uns après les autres ?>
		<input type='checkbox' <?php echo 'name="contact'.$contact['NumContact'].'"';?> <?php echo' id="'.$contact['NomContact'].'"';?> > <label <?php echo 'name="'.$contact['NumContact'].'"';?> > <?php echo $contact['NomContact']; ?> </label></br>
	<?php endwhile; ?>
   
   
	</br>
    <button class="button" type="submit"  id = "addSuivi" >Valider</button>
</form>
</div>
</body>
<style >
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