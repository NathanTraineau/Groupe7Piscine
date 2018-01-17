
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";


// $conn = new mysqli($servername, $username, $password, $dbname);
//$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
//$nom = $_POST['nomEditeur'];
$num = $_POST['ContactID'];

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);


//VERIFICATION CONNEXION
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//DELETE FUNCTION
mysqli_query($con,"DELETE FROM contact WHERE NumContact='".$num."'");
mysqli_close($con);
?>

<html>
		
<form name="envoie" method="POST" action="InfoEditeur.php">
	<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
</form>
	<script type="text/javascript"> document.envoie.submit();</script>
	<script type="text/javascript">location.href = 'InfoEditeur.php';</script>
	

</html>