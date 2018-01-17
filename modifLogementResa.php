<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			<table>
			{
				text-align= center ;
			}
		</style>
	</head>
</html>

<?php
	include'inc/header.php';
    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piscine";
    //$editeur= "editeur";
    //if ( !empty($_POST['NumReservation'])) {

    $NumLogement = $_POST['logementID']; // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomEditeur qu'on va traduire en NumEditeur juste en dessous.
    		//} 
    
   $NumReservation = $_POST['NumReservation'];



    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');


    
    
    $sql2 = 'SELECT * FROM reservation WHERE NumReservation=\''.$NumReservation.'\''; 
    
    $sql3  = 'SELECT * FROM loger WHERE NumLogement= \''.$NumLogement.'\' and NumReservation=\''.$NumReservation.'\''; 
    
    $res = $myPDO->query($sql2)->fetch();
    $Reservation = $res['NumReservation'];
    $loger = $myPDO->query($sql3);
    
    ?>
    <form method="POST" action="InfoReservation.php">
    	<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>"/>
    <input type="submit" value="Retourner à info">
	</form>
    <table class="table table-bordered table-condensed">
        <thead>
        	
            <tr>
                <th>Nom Jeux</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $loger->fetch()): ?>
                <tr>
                    <td>
                	<?php
                	$log0 = 'SELECT * FROM logement where NumLogement =  \''.$r['NumLogement'].'\'';
    				$log1 = $myPDO->query($log0); 
    				$logement = $log1->fetch();
    				
    				?>
    				</td>

                    <td>
                        <form method="POST" action="modifLogementResaFunc.php">
                        	<p>
        				<label for="PlacesFrais">Frais sur place</label> : <input type="int" name="PlacesFrais" id="PlacesFrais" value="<?php echo $logement['PlacesFrais']; ?>"  />
                            



                            
					        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

					    	</p>
                            <input type="hidden" name="logementID" value="<?php echo $logement['NumLogement']; ?>" />
                            <input type="hidden" name="IdLoger" value="<?php echo $r['IdLoger']; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />
                         	<input type="submit" name="submit" value="modifier ce jeux " />
                            </td>

                         	</form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
    
        </tbody>
    </table>
    

<!-- On affiche maintenant ses jeux
