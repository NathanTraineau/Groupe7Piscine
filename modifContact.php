<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    
    $sql = "SELECT NumContact, NomContact, PrenomContact, NumTelContact, MailContact
            FROM contact WHERE NumContact='".$_POST['ContactID']."'";
    $row = $myPDO->query($sql)->fetch();

?>
<middle>
<form action= "modifContactFunc.php" method="POST" >
    <legend>Editeur</legend>
    <p>
        <label for="NomContact">Modifier le nom du contact</label> : <input type="text" name="NomContact" id="NomContact" value="<?php echo $row['NomContact']; ?>" />
    </p>
                    
    <p>
        <label for="PrenomContact">Mofifier prenom du contact</label> : <input type="text" name="PrenomContact" id="PrenomContact" value="<?php echo $row['PrenomContact']; ?>" />

    </p>
    <p>
        <label for="NumTelContact">modifier le numéro de tel du contact</label> : <input type="text" name="NumTelContact" id="NumTelContact" value="<?php echo $row['NumTelContact']; ?>" />

    </p>
    <p>
        <label for="MailContact">Modifier l'email du contact</label> : <input type="text" name="MailContact" id="MailContact" value="<?php echo $row['MailContact']; ?>" />
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    
    <input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
    <input type="hidden" name="ContactID" value="<?php echo $_POST['ContactID']; ?>" />
    <input type="submit" value="save" id = "add" />
</form>




