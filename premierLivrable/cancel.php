	<?php
require('config.php');
$query = "update horaire set volumeRestant=volumeRestant+2  WHERE matiere='ipdl'";

	$result = $conn->query($query);
	header("Location: index.php");
	

?>