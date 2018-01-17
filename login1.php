<html>

	<head>
	<title>Login</title>

	</head>
	<body>

	<?php

	// Check if username and password are correct
	if ($_POST["nom"] == "festival" && $_POST["pass"] == "festival") {

	// If correct, we set the session to YES
	  session_start();
	  $_SESSION["Login"] = "YES";

	  header("Location: acceuil.php");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
$annee = $_POST['Annee'];

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
$sqlRemettre = "UPDATE `Festival` SET Courant = '0' ";
$sql = "UPDATE `Festival` SET Courant = '1' where AnneeFestival='".$annee."' ";

//$array=[];
//$stmt = $myPDO->prepare($sql);
// $stmt->execute($array) or die(print_r($stmt->errorInfo(), true));
$myPDO->query($sqlRemettre);
//verification connexion base de donnes
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

// $conn->close();

	}
	else {

	// If not correct, we set the session to NO
	  $_SESSION["Login"] = "NO";
	  echo "<h1>L’identifiant et/ou le mot de passe que vous avez entré sont invalides, veuillez réessayer.</h1>";
	 
	}
	
	?>

	</body>
	</html>


	