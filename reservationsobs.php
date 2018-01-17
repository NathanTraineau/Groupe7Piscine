<?php
	include 'inc/header.php'
?>
<html>


    <middle>
        
            <form action= "conexion2.php" method="POST" >
                   <legend>Editeur</legend>
                    <p>
                        <label for="NomEditeur">Nom de l'Editeur</label> : <input type="text" name="Nom de L'Editeur" id="NomEditeur" required  />
                    </p>

                    
                    <p>
                        <label for="Ville">Ville</label> : <input type="text" name="ville" id="ville" required/>

                    </p>
                    <p>
                        <label for="Rue">Rue</label> : <input type="text" name="Rue" id="rue" required/>

                    </p>
                    <p>
                        <label for="CodePostale">Code postale</label> : <input type="number" name="codeP" id="codepostale" required/>

                    </p>
                    
           
        </br>
            
            	<legend>Contact</legend>
            	<p>
                        <label for="NomResponsable">Nom du Responsable</label> : <input type="text" name="PrenomResp" id="NomResponsable" required/>

                </p>
                <p>
                        <label for="PrenomResponsable">Prenom du Responsable</label> : <input type="text" name="PrenomResp" id="PrenomResponsable" required/>

                </p>
                <p>
                        <label for="Tel">Telephone</label> : <input type="number" name="Tel" id="telephone" required/>

                    </p>
                <p>
                        <label for="Mail">Nom du Responsable</label> : <input type="text" name="Mail du responsable" id="MailResponsable" required/>

                </p>
                <input type="submit" value="Ajouter" id = "add" />
            </form>
            </br>
            
            
            
            
            <fieldset>
                <legend><input type="checkbox" name="SeDeplace" id="SeDeplace" /><label for="SeDeplace">Se déplace</label></legend>
            
            
            
            <label for="NbPersonnes">Nombre de Personnes </label> : <input type="number" min="0" name="Nombre de Personnes" id="NbPersonnes" /><br /><br />
            <input type="radio" name="Lieu" value="Airbnb" id="Airbnb" /><label for="Airbnb">Airbnb</label>&nbsp;
            <input type="radio" name="Lieu" value="Hotel" id="Hotel" /><label for="Hotel">Hotel</label>&nbsp;
            
            <label for="Autre">Autre</label> : <textarea name="Autre" id="Autre" rows="2" cols="45"></textarea><br /><br />
            </fieldset>
            
            <fieldset>
            <legend>Commentaires</legend>
            <label for="Commentaire"></label>  <br /><textarea name="Commentaire" id="Commentaire" rows="5" cols="45"></textarea>
            </fieldset>
            
            <br />
            <input type="submit" value="Ajouter" />

        </form>
	</middle>
</body>

	
</html>
