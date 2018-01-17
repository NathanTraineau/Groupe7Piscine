<?php

			//en tête
			include'inc/header.php';
			//connexion
 $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		?>
<middle>
<div class="container">
		<!--Formulaire pour ajouter une zone editeur-->
	    	<form method="POST" action="ajoutZoneEDFunc.php">
		<legend>Nouvelle Zone Editeur</legend>
<p>
<?php
 //Editeurs
    $sql = "SELECT NumEditeur, NomEditeur
            FROM `editeur`";
    $q = $myPDO->query($sql);
    $editeurs = [];
    foreach($q as $ed){
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur'];//editeurs : tableau des noms d'editeurs
    }

?>


<label for="numEditeur">Nom de l'editeur</label> : <select name="numEditeur" id="numEditeur" required>
                <?php
                foreach($editeurs as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
        </select>
<input type="submit" value="Ajouter la zone" />


</p>
</form>
<form method="POST" action="zone.php">
<button class="button" type="submit" style="float:righgt;">Annuler</button>
</form>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
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
</div>
		</middle>
	</body>
</html>
