<?php
$db = mysqli_connect("localhost", "salia", "bxPJgr6km4mx", "shisha2you_bestellungen");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

$sql = "SELECT Bestellung, Datum FROM Bestellungen";
 
$db_erg = mysqli_query( $db, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}

?>

<?php while($row = $db_erg->fetch_assoc()) {
	echo "Bestellung" . $row["bestellung"]. "/ Datum: " . $row["Datum"] . "/ Index: "
	. $row["Index"]. "";
	}?>