
<?php

$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');//connexion a la base de donnes

$num = $_POST['editeurID'];//recuperation avec Post


//VERIFICATION CONNECTION
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//DELETE FUNCTION
mysqli_query($con,"DELETE FROM editeur WHERE numEditeur='".$num."'");
mysqli_close($con);
?>