<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    // $sql = "SELECT * FROM `editeur` WHERE numEditeur='".$num."'";
    $sql = "SELECT *
            FROM `logement` WHERE numLogement='".$_POST['LogementID']."' ";
    $row = $myPDO->query($sql)->fetch();

?>
<middle>
<form action= "modifLogementFunc.php" method="POST" >
    <legend>Editeur</legend>

    <p>
        <label for="NomLogement">Modifier le nom du logement</label> : <input type="text" name="NomLogement" id="NomLogement" value="<?php echo $row['NomLogement']; ?>" />
    </p>
    <p>
        <label for="VilleLogement">Modifier le ville du logement</label> : <input type="text" name="VilleLogement" id="VilleLogement" value="<?php echo $row['VilleLogement']; ?>" />
    </p>
                    
    <p>
        <label for="RueLogementue">Mofifier la rue du logement</label> : <input type="text" name="RueLogement" id="RueLogement" value="<?php echo $row['RueLogement']; ?>" />

    </p>
    <p>
        <label for="CodePostaleLogement">Modifier le code postale du logement</label> : <input type="text" name="CodePostaleLogement" id="CodePostaleLogement" value="<?php echo $row['CodePostaleLogement']; ?>" />

    </p>
    <p>
        <label for="NombreChambres">Modifier le code postale</label> : <input type="text" name="NombreChambres" id="NombreChambres" value="<?php echo $row['NombreChambres']; ?>" />
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <p>
        <label for="CoutLongementNuit">Modifier le code postale</label> : <input type="text" name="CoutLongementNuit" id="CoutLongementNuit" value="<?php echo $row['CoutLongementNuit']; ?>" />
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <input type="hidden" name="LogementID" value="<?php echo $_POST['LogementID']; ?>" />
    <input type="submit" value="Save" id = "add" />
</form>
</middle>
</body>
</html>