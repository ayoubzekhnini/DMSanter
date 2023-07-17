
<?php session_start();
$IDP="";

if(isset($_SESSION['INPE'])){
    $nom=$_SESSION['Nom'];
    $prenom=$_SESSION['Prenom'];
    if(isset($_GET['IDP'])){
        $IDP=$_GET['IDP'];
    }
    else{
        header("location:Patient.php");
    }
    
    
}
else{
    header("location:login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <style>
        body{
            background-image: url(img2.jpg);
        }
    </style>
</head>

<body class="">
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
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                        <center>
                            <h2 class="tm-block-title d-inline-block">Patients</h2>
                        </center>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                                 <a href="DossierMedical.php?IDP=<?=$IDP?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                   Dossier Medical du Patient
                                </button>
                            </a>
                            </div>
                        </div>

                        
                        <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                            <a href="Consultation.php?IDP=<?=$IDP?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Ajouter une Consultation
                                </button>
                                </a>
                            </div>
                        </div>




                        <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                            <a href="Medicaments.php">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Liste Medicaments
                                </button>
                                </a>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                            <a href="ordonance.php?IDP=<?=$IDP?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Ajouter Ordonnances
                                </button>
                                </a>
                            </div>
                        </div>



                        <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                            <a href="maladie.php?IDP=<?=$IDP?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Ajouter Maladie
                                </button>
                                </a>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                            <a href="operation.php?IDP=<?=$IDP?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Ajouter Operation
                                </button>
                                </a>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                            <a href="analyse.php?IDP=<?=$IDP?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Ajouter Analys&Radio
                                </button>
                                </a>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class=" col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0 text-center">
                            <a href="allergies.php?IDP=<?=$IDP?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Ajouter allergie
                                </button>
                            </a>
                            </div>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018 Admin Dashboard . Created by
                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
</body>

</html>