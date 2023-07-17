<?php session_start();
$CINP="";

if(isset($_SESSION['INPE'])){
    $nom=$_SESSION['Nom'];
    $prenom=$_SESSION['Prenom'];
    if(isset($_GET['IDP'])){
        $IDP=$_GET['IDP'];
        include("conexionDB.php");
        $query="Select * from Patient where IDP ='$IDP'";
        $data=$conn->query($query);
        $data=$data->fetchall();
        foreach ($data as $row) {

            $NomP=$row['NomP'];$PrenomP=$row['PrenomP'];$CINP=$row['CINP'];
 
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
    <title>Analyse & Radiologie</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
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
        <div class="row tm-content-row tm-mt-big">
            <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                <div class="bg-white tm-block h-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                        <center>
                            <h2 class="tm-block-title d-inline-block">Analyses & Radiologie</h2>
                        </center>
                    </div>
                </div>

                            <!-- formulaire -->
                            <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-10 col-lg-7 col-md-12">
                            <form action="analyse_v.php" class="tm-edit-product-form" method ="post" enctype="multipart/form-data">
                                
                            
                            <div class="input-group mb-3">
                                    <label for="NomPatient" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom Patient :</label>
                                    
                                    <input id="NomPatient" name="NomPatient" type="text"  data-parsley-type="prenom" placeholder="Patient"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo"".$NomP." ".$PrenomP ?>" Disabled >
                            </div>
                                    

                                <div class="input-group mb-4">
                                    <label for="typeA" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type :</label>
                                    <select name="typeA" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="typeA">
                                        <!--<option selected>Select one</option>-->
                                        <option value="Analyse">Analyse</option>
                                        <option value="Radiologie">Radiologie</option>
                                        
                                    </select>
                                </div>
                                               
                                 
                                    
                                <div class="input-group mb-4">
                                    <label for="Libelle" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Libelle Analyse :</label> 
                                    <!-- php pour selectionner les leiux de travails -->
                                    <input type="text" name="LibelleA" class="form-control"  id="Libelle" placeholder="Libelle">
                                </div>





                                <div class="input-group mb-4">
                                    <label for="DateAnalyse" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date de l'analyse:
                                    </label>
                                    <input id="DateAnalyse" name="DateAnalyse" type="date"  data-parsley-type="Date" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="" >
                                </div>


                                <div class=" input-group mb-4">
                                    <label for="image" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Image de l'analyse : </label>
                                    <input type="file" name="image" id="image" class=""  />
                                </div>
                                

                                <div class="input-group mb-3">
                                    <label for="observationAnalyse" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Observation : </label>
                                    
                                        <textarea name="Observation" id="observationAnalyse" class="form-control"></textarea>
                                    
                                </div>

                                <div class="input-group mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary d-inline-block mx-auto">Ajouter une Analyse</button>
                                </div>
                   
                            </form>
                    </div >
            </div>
        </div>
            
       </div>
        <footer class="row tm-mt-small">
           
           
        </footer>
    </div>
    



    <script src="js/jquery-3.3.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    
    
    
</body>

</html>