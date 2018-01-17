 
<?php

    include'inc/header.php';

    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piscine";
    //$editeur= "editeur";

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root');

    $sqlannee = "SELECT * from Festival where Courant = '1' ";

	$annee1 = $myPDO->query($sqlannee);
	$Festival = $annee1->fetch();
	$annee = $Festival['AnneeFestival'];


    $sql1 = 'SELECT * FROM `reservation` WHERE FestivalReservation = \''.$annee.'\''  ;
     
    
    $edit = "SELECT * FROM 'editeur'";
    $editeur = $myPDO->query($edit); 
    $q = $myPDO->query($sql1);
    
    
    ?>
    <div class="container">
    

    </br>

    <table class="table table-bordered table-condensed" id="editeur">
        <thead>
            <tr>
                <th>Date de Reservation</th>
                
                <th>Editeurs </th>
                <th>Annulé ? </th>
                <th>Facture payée ?</th>
                
                <th>Informations</th>
            </tr>
        </thead>
        <tbody>

            <?php while ($r = $q->fetch()): ?>
                <tr>
                	<td><?php echo htmlspecialchars($r['DateReservation']); ?></td>
                	<?php
                	$edit = 'SELECT * FROM editeur where NumEditeur =  \''.$r['NumEditeurReservation'].'\'';
    				$edite = $myPDO->query($edit); 
    				$editeur = $edite->fetch();
    				?>

                    <td><?php echo htmlspecialchars($editeur['NomEditeur']) ?></td>
                    

                    <td><?php if ($r['Statut'] == 1 ){
                    	echo "non";

                     }else{echo "oui" ; }?></td>

                    <td><?php if ($r['EtatFacture'] == 1 ){
                    	echo "non";

                     }else{echo "oui" ; }?></td>
                    
                    <td>
                        <form method="POST" action="InfoReservation.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="NumReservation" value="<?php echo $r['NumReservation']; ?>" /> <!-- met en mémoire pour env en post, le num de l'editeur -->
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

        </p>
            <form method="POST" action="ChoixEditeurResa.php">
            <button class="button" type="submit">Ajouter Reservation</button>
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