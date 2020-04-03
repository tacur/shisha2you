<?php
$db = mysqli_connect("localhost", "salias", "bxPJgr6km4mx", "shisha2you_bestellungen");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
?>