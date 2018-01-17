<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
$num = $_POST['ContactID'];
$nom = $_POST['NomContact'];
$prenom=$_POST['PrenomContact'];
$tel = $_POST['NumTelContact'];
$mail = $_POST['MailContact'];

// echo $num;
//echo $nom;
//echo $ville;
//echo $rue;
//echo $code;
// Check connection
// if ($myPDO->connect_error) {
//     die("Connection failed: " . $myPDO->connect_error);
// } 
//$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
//$sql = "INSERT INTO `editeur` SET VALUES (NULL, '$nom', '$ville', '$rue', '$code')";
// $sql = "SELECT * FROM `editeur`";
$sql = "UPDATE `contact` SET NomContact='".$nom."', PrenomContact='".$prenom."', NumTelContact='".$tel."', MailContact='".$mail."' WHERE NumContact='".$num."'";

//$array=[];
//$stmt = $myPDO->prepare($sql);
// $stmt->execute($array) or die(print_r($stmt->errorInfo(), true));

//verification connexion base de donnes
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

// $conn->close();
?>

<html>
<form name="envoie" method="POST" action="InfoEditeur.php">
	<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
</form>
	<script type="text/javascript"> document.envoie.submit();</script>
	<script type="text/javascript">location.href = 'editeur.php';</script>
	
</html>

</middle>
</body>
</html>