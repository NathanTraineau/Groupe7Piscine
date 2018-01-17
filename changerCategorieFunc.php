<?php


// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];

$categorie = $_POST['infoID'];
// echo $editeur;
$num=$_POST['CodeCategorie'];

$sql = "UPDATE `jeux` SET CodeCategorie='".$num."' WHERE CodeCategorie='".$categorie."'";


if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

// $conn->close();
?>
<html>
		<script type="text/javascript">location.href = 'jeux.php';</script>
</html>