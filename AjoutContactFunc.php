<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
try 
{
	$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : '. $e->getMessage());
}

$nomC = $_POST['NomContact'];
$prenomC =$_POST['PrenomContact'];
$numTelC = $_POST['NumTelContact'];
$mailC = $_POST['MailContact'];
// echo $num;

$IdEditeur = $_POST['infoID'];
$sql2 = "INSERT INTO `contact` VALUES (NULL, '$nomC', '$prenomC', '$numTelC', '$mailC', '$IdEditeur'  )";

if ($myPDO->query($sql2) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>";// . $conn->error;
}


// $conn->close();
?>

<html>
		
<form name="envoie" method="POST" action="InfoEditeur.php">
	<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
</form>
	<script type="text/javascript"> document.envoie.submit();</script>
	<script type="text/javascript">location.href = 'InfoEditeur.php';</script>
	

</html>