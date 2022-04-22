<?php
session_start();
require('config.php');

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
    header('Location: login.php');
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
    <title>TABLE</title>

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

                                                echo $prenom . " " . $nom;

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

                                                            echo $prenom . " " . $nom;

                                                            ?>
                                                        </a>
                                                    </h5>
                                                    <span class="email">
                                                        <?php

                                                        echo $email;

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
                                echo    "<thead>";

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

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>




                                <?php
                                $link = mysqli_connect("localhost", "root", "", "ipdl");

                                if ($link === false) {
                                    die("ERROR: Could not connect. "
                                        . mysqli_connect_error());
                                }
                                $sql = "SELECT nom,date_debut,date_fin,statut,volumeHoraire,volumeHoraireRestant FROM `cours`";

                                if ($res = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($res) > 0) {

                                        echo                    "<div class='table-responsive table-responsive-data2'>";
                                        echo "<table class='table table-data2'>";
                                        echo    "<thead>";

                                        echo "<tr>";
                                        echo       "<th>";
                                        echo    "<label class='au-checkbox'>";
                                        echo  "<input type='checkbox'>";
                                        echo  "<span class='au-checkmark'></span>";
                                        echo  "</label>";
                                        echo   "</th>";

                                        echo "<th>nom</th>";
                                        echo "<th>date_debut</th>";
                                        echo "<th >date_fin</th>";
                                        echo "<th >volumeHoraire</th>";
                                        echo "<th >statut</th>";
                                        echo "<th >volumeHoraireRestant</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo                        "  <tr class='tr-shadow'>";
                                            echo                        "  <td>";
                                            echo                        "  <label class='au-checkbox'>";
                                            echo                        "<input type='checkbox'>";
                                            echo                        " <span class='au-checkmark'></span>";
                                            echo                        " </label>";
                                            echo                        "  </td>";
                                            echo "<td>" . $row['nom'] . "</td>";
                                            echo "<td>" . $row['date_debut'] . "</td>";
                                            echo "<td >" . $row['date_fin'] . "</td>";
                                            echo "<td >" . $row['volumeHoraire'] . "</td>";
                                            echo "<td >" . $row['statut'] . "</td>";
                                            echo "<td >" . $row['volumeHoraireRestant'] . "</td>";
                                            echo " <td>";
                                            echo " <div class='table-data-feature'>";
                                            echo " <button class='item' data-toggle='tooltip' data-placement='top' title='Send'>";
                                            echo "<i class='zmdi zmdi-mail-send'></i>";
                                            echo "</button>";
                                            echo " <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
                                            echo " <i class='zmdi zmdi-edit'></i>";
                                            echo "</button>";
                                            echo " <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>";
                                            echo " <i class='zmdi zmdi-delete'></i>";
                                            echo "</button>";
                                            echo " <button class='item' data-toggle='tooltip' data-placement='top' title='More'>";
                                            echo " <i class='zmdi zmdi-more'></i>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo                        "  </tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
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

                                <!-- END DATA TABLE -->
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