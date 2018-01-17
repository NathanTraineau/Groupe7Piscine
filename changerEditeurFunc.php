<?php


// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];

$editeur = $_POST['infoID'];
// echo $editeur;
$num=$_POST['numEditeur'];

$sql = "UPDATE `jeux` SET numEditeur='".$num."' WHERE numEditeur='".$editeur."'";


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