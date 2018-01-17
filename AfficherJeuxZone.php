<?php
		//en tête
		include'inc/header.php';
		$numZ = $_POST['zoneID'];
		
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

		//Nom de la zone 
		$nomZ = "SELECT * from zone WHERE NumZone = '$numZ' ";
		$nomZ = $mybdd->query($nomZ);
		$nomZ = $nomZ->fetch();
		$nomZ = $nomZ['NomZone'];

		//Selectionne le festival
		$sqltest = "SELECT * from Festival WHERE Courant = '1' ";
		$test = $mybdd->query($sqltest);
		$Festival = $test->fetch();
		$annee = $Festival['AnneeFestival'];
		
		//On recupère les jeux de la zone 
		$requete='SELECT * FROM jeux, concerner WHERE concerner.NumJeux = jeux.NumJeux and concerner.NumZone=\'' . $numZ . '\' and jeux.FestivalJeux=\'' . $annee . '\'';
		$reponse = $mybdd->query($requete);


?>
		

		<!--On affiche ces jeux-->
		<div class="container">
		<h2>Jeux de la Zone : <?php echo $nomZ?></h2> 
		    
			    
			    <table class="table table-bordered table-condensed" id="zone">
				<thead>
				    <tr>
					<th>Jeux</th>
					<th>Nom Editeur</th>
					<th>Nombre de jeux</th>
					<th>Reçu ?</th>
					<th>A retourné ?</th>
					<th>donné ?</th>
					<th>Informations Supplémentaires</th>
				    </tr>
				</thead>
				<tbody>
				    <?php while ($donnees = $reponse->fetch()):?>

					<?php
					//Nom de l'editeur
					$nomED = 'SELECT * from editeur WHERE NumEditeur = \'' . $donnees['NumEditeur'] . '\' ';
					$nomED = $mybdd->query($nomED);
					$nomED = $nomED->fetch();
					$nomED= $nomED['NomEditeur'];
					?>
					<tr>
					<td><?php echo htmlspecialchars($donnees['NomJeux']) ?></td>
					<td><?php echo htmlspecialchars($nomED) ?></td>
					<td><?php echo htmlspecialchars($donnees['Nombre']) ?></td>
					
					<td><?php if ($donnees['Recu'] == 1 ){
                    				echo "Non";
                     			}else{echo "Oui" ; }?></td>

                   			<td><?php if ($donnees['Retour'] == 1 ){
                    				echo "Non";
                     			}else{echo "Oui" ; }?></td>

					<td><?php if ($donnees['don'] == 1 ){
                    				echo "Non";
                     			}else{echo "Oui" ; }?></td>
					<td>
					<form method="POST" action="InfoJeux.php">
                                    <input type="hidden" name="infoID" value="<?php echo $donnees['NumJeux']; ?>"/>
                                    <input type="submit" style="float:right;" value="Info Jeux" />
                                    </form>

					<form method="POST" action="InfoEditeur.php">
                                    <input type="hidden" name="infoID" value="<?php echo $donnees['NumEditeur']; ?>"/>
                                    <input type="submit" style="float:right;" value="Info Editeur" />
                                    </form>
					<form method="POST" action="InfoReservation.php">
                                    <input type="hidden" name="NumReservation" value="<?php echo $donnees['NumReservation']; ?>"/>
                                    <input type="submit" style="float:right;" value="Info Resa" />
                                    </form>

					</td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
		
                </form>
    

<style>		</div>
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

</html>

		

