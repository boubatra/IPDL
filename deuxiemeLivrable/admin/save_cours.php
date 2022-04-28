 <?php
include 'db.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$nom=$_POST['nom'];
		$ID_prof=$_POST['ID_prof'];
		$date=$_POST['date'];
		$heure_debut=$_POST['heure_debut'];
		$heure_fin=$_POST['heure_fin'];
		$statut=$_POST['statut'];
		$volumeHoraire=$_POST['volumeHoraire'];
		$volumeHoraireRestant=$_POST['volumeHoraireRestant'];
		$sql = "INSERT INTO `cours`( `nom`, `ID_prof`,`date`,`heure_debut`,`heure_fin`,`statut`,`volumeHoraire`,`volumeHoraireRestant`) 
		VALUES ('$nom','$ID_prof','$date','$heure_debut','$heure_fin','$statut',$volumeHoraire,$volumeHoraireRestant)";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$nom=$_POST['nom'];
		$ID_prof=$_POST['ID_prof'];
		$date=$_POST['date'];
		$heure_debut=$_POST['heure_debut'];
		$heure_fin=$_POST['heure_fin'];
		$statut=$_POST['statut'];
		$volumeHoraire=$_POST['volumeHoraire'];
		$volumeHoraireRestant=$_POST['volumeHoraireRestant'];
		$sql = "UPDATE `cours` SET `nom`='$nom',`ID_prof`='$ID_prof',`date`='$date',`heure_debut`='$heure_debut',`heure_fin`='$heure_fin',`statut`='$statut',`volumeHoraire`='$volumeHoraire' ,`volumeHoraireRestant`='$volumeHoraireRestant'  WHERE ID_cours=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `cours` WHERE ID_cours=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM 'cours' WHERE ID_cours in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>