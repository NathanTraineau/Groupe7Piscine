
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";


// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
//$nom = $_POST['nomEditeur'];
$num = $_POST['jeuxID'];

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);


//VERIFICATION CONNEXION
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//DELETE FUNCTION
mysqli_query($con,"DELETE FROM jeux WHERE numJeux='".$num."'");
mysqli_close($con);
?>

<html>
		<script type="text/javascript">location.href = 'jeux.php';</script>
</html>