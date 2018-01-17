<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];


}
	
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    
    $sqlannee = 'SELECT * from Festival where Courant = "1" ';

	$annee = $myPDO->query($sqlannee);
	$Festival = $annee->fetch();
    //Jeux

    //Récup les zones
	$sql = "SELECT *
            FROM `zone`";
    $q = $myPDO->query($sql);
    $zone = [];
    foreach($q as $zo){
        $zone[$zo['NomZone']] = $zo['NumZone'];
    }


    $NumEditeurReservation = $_POST['infoID'];
    
	
	$FestivalAnnee = $Festival['AnneeFestival'];


  	#On récup la réservation de l'éditeur
	if (empty($_POST['NumReservation'])){
	
    $NumRes1 = 'SELECT * from reservation where NumEditeurReservation =  \''.$NumEditeurReservation.'\' and FestivalReservation= \''.$FestivalAnnee.'\' ';

	$NumRes2 = $myPDO->query($NumRes1);
	$Reserv = $NumRes2->fetch();
	$Reservation = $Reserv['NumReservation'];
	// Si on vient pas de la page ajout jeux alors : 
	}else {
	$Reservation = $_POST['NumReservation'];
	}
# Recupère les jeux de l'editeur 
	$sql2 = 'SELECT * FROM `jeux` where NumEditeur =  \''.$NumEditeurReservation.'\' and FestivalJeux = \''.$FestivalAnnee.'\'' ;

    $jeux = $myPDO->query($sql2);
?>

    <table class="table table-bordered table-condensed" id="editeur">
                <thead>
                    <tr>
                        <th>Nom Jeux</th>
                        <th>Nombre Joueur</th>
                        <th>Date sortie</th>
                        <th>Duree Partie</th>
                        <th>Editeur</th>
                        <th>Categorie</th>
                        <th>Renseignement</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            while ($r = $jeux->fetch()) : ?>
            <?php
            //Nom de la categorie
				$nomCat = 'SELECT * from categorie WHERE CodeCategorie = \'' . $r['CodeCategorie'] . '\' ';
				$nomCat = $myPDO->query($nomCat);
				$nomCat = $nomCat->fetch();
				$nomCat= $nomCat['NomCategorie']; 
				?>
				
				<?php
				//Nom de l'editeur
				$nomE = 'SELECT * from editeur WHERE NumEditeur = \'' . $r['NumEditeur'] . '\' ';
				$nomE = $myPDO->query($nomE);
				$nomE = $nomE->fetch();
				$nomE= $nomE['NomEditeur']; 
				?>
                <tr>
                	
                    		<td><?php echo htmlspecialchars($r['NomJeux']) ?></td>
                            <td><?php echo htmlspecialchars($r['NombreJoueur']); ?></td>
                            <td><?php echo htmlspecialchars($r['DateSortie']); ?></td>
                            <td><?php echo htmlspecialchars($r['DureePartie']); ?></td>
                            <td><?php echo htmlspecialchars($nomE); ?></td>
                            <td><?php echo htmlspecialchars($nomCat); ?></td>
                            <td>

                        	<form method="POST" action="ajoutJeuxReservationFunc.php">
                        	<input type="int" name="nombre" /> Nombre de jeux <br>
                            <input type="checkbox" name="recu" value ="1"  /> Recu <br>
                            <input type="checkbox" name="Retour" value ="1" /> A retourner <br>
                            <input type="checkbox" name="Don" value ="1"/> Don <br>
                            <p>
					        <label for="NumZone">Zone</label> : <select name="NumZone" id="NumZone" >
					                <?php
					                foreach($zone as $key => $value):
					                echo '<option value="'.$value.'">'.$key.'</option>'; 
					                endforeach;
					                ?>
					        </select>
					        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

					    	</p>
                            <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                            <input type="hidden" name="infoID" value="<?php echo $NumEditeurReservation; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />
                         	<input type="submit" name="submit" value="Ajouter ce jeux " />
                            </td>

                         	</form>
            <?php endwhile ; ?>

                </tbody>
    </table>
     <form method="POST" action="ajoutJeux.php">
			            	<input type="hidden" name="infoID" value="<?php echo $NumEditeurReservation; ?>" />
							<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />

							<button class="button" type="submit">Ajout Jeux</button>
							</form>
                    

    <form method="POST" action="ajoutLogement.php">
			            	<input type="hidden" name="infoID" value="<?php echo $NumEditeurReservation; ?>" />
							<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />

							<button  class="button" type="submit">Ajouter un Logement au site</button>
							</form>
                    
    <form method="POST" action="ajoutLogementResa.php">
   
    <!-- Ajout d'un logement à la résa -->
    <label for="logement">Logement </label> : <select name="logement" id="logement" >
			                <?php
			                $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			                $sql = "SELECT * FROM `logement`";
						    $q = $myPDO->query($sql);
						    $festival = [];
						    foreach($q as $fes){
						        $festival[$fes['NomLogement']] = $fes['NumLogement'];
						    }
			                foreach($festival as $key => $value):
			                	echo '<option value="'.$value.'">'.$key.'</option>'; //il faut créer les entrées dans la bdd
			                endforeach;
			                ?>
			                </select>

			                
			            	
	<label for="PlacesFrais">Frais sur place</label> : <input type="int" name="PlacesFrais" id="PlacesFrais" required  />

	
    <input type="hidden" name="infoID" value="<?php echo $NumEditeurReservation; ?>" />
	<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />
	<button type="submit"> Ajouter le Logement à la reservation </button>
	</form>

    </p>


    <form method="POST" action="ajoutZone.php">
			            	<input type="hidden" name="infoID" value="<?php echo $NumEditeurReservation; ?>" />
							<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />

								<button type="submit">Ajout Zone</button>
							</form>
                    
    <form method="POST" action="ajoutZoneResa.php">
   
    <!-- Ajout d'un logement à la résa -->
    <label for="zone">Zones </label> : <select name="zone" id="zone" >
			                <?php
			                $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			                $sql = 'SELECT * FROM `zone` where AnneeZone = \''.$FestivalAnnee.'\'' ;
						    $w = $myPDO->query($sql);
						    $festiva = [];
						    foreach($w as $fes){
						        $festiva[$fes['NomZone']] = $fes['NumZone'];
						    }
			                foreach($festiva as $key => $value):
			                	echo '<option value="'.$value.'">'.$key.'</option>'; //il faut créer les entrées dans la bdd
			                endforeach;
			                ?>
	</select>

			                
			            	
	<label for="NombreEspace">Nombre de place</label> : <input type="int" name="NombreEspace" id="NombreEspace"   />
	<input type="hidden" name="infoID" value="<?php echo $NumEditeurReservation; ?>" />
	<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />
	<input type="submit" value="Ajout places dans Zone à la Reservation" />
	</form>

    </p>

    	
		<form method="POST" action="InfoReservation.php">
		<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />
    	<button type="submit">Finir la Reservation</button>
    </form>

<style>
#editeur {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#editeur td, #editeur th {
    border: 1px solid #ddd;
    padding: 8px;
}

#editeur tr:nth-child(even){background-color: #f2f2f2;}

#editeur tr:hover {background-color: #ddd;}

#editeur th {
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

.recherche {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}


    </style>
</html>