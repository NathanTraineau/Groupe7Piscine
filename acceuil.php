<?php
  include'inc/header.php';

  $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', ''); // la connexion a la base de donnes
   
  $sqltest = "SELECT * from Festival WHERE Courant='1'";// la selection des donnes de la base de donnes qui remplie la condition courant=1(de donnes caracteristique a l'annes pour lequel l'utilisateur est connecté)
  $test= $myPDO->query($sqltest); // on fait l'interrogation a la base de donnes
  $Festival= $test->fetch();// on sauvegarde dan $Festival l'array qui contient les donnes du festival 

?>

<!--#85e085-->
<!-- le style represent les differentes caracterstique qu'on a ameliore du point de vue visuel, comme les coleurs, le font du text etc.-->
<style> 
    body  {
        background-image: url("images/jeux.jpg");
        background-color: #cccccc;
        background-opacity: 1;

    .button {background-color: #555555;} /* Black */
    }

    h2 {
    color:   #000000;
    font-style: oblique;
    }

.button {
    background-color: #000000; /* Green */
    border: none;
    color: white;
    padding: 10px 15px;
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
    border: 2px solid #000000;
}

.button:hover {
    background-color: #000000;
    color: white;
}

</style>
<!--element du boostrp utilise pour centree l'affichage en page-->
<div class="container" align="center"> 
</br>
</br>
</br>
  <!-- l'affichage des elementes selectiones-->
  <h2>Année du festival: <?php echo $Festival['AnneeFestival'] ?></h3>
  <h2>Date du festival: <?php echo $Festival['DateFestival'] ?></h3>
  <h2>Nombre de tables du festival: <?php echo $Festival['NombreTables']?></h3>
  <h2>Prix standard par table du festival: <?php echo $Festival['PrixPlaceStandard'] ?></h3>

  <form action= "AjoutFestival.php" method="POST" >
    <button class="button" type="submit">Ajouter un Festival</button> <!-- buton qui renvoie a la page AjoutFestival.php-->
  </form>

</div>
</body>
</html> 
