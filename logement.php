<?php
    include'inc/header.php';
    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piscine";
    //$editeur= "editeur";
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    $sql = "SELECT * FROM `logement`";

    // Rajouter un nom logement à la bdd

   	//Penser à changer l'orthographe de longement en logement à certains endroits 
    
     
    $q = $myPDO->query($sql);
    ?>
    <div class="container">
    <table class="table table-bordered table-condensed" id="logement">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Ville </th>
                <th>Rue </th>
                <th>Code Postale </th>
                <th>Nombre Chambres </th>
                <th>Cout par nuit </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                	<td><?php echo htmlspecialchars($r['NomLogement']); ?></td>
                    <td><?php echo htmlspecialchars($r['VilleLogement']); ?></td>
                    <td><?php echo htmlspecialchars($r['RueLogement']); ?></td>
                    <td><?php echo htmlspecialchars($r['CodePostaleLogement']); ?></td>
                    <td><?php echo htmlspecialchars($r['NombreChambres']); ?></td>
                    <td><?php echo htmlspecialchars($r['CoutLongementNuit']); ?></td> 
                    <td>
                        <form method="POST" action="supLogement.php">
                            <input type="hidden" name="LogementID" value="<?php echo $r['NumLogement']; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Suppr" />
                        </form>
                        <form method="POST" action="modifLogement.php">
                        	<input type="hidden" name="LogementID" value="<?php echo $r['NumLogement']; ?>" />
                            <input type="submit" style="float:right;" id="modif" value="modif" />
                            
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
    <form method="POST" action="ajoutLogement.php">
    <button type="submit">Ajouter Logement</button>
</form>
</div>



   
<style >
#logement {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#logement td, #editeur th {
    border: 1px solid #ddd;
    padding: 8px;
}

#logement tr:nth-child(even){background-color: #f2f2f2;}

#logement tr:hover {background-color: #ddd;}

#logement th {
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

</body>
</html>
	