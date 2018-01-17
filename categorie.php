
			<?php

			    //en tête
			    include'inc/header.php';
			   //connexion bdd
			    $mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			    $requete = "SELECT CodeCategorie, NomCategorie FROM categorie";
			     
			    $reponse = $mybdd->query($requete);

			    ?>
			    <div class="container">
<p>
				<form method="POST" action="jeux.php">
				<input type="submit" value="Retour aux jeux" />
				
			</form>
</p>

			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed" id="jeux">
				<thead>
				    <tr>
					<th>Catégorie</th>
					<th> Actions</th>
				    </tr>
				</thead>
				<tbody>
					<!--Affiche les catégories-->
				    <?php while ($donnees = $reponse->fetch()):?>
					<tr>
					    <td><?php echo htmlspecialchars($donnees['NomCategorie']) ?></td>
					<td>
						<form method="POST" action="supCategorie.php">
							<input type="hidden" name="catID" value="<?php echo $donnees['CodeCategorie']; ?>" />
							<!-- met en mémoire pour env en post, le code de la categorie -->
                            				<input type="submit" style="float:right;" value="Suppr" />
                        			</form>
					</td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
    
		<middle>

			    <form method="POST" action="ajoutCategorie.php">
			    <button class="button" type="submit" >Ajouter une categorie</button>
	
			</form>
				</div>
		</middle>
	</body>
	<style >
	#jeux {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#jeux td, #editeur th {
    border: 1px solid #ddd;
    padding: 8px;
}

#jeux tr:nth-child(even){background-color: #f2f2f2;}

#jeux tr:hover {background-color: #ddd;}

#jeux th {
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
</style>

</html>
