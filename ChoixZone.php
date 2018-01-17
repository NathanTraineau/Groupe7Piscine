
<?php
    include'inc/header.php';
?>
	<div class="container" >
	<h2> Voulez-vous ajouter une zone Editeur ? </h2>
<form action="ajoutZone.php" method="post">

<input type="radio" name="zoneED" value="oui" id="oui"  /> <label for="oui">Oui</label>
<input type="radio" name="zoneED" value="non" id="non" checked="checked"/> <label for="non">Non, une autre zone </label>
  <p>
 
<button class="button" type="submit" style="float:left;">Valider</button>
  </p>
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
</form>
</div>
</html>


