<?php
	include'inc/header.php';
	
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');//connexion a la base de donnes

  
    $sql = "SELECT *
            FROM `jeux` WHERE NumJeux='".$_POST['jeuxID']."' ";//selection de donnes
    $row = $myPDO->query($sql)->fetch(); 

?>
<middle>
<form action= "modifJeuxFunc.php" method="POST" >
    <!--formulaire qui contient les donnes qui seront modifie (avant de modification affiche les information actuelles du jeux)-->
    <legend>Jeux</legend>
    <p>
        <label for="NomJeux">Modifier le nom du jeux</label> : <input type="text" name="nomJeux" id="nomJeux" value="<?php echo $row['NomJeux']; ?>" />
    </p>
                    
    <p>
        <label for="NombreJoueur">Mofifier le nombre de joueurs</label> : <input type="text" name="nb" id="nb" value="<?php echo $row['NombreJoueur']; ?>" />

    </p>
    <p>
        <label for="DateSortie">Modifier la date de sortie</label> : <input type="text" name="date" id="date" value="<?php echo $row['DateSortie']; ?>" />

    </p>
    <p>
        <label for="DureePartie">Modifier le code postale</label> : <input type="text" name="duree" id="duree" value="<?php echo $row['DureePartie']; ?>" />
        
    </p>
    <input type="hidden" name="jeuxID" value="<?php echo $_POST['jeuxID']; ?>" />
    <input type="submit" value="Save" id = "add" />
</form>
</middle>
</body>
</html>