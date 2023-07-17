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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dossier medical -- Antécédents </title>
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
                                  <a class="nav-link active" href="antecedents.php?IDP=<?=$IDP?>">Antécédents</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="visites.php?IDP=<?=$IDP?>">Visites </a>
                                </li>
                              </ul>
                        </div>
                        <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Maladies</h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    <th scope='col'>Maladie </th>
                                    <th scope='col'>Observation </th>
                                    <th scope='col'>Date </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
    
                                <?php
                        

                                    $query2="SELECT * from patient_maladie PM
                                            inner join maladie M on M.IDMaladie=PM.IDMaladie
                                            inner join patient P on P.IDP=PM.IDP
                                            where P.IDP = '$IDP'
                                            ";
                                    $data2=$conn->query($query2);
                                    $data2=$data2->fetchAll();
                                    foreach ($data2 as $row){
                                        $LibelleMaladie=$row['LibelleMaladie'];$DateMaladie=$row['DatePMA'];
                                        $ObservationM=$row['ObservationMaladie'];
                        
                                    echo "

                            
                                    <tr>
                                    <td>$LibelleMaladie</td><td>$ObservationM</td><td>$DateMaladie</td>
                                    </tr>   ";
                                        
                                    }
                               
                                
                            ?>
                            </tbody>
                          
                            </table>
                            </div>





                            <!-- tableau Allergies-->

                            <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Allergies</h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    
                                    <th scope='col'>Type Allergie </th>
                                    <th scope='col'>Details Allergie </th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
    
                                <?php
                        

                                    $query2="SELECT * from allergies A
                                            inner join patient_allergie PA on A.IDA=PA.IDA
                                            inner join patient P on P.IDP=PA.IDP
                                            where P.IDP = '$IDP'
                                            ";
                                    $data2=$conn->query($query2);
                                    $data2=$data2->fetchAll();
                                    foreach ($data2 as $row){
                                        $TypeA=$row['TypeA'];$DetailsA=$row['DetailsA'];
                                        
                        
                                    echo "

                            
                                    <tr>
                                    <td>$TypeA</td><td>$DetailsA</td><td></td>
                                    </tr>   ";
                                        
                                    }
                               
                                
                            ?>
                            </tbody>
                          
                            </table>
                            </div>


                            <!-- Tableau Opérations -->

                            <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Opérations<h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    
                                    <th scope='col'>Libelle Opération </th>
                                    <th scope='col'>Organe Concerné </th>
                                    <th scope='col'>Date Opération </th>
                                    <th scope='col'>Détails Opération </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
    
                                <?php
                        

                                    $query2="SELECT * from operation O
                                            inner join patient P on P.IDP=O.IDP
                                            where P.IDP = '$IDP'
                                            ";
                                    $data2=$conn->query($query2);
                                    $data2=$data2->fetchAll();
                                    foreach ($data2 as $row){
                                        $LibelleOP=$row['LibelleOP'];$DetailsOP=$row['DetailsOP'];
                                        $DateOP=$row['DateOP'];$OrganeConcerne=$row['OrganeConcerne'];
                                        
                        
                                    echo "

                            
                                    <tr>
                                    <td>$LibelleOP</td><td>$OrganeConcerne</td><td>$DateOP</td><td>$DetailsOP</td>
                                    </tr>   ";
                                        
                                    }
                               
                                
                            ?>
                            </tbody>
                          
                            </table>
                            </div>

                            <!-- Tableau Medicament -->
                            <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                            <tr><td><h2>Médicaments</h2></td><td><td></td></td></tr>
                                <tr class='tm-bg-gray'>
                                    
                                    <th scope='col'>Libelle Médicament </th>
                                    <th scope='col'>Détails Médicament </th>
                                    <th scope='col'>Date Ordonance </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
    
                                <?php
                        

                                    $query2="SELECT * from medicament M
                                            inner join medicament_ordonance MO on MO.IDMedicament=M.IDMedicament
                                            inner join ordonance O on O.IDOR=MO.IDOR
                                            inner join medecin_patient_ordonance MPO on MPO.IDOR=O.IDOR
                                            inner join patient P on P.IDP=MPO.IDP 
                                            where P.IDP = '$IDP'
                                            ";
                                    $data2=$conn->query($query2);
                                    $data2=$data2->fetchAll();
                                    foreach ($data2 as $row){
                                        $LibelleMedicament=$row['LibelleMedicament'];$DetailsMedicaments=$row['ObservationMedicament'];
                                        $DateOR=$row['DateOR'];
                                        
                        
                                    echo "

                            
                                    <tr>
                                    <td>$LibelleMedicament</td><td>$DetailsMedicaments</td><td>$DateOR</td>
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


