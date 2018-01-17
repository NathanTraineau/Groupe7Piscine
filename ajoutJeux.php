<?php
	include'inc/header.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');// connexion a la base de donnes

    //Editeurs
    $sql = "SELECT NumEditeur, NomEditeur 
            FROM `editeur`"; // la selection des editers de la base de donnes
    $q = $myPDO->query($sql); // interrogation de la base de donnes
    $editeurs = [];
    foreach($q as $ed){    //parcourrir le array $q et assignée à $ed la valeur de l'elemnt courant
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur']; //pour chaque valeur du tableau qui contient le nom on attribue l'identifiant comme clé
    }
    
    //Categories 
    $sql = "SELECT CodeCategorie, NomCategorie
            FROM `categorie`";// la selection des categories de la base de donnes
    $q = $myPDO->query($sql); // interrogation de la base de donnes
    $categories = [];
    foreach($q as $cat){    //parcourrir le array $q et assignée à $ed la valeur de l'elemnt courant
        $categories[$cat['NomCategorie']] = $cat['CodeCategorie'];// pour chaque valeur du tableau qui contient le nom on attribue le code comme clé
    }


?>
<middle>
<form action= "ajoutJeuxfunc.php" method="POST" >
    <legend>Editeur</legend>
    <p>
        <label for="NomJeux">Nom du jeux</label> : <input type="text" name="nomJeux" id="nomJeux" required  />
    </p>
                    
    <p>
        <label for="NombreJoueur">Nombre Joueur</label> : <input type="int" name="nombre" id="nombre" />

    </p>
    <p>
        <label for="DateSortie">Date sortie</label> : <input type="date" name="DateSortie" id="DateSortie" />

    </p>
    <p>
        <label for="DureePartie">Duree partie</label> : <input type="int" name="DureePartie" id="DureePartie" />
    </p>
    <p>
        <label for="DureePartie">Commentaire</label> : <input type="int" name="CommentaireJeux" id="CommentaireJeux" />
        
    </p>
    <p>
        <label for="numEditeur">Nom editeur</label> : <select name="numEditeur" id="numEditeur" required>
                <?php
                foreach($editeurs as $key => $value):// parcourir le tableau et afficher la valeur(le nom)
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>

    </p>

     <p>
        <label for="codeCategorie">Categorie</label> : <select name="codeCategorie" id="codeCategorie" >
                <?php
                foreach($categories as $key => $value):// parcourir le tableau et afficher la valeur(le nom)
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>

    </p>

    <?php
    
    if (!empty($_POST['NumReservation'])){ //verification s'il exite l'identifiant d'une reservation. S'il existe, on garde les donnes pour les utiliser dans ajoutJeuxfunc.php 
    	?>
    	<input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
    	<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
		

    	<?php
    } ?>
    <input type="submit" value="Ajouter jeux" id = "add" />
</form>
</form>
<p>
<form method="POST" action="ajoutCategorie.php"> <!--renvoie a la page ajoutCategorie.php pour ajouter une categorie-->
	<input type="submit" value="Ajouter une categorie" />
	
</form>
</p>
<p>
<form method="POST" action="jeux.php"> <!--renvoie a la page jeux.php -->
	<input type="submit" value="Annuler" />
	
</form>
</p>
</middle>
</body>
</html>
