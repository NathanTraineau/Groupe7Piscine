<?php
    include'inc/header.php';
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
    $sql = "SELECT NumEditeur
            FROM `editeur`";
    $q = $myPDO->query($sql);
  
    
    $sqlannee = "SELECT * from Festival where Courant = '1' ";

	$annee1 = $myPDO->query($sqlannee);
	$Festival = $annee1->fetch();
	$annee = $Festival['AnneeFestival'];


    $sql1 = 'SELECT * FROM `jeux` WHERE FestivalJeux = \''.$annee.'\''  ;
     
    $k = $myPDO->query($sql1);

    $sql = "SELECT NumEditeur, NomEditeur
            FROM `editeur`";
    $q = $myPDO->query($sql);
    $editeurs = [];
    foreach($q as $ed){
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur'];
    }
    
    ?>
        <div class="container">
            <table class="table table-bordered table-condensed" id="jeux">
                <thead>
                    <tr>
                        <th>Nom Jeux</th>
                        <th>Nom editeur </th>
                        <th>Actions</th>
                        <th>Informations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($r = $k->fetch()):?>
                        <tr>
                            <td><?php echo htmlspecialchars($r["NomJeux"]) ?></td>

                            <td><?php  $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
                                    
   
                                        $edit= "SELECT *  FROM `editeur` WHERE NumEditeur='".$r['NumEditeur']."'";
                                        $Editeur = $myPDO->query($edit)->fetch();
                                        $Editeur['NomEditeur'];
                                    

                                    echo htmlspecialchars($Editeur['NomEditeur']) ?></td>
   
                            <td>
                                <form method="POST" action="supJeux.php">
                                    <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                                    <input type="submit" style="float:right;" id="suppr" value="Supprimer" />
                                </form>
                                <form method="POST" action="modifJeux.php">
                                    <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                                    <input type="submit" style="float:right;" id="modif" value="Modifier" />
                                </form>
                              
                            </td>
                            <td>
                                <form method="POST" action="InfoJeux.php">
                                    <!--<button type="submit">Modif</button> -->
                                    <input type="hidden" name="infoID" value="<?php echo $r['NumJeux']; ?>" /> <!-- met en mémoire pour env en post, le num de l'editeur -->
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
            <form method="POST" action="ajoutJeux.php">
            <button type="submit">Ajouter Jeux</button>
        </form>
        </form>
<p>
 <form method="POST" action="categorie.php">
                        
            <input type="submit" value="Modifier les catégories" />
  </form>
</p>
        </middle>
    </div>

    <style>
#jeux {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#jeux td, #editeur th {
    border: 1px solid #ddd;
    padding: 8px;
}

#jeux tr:nth-child(even){background-color: #f2f2f2;}

#jeux tr:hover {background-color: #ddd;}

#jeux th {
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

/* When the input field gets focus, change its width to 35% */
input[type=text]:focus {
    width: 35%;
}

    </style>
</body>
</html>
