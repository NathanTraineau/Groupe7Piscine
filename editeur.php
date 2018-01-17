
<?php
	include'inc/header.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    $sql1 = "SELECT NumEditeur, NomEditeur, VilleEditeur, RueEditeur, CodePostaleEditeur 
            FROM `editeur`";
     
    $q = $myPDO->query($sql1);

   
	$sqltest = "SELECT * from Festival where Courant = '1' ";

	$test = $myPDO->query($sqltest);
	$aff= $test->fetch();
    ?>
    <div class="container">
    <form method="POST" action="InfoEditeur.php">
    	<label for="NomEditeur" style="font-size: 16px">Nom de l'Editeur</label> :
    </br>
        <input type="text" name="nomEditeur" id="nomEditeur"  > 
    </br>
        <input type="submit" class = "recherche" style="left:20px;" id="recherche" value="Rechercher" /></button>
    </form>
	</br>
    <table class="table table-bordered table-condensed" id="editeur">
        <thead>
            <tr>
                <th>Nom Editeur</th>
                <th>Ville Editeur</th>
                <th>Rue Editeur</th>
                <th>Code Postale</th>
                <th>Actions</th>
                <th>Informations</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($r['NomEditeur']) ?></td>
                    <td><?php echo htmlspecialchars($r['VilleEditeur']); ?></td>
                    <td><?php echo htmlspecialchars($r['RueEditeur']); ?></td>
                    <td><?php echo htmlspecialchars($r['CodePostaleEditeur']); ?></td>
                    <td>
                        <form method="POST" action="supEditeur.php">
                            <input type="hidden" name="editeurID" value="<?php echo $r['NumEditeur']; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Supprimer" /></button>
                        </form>
                        <form method="POST" action="modifEditeur.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="editeurID" value="<?php echo $r['NumEditeur']; ?>" />
                            <input type="submit" style="float:right;" id="modif" value="Modifier" /></button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="InfoEditeur.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="infoID" value="<?php echo $r['NumEditeur']; ?>" /> <!-- met en mémoire pour env en post, le num de l'editeur -->
                            <input type="submit" style="float:right;" id="info" value="info" />Voir Informations</button>
                        </form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    
    

	<middle>


        </p>
            <form method="POST" action="ajoutEditeur.php">
            <button class="button" type="submit">Ajouter Editeur</button>
        </form>
        </form>
        </middle>
    </div>
<style>
#editeur {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#editeur td, #editeur th {
    border: 1px solid #ddd;
    padding: 8px;
}

#editeur tr:nth-child(even){background-color: #f2f2f2;}

#editeur tr:hover {background-color: #ddd;}

#editeur th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;

}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button:hover {
    background-color: #4CAF50;
    color: white;
}

.recherche {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.recherche {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.recherche:hover {
    background-color: #4CAF50;
    color: white;
}

input[type=text] {
    width: 130px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 35%;
}

    </style>
</body>
</html>