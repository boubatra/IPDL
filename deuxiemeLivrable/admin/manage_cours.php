<?php
session_start();
require('../config.php');
include 'db.php';

if (isset($_SESSION['username'])){
    $username =$_SESSION['username'];
    

    
    
    $query = "SELECT prenom,nom,email FROM utilisateur WHERE username='$username' ";
  
    $result = $conn->query($query);
    
    while($row = $result->fetch_assoc()) {
    $prenom= $row["prenom"];
    $nom=$row["nom"] ;
    $email=$row["email"] ;
    }


}
else{
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" >
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" >
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" >
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax_cour.js"></script>

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" >

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" >
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" >
    <link href="../vendor/wow/animate.css" rel="stylesheet" >
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" >
    <link href="../vendor/slick/slick.css" rel="stylesheet" >
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" >
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" >

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="../images/icon/logo-esp.jpg" alt="" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                                
                         <li> 
                             <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                              
                        
                        
                       
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        
                        <li> 
                             <a href="manage.php">
                                <i class="fas fa-user"></i>Manage users</a>
                        </li>

                        <li> 
                             <a href="manage_cours.php">
                                <i class="fas fa-book"></i>Manage course</a>
                        </li>
                        
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../images/icon/logo-esp.png" alt="" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                         <li> 
                             <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

                       
                        
                        
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>

                        <li> 
                             <a href="manage.php">
                                <i class="fas fa-user"></i>Manage users</a>
                        </li>

                        <li> 
                             <a href="manage_cours.php">
                                <i class="fas fa-book"></i>Manage course</a>
                        </li>
                        
                       
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                             
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../images/icon/images.png" alt="#" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"> 
                                                               <?php
                                                                
                                                                echo $prenom." ".$nom;
                                                                
                                                                ?>
                                                                    
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../images/icon/images.png" alt="#" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">
                                                            <?php
                                                                
                                                                echo $prenom." ".$nom;
                                                                
                                                                ?>
                                                                
                                                        </a>
                                                    </h5>
                                                    <span class="email">
                                                        <?php
                                                                
                                                                echo $email ;
                                                                
                                                                ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                               
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                
                        
                       
            <div class="user-css">
                  <div class="container">
    <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Courses</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">add</i> <span>Add New Courses</span></a>
                        <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">delete</i> <span>Delete</span></a>                      
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>ID_prof</th>
                        <th>Date</th>
                        <th>Heure_debut</th>
                        <th>Heure_fin</th>
                        <th>Statut</th>
                        <th>volumeHoraire</th>
                        <th>volumeHoraireRestant</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                $result = mysqli_query($conn,"SELECT * FROM cours");
                    $i=1;
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr id="<?php echo $row["ID_cours"]; ?>">
                <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["ID_cours"]; ?>">
                                <label for="checkbox2"></label>
                            </span>
                        </td>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["nom"]; ?></td>
                    <td><?php echo $row["ID_prof"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td><?php echo $row["heure_debut"]; ?></td>
                    <td><?php echo $row["heure_fin"]; ?></td>
                    <td><?php echo $row["statut"]; ?></td>
                    <td><?php echo $row["volumeHoraire"]; ?></td>
                    <td><?php echo $row["volumeHoraireRestant"]; ?></td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="material-icons update" data-toggle="tooltip" 
                            data-id="<?php echo $row["ID_cours"]; ?>"
                            data-nom="<?php echo $row["nom"]; ?>"
                            data-ID_prof="<?php echo $row["ID_prof"]; ?>"
                            data-date="<?php echo $row["date"]; ?>"
                            data-heure_debut="<?php echo $row["heure_debut"]; ?>"
                            data-heure_fin="<?php echo $row["heure_fin"]; ?>"
                            data-statut="<?php echo $row["statut"]; ?>"
                            data-volumeHoraire="<?php echo $row["volumeHoraire"]; ?>"
                            data-volumeHoraireRestant="<?php echo $row["volumeHoraireRestant"]; ?>"
                            title="Edit">edit</i>
                        </a>
                        <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["ID_cours"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
                         title="Delete">delete</i></a>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>
                </tbody>
            </table>
            
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Add Course</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ID_prof</label>
                            <input type="number" id="ID_prof" name="ID_prof" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>date</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>heure_debut</label>
                            <input type="time" id="heure_debut" name="heure_debut" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>heure_fin</label>
                            <input type="time" id="heure_fin" name="heure_fin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>statut</label>
                            <input type="number" id="statut" name="statut" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label>volumeHoraire</label>
                            <input type="number" id="volumeHoraire" name="volumeHoraire" class="form-control" required>
                        </div>    
                        <div class="form-group">
                            <label>volumeHoraireRestant</label>
                            <input type="number" id="volumeHoraireRestant" name="volumeHoraireRestant" class="form-control" required>
                        </div>               
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" id="btn-add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit course</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_u" name="id" class="form-control" required>                 
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" id="nom_u" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ID_prof</label>
                            <input type="number" id="ID_prof_u" name="ID_prof" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>date</label>
                            <input type="date" id="date_u" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>heure_debut</label>
                            <input type="time" id="heure_debut_u" name="heure_debut" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>heure_fin</label>
                            <input type="time" id="heure_fin_u" name="heure_fin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>statut</label>
                            <input type="number" id="statut_u" name="statut" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label>volumeHoraire</label>
                            <input type="number" id="volumeHoraire_u" name="volumeHoraire" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label>volumeHoraireRestant</label>
                            <input type="number" id="volumeHoraireRestant_u" name="volumeHoraireRestant" class="form-control" required>
                        </div>          
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-info" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                        
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete course  </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id" class="form-control">                  
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-danger" id="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>     
    </div>     

                         
                    
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2022 ESP. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->
