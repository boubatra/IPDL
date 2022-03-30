<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GESTION RESSOURCE DGI</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/styleCours.css">
</head>
<body>
	<?php
require('config.php');
session_start();

if (isset($_SESSION['username'])){
	$username =$_SESSION['username'];
	

	
	
    $query = "SELECT prenom,nom FROM utilisateur WHERE username='$username' ";
    $query2 = "SELECT volumeHoraire,volumeHoraireRestant FROM `cours`";
	$result = $conn->query($query);
	$result2 = $conn->query($query2);
	while($row = $result2->fetch_assoc()) {
    									$volumeHoraire=$row["volumeHoraire"] ;
    									$volumeHoraireRestant=$row["volumeHoraireRestant"] ;
					  					}

					  					
	
}
?>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Dashboard</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="" alt="Image" class="shadow">
						</div>
						<h4 class="text-center">
							
				   	<?php
					while($row = $result->fetch_assoc()) {
    				echo $row["prenom"]." ".$row["nom"] ;
  					}
					?>
				   </h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fa fa-user text-center mr-1"></i> 
							Cours
						</a>
						<a class="nav-link" id="pointage-tab" data-toggle="pill" href="#pointage" role="tab" aria-controls="pointage" aria-selected="false">
							<i class="fa fa-user text-center mr-1"></i> 
							Pointage
						</a>
						<a class="nav-link"  
					    href="logout.php">
							<i class=" text-center mr-1" ></i> 
							Deconnexion
						</a>
						
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Last Name</label>
								  	<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" class="form-control" value="">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Designation</label>
								  	<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								  	<label>Bio</label>
									<textarea class="form-control" rows="4"></textarea>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
					<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-4">COURS</h3>
						<div >
							
		<?php
$link = mysqli_connect("localhost", "root", "", "projet");
  
if($link === false){
    die("ERROR: Could not connect. " 
                . mysqli_connect_error());
}
  
$sql = "SELECT id,cour,classe FROM `cour`";
if($res = mysqli_query($link, $sql)){
    if(mysqli_num_rows($res) > 0){
        echo "<table border='1' cellspacing='5' cellpadding='5' width='100%'>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>cour</th>";
            echo "<th>classe</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($res)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>"."<a href='javascript:;' class='addAttr' data-toggle='modal' data-target='#addModal' data-id='1' data-name='cour' data-duration='255' data-cour='ipdl' >" . $row['cour'] ."</a>"."</td>";
                echo "<td>" . $row['classe'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($res);
    } else{
        echo "No matching records are found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. "
                                . mysqli_error($link);
}
mysqli_close($link);


?>

					</div>
					

						
					</div>




					<div class="tab-pane fade" id="pointage" role="tabpanel" aria-labelledby="pointage-tab">
						<h3 class="mb-4">Pointage</h3>
						<form  method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Volume horaire</label>
								  	<h2>
								  		<?php
										
    									echo $volumeHoraire ;
					  					
										?>
								  	</h2>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Volume restant</label>
								  	<h2>
								  		<?php
										
    									echo $volumeHoraireRestant ;
					  					
										?>
								  	</h2>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" formaction="Update.php">
	                         Pointer</button>
							<button class="btn btn-light" formaction="cancel.php">Cancel</button>
							</form>

						</div>
					</div>
					<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">

	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>