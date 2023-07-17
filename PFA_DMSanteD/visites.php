<?php
session_start();
$IDP=$_GET['IDP'];
include("conexionDB.php");

if(isset($_SESSION['INPE'])){
    $nom=$_SESSION['Nom'];
    $prenom=$_SESSION['Prenom'];
    
    
    if(isset($_GET['IDP'])){
        $IDP=$_GET['IDP'];
    

        $query="Select * From Patient where IDP='$IDP'";
        $data=$conn->query($query);
        $data=$data->fetchall();
        foreach ($data as $row) {
                            $IDP=$row['IDP'];$NomP=$row['NomP'];  
                            $CINP=$row["CINP"];$PrenomP=$row['PrenomP'];
                            $DNP=$row["DateNaissanceP"];
                            $TlfnP=$row['TelephoneP'];$TlfnP2=$row['TelephoneSecoursP'];
                            $MailP=$row['MailP'];$AdresseP=$row['AdresseP'];$ProfessionP=$row['ProfessionP'];
                            $SexeP=$row['SexeP'];$PoidsP=$row['PoidsP'];$TypeSanguinP=$row['TypeSanguinP'];
                            $VaccinP=$row['VaccinP'];$DoseVaccinP=$row['DoseVaccinP'];
                            $DiabeteP=$row['DiabeteP'];$TypeDiabeteP=$row['TypeDiabeteP'];
                        }

        

        }

        else{
            header("location:Patient.php");
        }
        
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
    <title>Dossier Medical -- Visites</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Visites </title>
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
                                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
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
                <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12">
                    <div class="bg-white tm-block">
                        <form action="" class="tm-edit-product-form">
                        <div class="row">
                            <div class="col-12">
                                <center>
                                    <h2 class="tm-block-title d-inline-block">Informations du Patient <b><?=$NomP?> <?=$PrenomP?></b></h2>
                                </center>
                            </div>
                        </div>
                        
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                  <a class="nav-link " aria-current="page" href="DossierMedical.php?IDP=<?=$IDP?>">Informations</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link " href="antecedents.php?IDP=<?=$IDP?>">Antécédents</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" href="visites.php?IDP=<?=$IDP?>">Visites </a>
                                </li>
                              </ul>
                        </div>
                        <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Consultation</h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    <th scope='col'>Medecin </th>
                                    <th scope='col'>Spécialité </th>
                                    <th scope='col'>Date </th>
                                    <th scope='col'>Détails </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
    
                                <?php
                        

                                    $query2="SELECT * from Consultation C
                                            inner join medecin M on M.INPE=C.INPE
                                            inner join patient P on P.IDP=C.IDP
                                            where P.IDP = '$IDP'
                                            ";
                                    $data2=$conn->query($query2);
                                    $data2=$data2->fetchAll();
                                    foreach ($data2 as $row){
                                        $Nom=$row['NomMedecin'];$Prenom=$row['PrenomMedecin'];$Specialite=$row['Specialite'];
                                        $DateC=$row['DateC'];$DetailsC=$row['DetailsC'];
                        
                                    echo "

                            
                                    <tr>
                                    <td>$Nom $Prenom</td><td>$Specialite</td><td>$DateC</td><td>$DetailsC</td>
                                    </tr>   ";
                                        
                                    }
                               
                                
                            ?>
                            </tbody>
                          
                            </table>
                            </div>





                            <!-- tableau Ordonance-->

                            <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Ordonances</h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    
                                    <th scope='col'>Nom Medecin </th>
                                    <th scope='col'>Date Ordonance </th>
                                    <th scope='col'>Observation </th>
                                </tr>
                            </thead>
                            <tbody>
                                
    
                                <?php
                        

                                    $query2="SELECT * from ordonance O
                                            inner join medecin_patient_ordonance MPO on MPO.IDOR=O.IDOR
                                            inner join patient P on P.IDP=MPO.IDP
                                            inner join medecin M on M.INPE=MPO.INPE
                                            where P.IDP = '$IDP'
                                            ";
                                    $data2=$conn->query($query2);
                                    $data2=$data2->fetchAll();
                                    foreach ($data2 as $row){
                                        $Nom=$row['NomMedecin'];$Prenom=$row['PrenomMedecin'];
                                        $DateOR=$row['DateOR'];$ObservationOR=$row['ObservationOR'];
                                        
                        
                                    echo "

                            
                                    <tr>
                                    <td>$Nom $Prenom</td><td>$DateOR</td><td>$ObservationOR</td>
                                    </tr>   ";
                                        
                                    }
                               
                                
                            ?>
                            </tbody>
                          
                            </table>
                            </div>


                            <!-- Tableau Analyses -->

                            <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Analyses<h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    
                                    <th scope='col'>Libelle Analyse </th>
                                    <th scope='col'>Date Analyse </th>
                                    <th scope='col'>Observations </th>
                                    <th scope='col'>Image de l'analyse </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
    
                                <?php
                        
                                    

                        

                       
                        
                        // Exécuter une requête SELECT pour récupérer l'image
                        $conn=	$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                       

                        $query="SELECT * From analyses A
                        inner join patient P on A.IDP=P.IDP
                        WHERE P.IDP ='$IDP'
                        and TypeAnalyse='Analyse' ";
                        $data2=$conn->query($query);
                        $data2=$data2->fetchAll();
                        foreach ($data2 as $row){
                            $LibelleAnalyse=$row['LibelleAnalyse'];
                            $DateAnalyse=$row['DateAnalyse'];$ObservationAnalyse=$row['ObservationAnalyse'];
                            $imageData = $row['ImgAnalyse'];
                            $tempFilename = 'pictures/temporaire' . uniqid() . '.jpg';
                            file_put_contents($tempFilename, $imageData);
                            
            
                        echo "

                
                        <tr>
                        <td>$LibelleAnalyse</td> <td>$DateAnalyse</td><td>$ObservationAnalyse</td><td><a href='$tempFilename'>Analyse</a></td>
                        </tr>   ";
                            
                        }
                            ?>
                            </tbody>
                          
                            </table>
                            </div>

                            <!-- Tableau Radiologies -->
                            <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Radiologies<h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    
                                    <th scope='col'>Libelle Radiologie </th>
                                    <th scope='col'>Date Radiologie </th>
                                    <th scope='col'>Observations </th>
                                    <th scope='col'>Image du Radiologie </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
    
                                <?php
                        
                                    

                        

                       
                        
                        // Exécuter une requête SELECT pour récupérer l'image
                        $conn=	$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                       

                        $query="SELECT * From analyses A
                        inner join patient P on A.IDP=P.IDP
                        WHERE P.IDP ='$IDP'
                        and TypeAnalyse='Radiologie' ";
                        $data2=$conn->query($query);
                        $data2=$data2->fetchAll();
                        foreach ($data2 as $row){
                            $LibelleAnalyse=$row['LibelleAnalyse'];
                            $DateAnalyse=$row['DateAnalyse'];$ObservationAnalyse=$row['ObservationAnalyse'];
                            $imageData = $row['ImgAnalyse'];
                            $tempFilename = 'pictures/temporaire' . uniqid() . '.jpg';
                            file_put_contents($tempFilename, $imageData);
                            
            
                        echo "

                
                        <tr>
                        <td>$LibelleAnalyse</td> <td>$DateAnalyse</td><td>$ObservationAnalyse</td><td><a href='$tempFilename'>Radiologie</a></td>
                        </tr>   ";
                            
                        }
                            ?>
                            </tbody>
                          
                            </table>
                            </div>


                            </div>
            <footer class="row tm-mt-small">
                
            </footer>
        
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
    
</body>
</html>
</body>
</html>

