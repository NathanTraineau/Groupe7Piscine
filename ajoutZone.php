
		<?php

			//en tête
			include'inc/header.php';
		?>
<middle>
<div class="container">
		<!--Formulaire pour ajouter une catégorie-->
	    	<form method="POST" action="ajoutZoneFunc.php">
		<legend>Nouvelle Zone</legend>
<p>
<?php 
if(isset($_POST['zoneED'])&& ($_POST['zoneED'])=="oui")
{
?>
<script type="text/javascript">location.href = 'ajoutZoneED.php';</script>

<?php
}
else
{		
?>
<?php
    
    if (!empty($_POST['NumReservation'])){
        ?>
        <input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
        <input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
        

        <?php
    } elseif (!empty($_POST['infoID'])){
        ?>
        <input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
        <?php
    }
    ?>
		    		
<label for="NomZone" >Nom de la zone</label> : <input type="text" name="NameZone" required/ >
<input type="submit" value="Ajouter la zone" />


				</p>
			</form>
			<form method="POST" action="zone.php">
				<button class="button" type="submit" style="float:left;">Annuler</button>
	
			</form>


		</middle>
	</body>
<style>
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
</div>
<?php } ?>
</html>
