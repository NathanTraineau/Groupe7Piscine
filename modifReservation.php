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

    // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomEditeur qu'on va traduire en NumEditeur juste en dessous.
    		//} 
    
    



    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
    $sqltest = "SELECT * from Festival where Courant = '1' ";

	$test = $myPDO->query($sqltest);
	$Festival = $test->fetch();
	$FestivalAnnee = $Festival['AnneeFestival'];
	$NumReservation = $_POST['NumReservation'];
    
    
    
   $sql2 = "SELECT *
            FROM reservation WHERE NumReservation='".$_POST['NumReservation']."'";
    
    
    $res = $myPDO->query($sql2);
    $r = $res->fetch();
    echo $r['DateReservation'];

    $Reservation = $res->fetch()['NumReservation'];
    

    // On fait un formulaire qui reprend les valeures enregistrés de la réservation
    ?>
    <form method="POST" action="InfoReservation.php">
    	<input type="hidden" name="NumReservation" value="<?php echo $NumReservation; ?>"/>
    <input type="submit" value="Retourner à info">
	</form>

                    

    <table class="table table-bordered table-condensed">
    	<form method="POST" action="modifReservationFunc.php">
       

			               



    <p>
        <label for="DateReservation">Date de reservation</label> : <input type="date" name="DateReservation" id="DateReservation" value= "<?php echo $r['DateReservation']; ?>"  />
    </p>
                    
    

    <p>
        <label for="PrixEspace">Prix Espace</label> : <input type="number" name="PrixEspace" id="PrixEspace" value= "<?php echo $r['PrixEspace']; ?>"/>

    </p>

    
    

    <p>
        <label for="Commentaire">Commentaire</label> : <input type="text" rows="6" name="Commentaire" id="Commentaire" value= "<?php echo $r['Commentaire']; ?>"/>

    </p>
    
   
                            



                            <?php if ($r['Statut'] == '1'){ 
                            	?>
                            <input type="checkbox" name="Statut" value ="1" checked /> Statut <br>
                            <?php }else { ?>

                            	<input type="checkbox" name="Statut" value ="1" /> Statut <br>
                            <?php }  ?>



                            <?php if ($r['EtatFacture'] == '1'){ 
                            	?>
                            <input type="checkbox" name="EtatFacture" value ="1" checked /> EtatFacture <br>
                            <?php } else { ?>

                            	<input type="checkbox" name="EtatFacture" value ="1"  /> EtatFacture <br>
                            <?php }  ?>


					        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

					    	</p>
                            
                            <input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
                            <input type="hidden" name="infoID" value="<?php echo $_POST['infoID'] ; ?>" />
                         	<input type="submit" name="submit" value="modifier cette reservation " />
                            </td>

                         	</form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
        
    
        </tbody>
    </table>
    

<!-- On affiche maintenant ses jeux
