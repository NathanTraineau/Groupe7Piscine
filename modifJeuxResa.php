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

    $NumJeux = $_POST['jeuxID']; // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomEditeur qu'on va traduire en NumEditeur juste en dessous.
    		//} 
    
   $NumReservation = $_POST['NumReservation'];



    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');


    // On récupère les zones 
    $sql = "SELECT *
            FROM `zone`";
    $q = $myPDO->query($sql);
    $zone = [];
    foreach($q as $zo){
        $zone[$zo['NomZone']] = $zo['NumZone'];
    }
    
    $sql2 = 'SELECT * FROM reservation WHERE NumReservation=\''.$NumReservation.'\''; 
    
    $sql3  = 'SELECT * FROM concerner WHERE NumJeux= \''.$NumJeux.'\' and NumReservation=\''.$NumReservation.'\''; 
    
    $res = $myPDO->query($sql2)->fetch();
    $Reservation = $res['NumReservation'];
    $concerner = $myPDO->query($sql3);
    
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
            <?php while ($r = $concerner->fetch()): ?>
                <tr>
                    <td>
                	<?php
                	$jeux0 = 'SELECT * FROM jeux where NumJeux =  \''.$r['NumJeux'].'\'';
    				$jeux1 = $myPDO->query($jeux0); 
    				$jeux = $jeux1->fetch();
    				echo $jeux['NomJeux'];
    				?>
    				</td>

                    <td>
                        <form method="POST" action="modifJeuxResaFunc.php">
                        	<input type="int" name="nombre" value= "<?php echo $r['Nombre']; ?>" /> Nombre de jeux <br>
                            



                            <?php if ($r['Retour'] == '1'){ 
                            	?>
                            <input type="checkbox" name="Retour" value ="1" checked /> A retourner <br>
                            <?php }else { ?>

                            	<input type="checkbox" name="Retour" value ="1" /> A retourner <br>
                            <?php }  ?>



                            <?php if ($r['Recu'] == '1'){ 
                            	?>
                            <input type="checkbox" name="recu" value ="1" checked /> Recu <br>
                            <?php } else { ?>

                            	<input type="checkbox" name="recu" value ="1"  /> Recu <br>
                            <?php }  ?>






                            <?php if ($r['don'] == '1'){ 
                            	?>
                            <input type="checkbox" name="Don" value ="1" checked /> Don <br>
                            <?php } else { ?>

                            	<input type="checkbox" name="Don" value ="1"  /> Don <br>
                            <?php }  ?>
                            <p>


					        <label for="NumZone">Zone</label> : <select name="NumZone" id="NumZone" value="<?php echo $r['NumZone']; ?>" >
					                <?php
					                foreach($zone as $key => $value):
					                echo '<option value="'.$value.'">'.$key.'</option>'; 
					                endforeach;
					                ?>
					        </select>
					        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

					    	</p>
                            <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                            <input type="hidden" name="IdConcerner" value="<?php echo $r['IdConcerner']; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />
                         	<input type="submit" name="submit" value="modifier ce jeux " />
                            </td>

                         	</form>

                    </td>
                </tr>
            <?php endwhile; ?>
    
        </tbody>
    </table>
    

<!-- On affiche maintenant ses jeux
