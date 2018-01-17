<?php
    include'inc/header.php';
   
    

?>
<middle>
<!--formulaire pour ajouter un logement-->
<form action= "ajoutLogementFunc.php" method="POST" >
    <legend>Editeur</legend>

    <p>
        <label for="NomLogement">Nom Logement</label> : <input type="text" name="NomLogement" id="NomLogement" required  />
    </p>
    <p>
        <label for="VilleLogement">Ville Logement</label> : <input type="text" name="VilleLogement" id="VilleLogementvi" required  />
    </p>
                    
    <p>
        <label for="RueLogement">Rue logement</label> : <input type="text" name="RueLogement" id="RueLogement" required/>

    </p>
    <p>
        <label for="CodePostaleLogement">Le code postale du logement</label> : <input type="text" name="CodePostaleLogement" id="CodePostaleLogement" required/>

    </p>
    <p>
        <label for="NombreChambres">Le nombre du chambres du logement</label> : <input type="number" name="NombreChambres" id="NombreChambres" required/>

    </p>
     <p>
        <label for="CoutLogementNuit">Le cout du logement par nuit</label> : <input type="float" name="CoutLogementNuit" id="CoutLogementNuit" required/>

    </p>
    <?php
    
    if (!empty($_POST['NumReservation'])){ //verifie s'il exite une reservation et sauvgarde des donnees-->
    	?>
    	<input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
    	<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
		

    	<?php
    } elseif (!empty($_POST['infoID'])){
    	?>
    	<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
    	<?php
    }
    ?>

    <input type="submit" value="Ajouter" id = "add" />
</form>
</middle>
</body>
</html>