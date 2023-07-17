<?php 
    session_start();
    if(isset($_SESSION['INPE'])){
        $nom=$_SESSION['Nom'];
        $prenom=$_SESSION['Prenom'];
    }
    else{
        header("location:login.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin </title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <style>
        body{
            background-image: url(img2.jpg);
        }
    </style>
</head>

<body id="reportsPage">
   
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">
                        <i class="fas fa-3x fas fas fas fa-heartbeat tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">DMSante</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link " href="index.php">Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="Patient.html" id="navbarDropdown" role="button" data-toggle="dropdown"     aria-haspopup="true"
                                    aria-expanded="false">
                                    Patients
                                
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="Patient.php">Dossier des Patients</a>
                                    <a class="dropdown-item" href="AjouterPatient2.php">Ajouter un Patient</a>
                                
                                    <a class="dropdown-item" href="Medicaments.php">Médicaments</a>
                                    <a class="dropdown-item" href="ListeMaladie.php">Maladies</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="medecin.php">Medecins</a>
                            </li>
                            
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="far fa-user mr-2 tm-logout-icon"></i>
                                    <?php echo"".$nom." ".$prenom ?>
                                </a>
                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="profile.php">Profil</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                        </ul>
                    </div>
                </nav>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">

            <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="tm-block-title d-inline-block">Maladies Frequentes au Maroc</h2>

                            </div>
                            <!-- a ajouter le liens des maladies existants en patients de la abse de donnée -->
                            <div class="col-4 text-right">
                                <a href="products.html" class="tm-link-black">View All</a>
                            </div>

                        </div>
                        <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-small">
                            <li class="tm-list-group-item">
                                La Grippe
                            </li>
                            <li class="tm-list-group-item">
                                L'angine à streptocoques
                            </li>
                            <li class="tm-list-group-item">
                                La varicelle
                            </li>
                            <li class="tm-list-group-item">
                                La mononucléose
                            </li>
                            <li class="tm-list-group-item">
                                Le cytomégalovirus
                            </li>
                            
                        </ol>
                    </div>
                </div>
                
                <!-- chart pour classifier la grippe avec els tranches d'ages -->
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Grippe en fonction d'age</h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <!-- PIE grippe selon le sexe -->
                <div class="tm-col tm-col-small">
                    <div class="bg-white tm-block h-100">
                   
                        <canvas id="pieChart" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
                <!-- op des maladies au monde -->
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="tm-block-title d-inline-block">Symptômes de la grippe</h2>

                            </div>
                            
                        </div>
                        <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                            <li class="tm-list-group-item">
                                Fièvre soudaine, soit : entre 38 °C et 40 °C 
                            </li>
                            <li class="tm-list-group-item">
                                Toux soudaine
                            </li>
                            <li class="tm-list-group-item">
                                Mal de gorge
                            </li>
                            <li class="tm-list-group-item">
                                Douleurs musculaires ou articulaires
                            </li>
                            <li class="tm-list-group-item">
                                Maux de tête
                            </li>
                            <li class="tm-list-group-item">
                                Fatigue extrême
                            </li>
                            
                        </ol>
                    </div>
                </div>
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Calendar</h2>
                        <div id="calendar"></div>
                        <div class="row mt-4">
                            <div class="col-12 text-right">
                                <a href="#" class="tm-link-black">View Schedules</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tm-col tm-col-small">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Taches prévues</h2>
                        <ol class="tm-list-group">
                            <li class="tm-list-group-item">Séminaire Le : 01/07/2023</li>
                            <li class="tm-list-group-item">Cour en Faculté :Le 05/07/2023</li>
                            <li class="tm-list-group-item">Opération Le : 12/07/2023</li>
                            <li class="tm-list-group-item">Séminaire Le : 17/07/2023</li>
                            
                            <!--<li class="tm-list-group-item">Call customers</li>
                            <li class="tm-list-group-item">Go to meeting</li>
                            <li class="tm-list-group-item">Weekly plan</li>
                            <li class="tm-list-group-item">Ask for feedback</li>
                            
                            <li class="tm-list-group-item">Meet Supervisor</li>
                            <li class="tm-list-group-item">Company trip</li>-->
                        </ol>
                    </div>
                </div>
            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018 Admin Dashboard . Created by
                        <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/utils.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/fullcalendar.min.js"></script>
    <!-- https://fullcalendar.io/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            updateChartOptions();
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart
            drawCalendar(); // Calendar

            $(window).resize(function () {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
    </script>
</body>
</html>