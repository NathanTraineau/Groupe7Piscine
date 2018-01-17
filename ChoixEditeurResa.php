
<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

   
    if ( !empty($_POST['infoID'])) {
    	//On voit si la requête vient d'une page éditeur auquel cas on aura le champ Id editeur de figé
    	$sql7 = "SELECT * FROM editeur WHERE NumEditeur = '".$_POST['infoID']."' " ;
    	$f = $myPDO->query($sql7);
    	$edit = $f->fetch();
    	
    	
	}


	if ( !empty($_POST['erreur'])) {
    	//On voit si la requête vient d'une page éditeur auquel cas on aura le champ Id editeur de figé
    	echo "cet éditeur a déjà une réservation allez la modifier "
    	?>
    	<p>
    	<form method="POST" action="InfoReservation.php">
    	<input type="hidden" name="NumReservation" value="<?php echo $_POST['erreur']; ?>" />
    	<button type="submit">Aller à la Reservation</button>
    	</form>
    </p>
    	<?php
    	
	}

    //Editeurs
    $sql = "SELECT *
            FROM `editeur`";
    $q = $myPDO->query($sql);
    $editeurs = [];
    foreach($q as $ed){
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur'];
    }

   

?>






<form action="ajoutReservation.php" method="POST" >

<label for="numEditeur"> Choisir le nom de l'editeur pour lequel vous voulez faire une réservation : </label> : <select name="infoID" id="infoID" >
                <?php
                foreach($editeurs as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
    		
<input type="submit" style="float:right;" id="suppr" value="Ajouter une reservation" />

</form>