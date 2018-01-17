
<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];
	
}
?>
<form action= "AjoutContactFunc.php" method="POST" >
    
    <legend>Contact</legend>
    <p>
        <label for="NomContact">Nom du Contact</label> : <input type="text" name="NomContact" id="NomContact" required  />
    </p>
                    
    <p>
        <label for="PrenomContact">Prenom du Contact</label> : <input type="text" name="PrenomContact" id="PrenomContact" required/>

    </p>
    <p>
        <label for="NumTelContact">Numéro de Tel du Contact</label> : <input type="text" name="NumTelContact" id="NumTelContact" required/>

    </p>
    <p>
        <label for="MailContact">Mail du Contact</label> : <input type="text" name="MailContact" id="MailContact" required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <input type="hidden" name="infoID" value="<?php echo $_POST["infoID"]; ?>" />
    <input type="submit" value="Ajouter" id = "add" />
</form>