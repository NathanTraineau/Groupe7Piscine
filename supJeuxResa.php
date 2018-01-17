<?php
$servername = "localhost";
$username= "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];

$NumReservation=$_POST['NumReservation'];
$NumJeux=$_POST['jeuxID'];


$con = mysqli_connect($servername, $username, $password, $dbname);


//VERIFICATION CONNEXION
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//DELETE FUNCTION
mysqli_query($con,'DELETE FROM concerner WHERE NumJeux= \''.$NumJeux.'\' and NumReservation = \''.$NumReservation.'\'' );
mysqli_close($con);
?>
	<html>
		<form name="envoie" method="POST" action="InfoReservation.php">
							
                            <input type="hidden" name="infoID" value="<?php echo $_POST['infoID'] ; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
        </form>
        <script type="text/javascript"> document.envoie.submit();</script>
		
</html>