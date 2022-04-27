 <?php
include 'db.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$nom=$_POST['nom'];
		$email=$_POST['email'];
		$prenom=$_POST['prenom'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$profile=$_POST['profile'];
		$sql = "INSERT INTO `utilisateur`( `nom`, `email`,`prenom`,`username`,`password`,`profile`) 
		VALUES ('$nom','$email','$prenom','$username','$password','$profile')";
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
		$email=$_POST['email'];
		$prenom=$_POST['prenom'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$profile=$_POST['profile'];
		$sql = "UPDATE `utilisateur` SET `nom`='$nom',`email`='$email',`prenom`='$prenom',`username`='$username',`password`='$password',`profile`='$profile' WHERE ID_user=$id";
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
		$sql = "DELETE FROM `utilisateur` WHERE ID_user=$id ";
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
		$sql = "DELETE FROM 'utilisateur' WHERE ID_user in ($id)";
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