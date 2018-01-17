
			<?php

			    //en tête
			    include'inc/header.php';
			   //connexion bdd
			    $mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
			//Selectionne le festival pour lequel on veut afficher les zones (celui sur lequel on est connecté)
			$sqltest = "SELECT * from Festival WHERE Courant = '1' ";
			$test = $mybdd->query($sqltest);
			$Festival = $test->fetch();
			$annee = $Festival['AnneeFestival'];


				//on selectionne les zones de ce festival
			    $requete = 'SELECT NumZone, NomZone, AnneeZone FROM zone WHERE AnneeZone=\'' . $annee . '\'';
			     
			    $reponse = $mybdd->query($requete);

			    ?>

		<div class="container" >
		    	
		    
			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed" id="zone">
				<thead>
				    <tr>
					<th>Zones</th>
					<th>Nombre d'espaces occupés</th>
					<th>Actions</th>
				    </tr>
				</thead>
				<tbody>
					<!--Affiche les zones-->
				    <?php while ($donnees = $reponse->fetch()):?>
					<tr>
					    <td><?php echo htmlspecialchars($donnees['NomZone']) ?></td>
						<td>
					<?php $req = 'SELECT IdLocaliser, NumReservation, NumZone, SUM(NombreEspace) as som FROM localiser WHERE NumZone=\'' .$donnees['NumZone']. '\'';
						$espace = $mybdd->query($req);
						$espace1 = $espace->fetch();
						$nbrEspace = $espace1['som'];
						echo htmlspecialchars($nbrEspace);
					?></td>						
					<td>
						<form method="POST" action="supZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />			
                            				<input type="submit" style="float:right;" value="Suppr" />
                        			</form>
						
						<form method="POST" action="AfficherJeuxZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />
                            				<input type="submit" style="float:right;" value="Voir jeux" />
                        			</form>
					</td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
			 <form method="POST" action="ChoixZone.php">
				<button class="button" type="submit" style="float:left;">Ajouter une Zone</button>
    		</form>
		


</div>
<style>
#zone {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#zone td, #zone th {
    border: 1px solid #ddd;
    padding: 8px;
}

#zone tr:nth-child(even){background-color: #f2f2f2;}

#zone tr:hover {background-color: #ddd;}

#zone th {
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
</body>
</html>

