<!DOCTYPE html>


<?php
    include'inc/header.php';
    if ( !empty($_POST['infoID'])) {
            $num = $_POST['infoID']; // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomJeux qu'on va traduire en NumJeux juste en dessous.
            } 
    
    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
    if( !empty($num)){
        $sql3 = "SELECT * FROM `jeux` WHERE NumJeux = '".$num."'";// selection de jeux apres l'identifiant de la base de donnes
        $m = $myPDO->query($sql3)->fetch(); // sauvgarder l'elemt de type jeux dans $m
        $nomJeux = $m[2];
        $num = $m['NumJeux'];

    }
   
    $edit= "SELECT *  FROM `editeur` WHERE NumEditeur='".$m['NumEditeur']."'"; // selection de l'editeur apres l'identifiant de la base de donnes
    $Editeur = $myPDO->query($edit)->fetch();
    $Editeur['NumEditeur'];

    //affichage
    //$sql = "SELECT NumEditeur
            //FROM `editeur`";
    //$q = $myPDO->query($sql);
   

    $sqlannee = "SELECT * from Festival where Courant = '1' ";// selection du festival courant de la base de donnes

    $annee1 = $myPDO->query($sqlannee); //interrogation a la base de donnes
    $Festival = $annee1->fetch(); //on sauvgarde le festival
    $annee = $Festival['AnneeFestival'];// on sauvgarde l'annee


    $sql1 = 'SELECT * FROM `jeux` WHERE FestivalJeux = \''.$annee.'\''  ; //selection du jeux qui correspond a l'annee courant
     
    $k = $myPDO->query($sql1);
    ?>


<div class='container'>
    <!-- l'affichage des informations du jeux-->
    <form method="POST" action="jeux.php">
    <button class="button" type="submit">Retour Jeux</button>
    </form>
    <h1>Informations du jeux: </h1>
            <table class="table table-bordered table-condensed" id="jeux">
                <thead>
                    <tr>
                        <th>Nom Jeux</th>
                        <th>Nombre Joueur</th>
                        <th>Date sortie</th>
                        <th>Duree Partie</th>
                        <th>Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($m[2]) ?></td>
                            <td><?php echo htmlspecialchars($m[3]); ?></td>
                            <td><?php echo htmlspecialchars($m[4]); ?></td>
                            <td><?php echo htmlspecialchars($m[5]); ?></td>
                            <td><?php echo htmlspecialchars($m[8]); ?></td>
                            
                        </tr>
                </tbody>
            </table>

    <table class="table table-bordered table-condensed" id="jeux">
     <!-- l'affichage des informations de l'editeur qui correspond au jeux-->
        <thead>
            <h3>Editeur de <?php echo $nomJeux?>: </h3>
            <tr>
                <th>Nom Editeur</th>
                <th>Ville Editeur</th>
                <th>Rue Editeur</th>
                <th>Code postale</th>
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td><?php echo htmlspecialchars($Editeur[1]) ?></td>
                    <td><?php echo htmlspecialchars($Editeur[2]); ?></td>
                    <td><?php echo htmlspecialchars($Editeur[3]); ?></td>
                    <td><?php echo htmlspecialchars($Editeur[4]); ?></td>
                </tr>
    
        </tbody>
    </table>
    
<!--On affiche maintenat la categorie du jeux-->

 <?php
        //$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
        $sql2 = "SELECT * FROM `categorie` WHERE CodeCategorie='".$m['CodeCategorie']."'"; //selection de la categorie
        $categorie = $myPDO->query($sql2)->fetch(); //interrogation de la base de donne et sauvgarder la categorie du jeux 
        $nomCategorie= $categorie[1];
        
    ?>
<h3>Categorie du jeux <?php echo $nomJeux?> est: <?php echo $nomCategorie?></h3>
            

<?php
 $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    //Editeurs
    $sql = "SELECT NumEditeur, NomEditeur 
            FROM `editeur`";// selection des editeurs 
    $q = $myPDO->query($sql);// interrogation de la base de donnes
    $editeurs = [];
    foreach($q as $ed){ //parcourrir le array $q et assignée à $ed la valeur de l'element
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur']; // pour chaque valeur du tableau qui contient le nom on attribue le code comme clé
    }
 

//Categories 
    $sql = "SELECT CodeCategorie, NomCategorie
            FROM `categorie`";
    $q = $myPDO->query($sql);
    $categories = [];
    foreach($q as $cat){ ////parcourrir le array $q et assignée à $cat la valeur de l'element
        $categories[$cat['NomCategorie']] = $cat['CodeCategorie'];// pour chaque valeur du tableau qui contient le nom on attribue le code comme clé
    }
?>
<body>
<h5>Pour changer l'editeur du jeux <?php echo $nomJeux?> : </h5>

</br>
<form action= "changerEditeurFunc.php" method="POST" >
    <p>
        <label for="numEditeur">Nom editeur</label> : <select name="numEditeur" id="numEditeur" required>
                <?php
                foreach($editeurs as $key => $value):// parcourir le tableau et afficher la valeur(le nom)
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
        </select>
        <input type="hidden" name="infoID" value="<?php echo $Editeur['NumEditeur']; ?>" />
        <input type="submit" value="Changer" id = "add" />
    </p>
</form>
 <!--Pour changer la categorie on fait le meme que pour editeur mais sur le tableau categorie-->
<h5>Pour changer la categorie du jeux <?php echo $nomJeux?> : </h5>
<body>
</br>
<form action= "changerCategorieFunc.php" method="POST" >
    <p>
        <label for="CodeCategorie">Nom categorie</label> : <select name="CodeCategorie" id="CodeCategorie" required>
                <?php
                foreach($categories as $key => $value)://parcourir le tableau et afficher la valeur(le nom)
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
        <input type="hidden" name="infoID" value="<?php echo $categorie['CodeCategorie']; ?>" />
        <input type="submit" value="Changer" id = "add" />
    </p>
</form>
<div>
</body>

<style>
    h1{
        color:green;
    }
    h3 {
        color: #3366ff;
    }

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

</style>
</html>