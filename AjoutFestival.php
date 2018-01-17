<?php
	include'inc/header.php';// liaison avec le fichier headear.php qui contient la barre de navigation
	
?>

<!-- le formulaire en html; on prend l'id de chaque element introduit ici dans la page AjoutFestivalFunc.php pour les ajouter dans la base de donnes-->
<middle>
<form action= "AjoutFestivalFunc.php" method="POST" > <!-- methode poste utilise pour recouperer les donnes-->
    <legend>Festival</legend>
    <p>
        <label for="AnneeFestival">Annee Festival</label> : <input type="int" name="AnneeFestival" id="AnneeFestival" required  />
    </p>
                    
    <p>
        <label for="DateFestival">Date Festival</label> : <input type="date" name="DateFestival" id="DateFestival" required/>

    </p>
    <p>
        <label for="NombreTables">Nombre Tables</label> : <input type="text" name="NombreTables" id="NombreTables" required/>

    </p>
    <p>
        <label for="PrixPlaceStandard">Prix Place Standard</label> : <input type="text" name="PrixPlaceStandard" id="PrixPlaceStandard" required/>
        

    </p>
    <input type="submit" value="Ajouter Festival" id = "add" />
</form>
</middle>
</body>
</html>