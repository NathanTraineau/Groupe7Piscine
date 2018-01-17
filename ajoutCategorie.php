
		<?php

			//en tête
			include'inc/header.php';


		?>
	<div class="container">
		<middle>
			<!--Formulaire pour ajouter une catégorie-->
	    		<form method="POST" action="ajoutCategorieFunc.php">
		    		<legend>Catégorie</legend>

		    		<p>
					<label for="NomCategorie" >Nom de la catégorie</label> : <input type="text" name="NomCategorie"/>
		            
	    			<input type="submit" value="Ajouter la categorie" />
				</p>
			</form>
			<form method="POST" action="categorie.php">
				<input type="submit" value="Annuler" />
	
			</form>
		</middle>
	</div>
	</body>

</html>

