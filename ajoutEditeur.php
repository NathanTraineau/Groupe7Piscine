<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];
	
}
?>
<middle>
<form action= "conexion2.php" method="POST" >
    <legend>Editeur</legend>
    <p>
        <label for="NomEditeur">Nom de l'Editeur</label> : <input type="text" name="nomEditeur" id="nomEditeur" required  />
    </p>
                    
    <p>
        <label for="Ville">Ville</label> : <input type="text" name="ville" id="ville" required/>

    </p>
    <p>
        <label for="Rue">Rue</label> : <input type="text" name="Rue" id="Rue" required/>

    </p>
    <p>
        <label for="CodePostale">Code postale</label> : <input type="text" name="code" id="code" required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <input type="submit" value="Ajouter" id = "add" />
</form>
</middle>
</body>
</html>