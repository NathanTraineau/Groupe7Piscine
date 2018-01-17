<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];


}
	$NumEditeur = $_POST['infoID'];
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

   	



    //Jeux
    $sql = ' SELECT * FROM `reservation` WHERE NumEditeurReservation = \''.$NumEditeur.'\'';

    $q = $myPDO->query($sql);

    if (!empty($r = $q->fetch())){ 
?>
    	<form  name="envoie" method="POST" action="ChoixEditeurResa.php" >
         	<input type="hidden" name="erreur" value="<?php echo $r['NumReservation'] ?>" />


        	<?php echo $r['NumReservation']; ?>                   
        </form> 
        <script type="text/javascript"> document.envoie.submit();</script>
        <script type="text/javascript">location.href = 'ChoixEditeurResa.php';</script>
        <?php
        
    }

    

    ?>

    <form method="POST" action="ChoixEditeurResa.php">
    <button type="submit">Retour Editeurs</button>
	</form>
    
   
<?php
    
	$edit= "SELECT NomEditeur FROM `editeur` WHERE NumEditeur='".$NumEditeur."'";

    $NomEdit = $myPDO->query($edit)->fetch();

?>

    <h3>Ajouter une Reservation pour <?php echo $NomEdit['NomEditeur'] ?></h3>

    		            	
    

    <form method="POST" action="AjoutReservationFunc.php">
    	



    <p>
        <label for="DateReservation">Date de reservation</label> : <input type="date" name="dateReservation" id="dateReservation" required  />
    </p>
                    
    

    <p>
        <label for="PrixEspace">Prix Espace</label> : <input type="number" name="PrixEspace" id="PrixEspace" required/>

    </p>

    
    <p>
        <label for="EtatFacture">Facture payée ?</label> : <input type="checkbox" name="EtatFacture" id="EtatFacture" value ="1" />
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>

    <p>
        <label for="Commentaire">Commentaire</label> : <input type="text" rows="6" name="Commentaire" id="Commentaire" />

    </p>
    
    <input type="hidden" name="infoID" value="<?php echo $NumEditeur; ?>" />
    <input type="submit" value="Ajouter des éléments" id = "add" />
    </form>


    

</middle>
</body>
</html>