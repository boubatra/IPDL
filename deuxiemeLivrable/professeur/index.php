<?php
session_start();
require('../config.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];




    $query = "SELECT prenom,nom,email FROM utilisateur WHERE username='$username' ";

    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $email = $row["email"];
    }
} else {
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
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    
    <style type="text/css">
        div.main-content {
            background-color: #ee5522;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='100' y1='33' x2='100' y2='-3'%3E%3Cstop offset='0' stop-color='%23000' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23000' stop-opacity='1'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='100' y1='135' x2='100' y2='97'%3E%3Cstop offset='0' stop-color='%23000' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23000' stop-opacity='1'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill='%23d23d09' fill-opacity='0.6'%3E%3Crect x='100' width='100' height='100'/%3E%3Crect y='100' width='100' height='100'/%3E%3C/g%3E%3Cg fill-opacity='0.5'%3E%3Cpolygon fill='url(%23a)' points='100 30 0 0 200 0'/%3E%3Cpolygon fill='url(%23b)' points='100 100 0 130 0 100 200 100 200 130'/%3E%3C/g%3E%3C/svg%3E");
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo-esp.jpg" alt="" />
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
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>

                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
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
                    <img src="images/icon/logo-esp.jpg" alt="" />
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
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>

                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
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
                                            <img src="images/icon/images.png" alt="#" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                <?php

                                                echo $_SESSION['username'];

                                                ?>

                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/images.png" alt="#" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">
                                                            <?php

                                                            echo "Prenom: " . $prenom;
                                                            echo "<br>";
                                                            echo "Nom: " . $nom;

                                                            ?>

                                                        </a>

                                                    </h5>
                                                    <span class="email">
                                                        <?php

                                                        echo "email : " . $email;

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
                                                <a href="logout.php">
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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">


                        </div>
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "ipdl");

                        if ($link === false) {
                            die("ERROR: Could not connect. "
                                . mysqli_connect_error());
                        }
                        $sql = "SELECT ID_cours,nom,date_debut,date_fin,volumeHoraire,volumeHoraireRestant FROM `cours`";

                        if ($res = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($res) > 0) {
                                echo                    "<div class='row'>";
                                echo                    "<div class='col-lg-9'>";
                                echo                    "<h2 class='title-1 m-b-25'>COURS</h2>";
                                echo                    "<div class='table-responsive table--no-card m-b-40'>";
                                echo "<table class='table table-borderless table-striped table-earning'>";
                                echo                     "<thead>";

                                echo "<tr>";
                                echo "<th>ID_cours</th>";
                                echo "<th>nom</th>";
                                echo "<th>date_debut</th>";
                                echo "<th class='text-right'>date_fin</th>";
                                echo "<th class='text-right'>volumeHoraire</th>";
                                echo "<th class='text-right'>volumeHoraireRestant</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['ID_cours'] . "</td>";
                                    echo "<td>" . $row['nom'] . "</td>";
                                    echo "<td>" . $row['date_debut'] . "</td>";
                                    echo "<td class='text-right'>" . $row['date_fin'] . "</td>";
                                    echo "<td class='text-right'>" . $row['volumeHoraire'] . "</td>";
                                    echo "<td class='text-right'>" . $row['volumeHoraireRestant'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                mysqli_free_result($res);
                            } else {
                                echo "No matching records are found.";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. "
                                . mysqli_error($link);
                        }
                        mysqli_close($link);


                        ?>


                        <div class="row-lg-15">
                            <!-- <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>26 April, 2018</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p>Tasks for #</p>
                                        </div>
                                        <div class="au-task-list js-scrollbar3">
                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                                    </h5>
                                                    <span class="time">10:00 AM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--warning">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Create new task for Dashboard</a>
                                                    </h5>
                                                    <span class="time">11:00 AM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--primary">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                                    </h5>
                                                    <span class="time">02:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--success">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Create new task for Dashboard</a>
                                                    </h5>
                                                    <span class="time">03:30 PM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--danger js-load-item">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                                    </h5>
                                                    <span class="time">10:00 AM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--warning js-load-item">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Create new task for Dashboard</a>
                                                    </h5>
                                                    <span class="time">11:00 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <div class="row-lg-15">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Pointage</strong>
                                        </div>
                                        <div class="card-body card-block ">
                                            <form action="ajouterCours.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Heure</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="Heure" id="heure">
                                                            <option value="8">8h-10h</option>
                                                            <option value="10">10h-12h</option>
                                                            <option value="14">14h30-16h30</option>
                                                            <option value="16">16h30-18h30</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Date</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="date" id="text-input" name="date" placeholder="Date" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row form-group">

                                                    <label for="Pointage"></label>
                                                    <select class="custom-select" name="cours" id="cours">
                                                        <option selected>Matiere</option>
                                                        <?php
                                                        $sql = "SELECT ID_cours,nom,date_debut,date_fin,volumeHoraire,volumeHoraireRestant FROM `cours`";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='" . $row['ID_cours'] . "'>" . $row['nom'] . "</option>";
                                                            }
                                                        }

                                                        ?>

                                                    </select>

                                                    <?php
                                                    $sql = "SELECT ID_cours,nom,volumeHoraire,volumeHoraireRestant FROM `cours`";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        echo "<input type='hidden' name='id_cours' value='" . $row['ID_cours'] . "'>";

                                                            if ($row['volumeHoraireRestant'] > 0) {
                                                                 $row['volumeHoraireRestant'] = $row['volumeHoraireRestant'] - 2;
                                                                $sql = "UPDATE `cours` SET `volumeHoraireRestant`= '" . $row['volumeHoraireRestant'] . "' WHERE `ID_cours` = '" . $row['ID_cours'] . "'";
                                                                $conn->query($sql);
                                                            }
                                                            else {
                                                                echo "Le cours de" . $row['nom'] . "est termine";
                                                            }
                                                        
                                                    } ?>

                                                </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="b" class="btn btn-primary btn-sm">

                                                <i class="fa fa-dot-circle-o"></i> Pointer
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                            <input type="text" value="<php echo $row['volumeHoraireRestant'] ?>" name="pointage" readonly="readonly"> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="copyright">
                                                    <p>Copyright © 2022 ESP. All rights reserved.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MAIN CONTENT-->
                                <!-- END PAGE CONTAINER-->
                            </div>

                        </div>

                        <!-- Jquery JS-->
                        <script src="vendor/jquery-3.2.1.min.js"></script>
                        <!-- Bootstrap JS-->
                        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
                        <!-- Vendor JS       -->
                        <script src="vendor/slick/slick.min.js">
                        </script>
                        <script src="vendor/wow/wow.min.js"></script>
                        <script src="vendor/animsition/animsition.min.js"></script>
                        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                        </script>
                        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
                        <script src="vendor/counter-up/jquery.counterup.min.js">
                        </script>
                        <script src="vendor/circle-progress/circle-progress.min.js"></script>
                        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
                        <script src="vendor/select2/select2.min.js">
                        </script>

                        <!-- Main JS-->
                        <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->