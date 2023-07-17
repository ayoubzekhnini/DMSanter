<?php 

    session_start();
    if(isset($_SESSION['INPE'])){
        $nom=$_SESSION['Nom'];
        $prenom=$_SESSION['Prenom'];
        $INPE=$_SESSION['INPE'];
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
    if(isset($_POST['submit'])){
       // $NomMedecin=$_POST['NomMedecin'];
        $NomPatient=$_POST['NomPatient'];

        $Allergie=$_POST['Allergie'];
        
        include("conexionDB.php");
        $query="INSERT INTO patient_allergie values ('$Allergie','$IDP')";
        $conn->exec($query);
        header("location:Patient.php");
    }
    
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Allergie</title>
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
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                        <center>
                            <h2 class="tm-block-title d-inline-block">Nouvelle Allergie</h2>
                        </center>
                        </div>
                    </div>

                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-10 col-lg-7 col-md-12">
                            <form action="#" class="tm-edit-product-form" method ="post">
                               

                            <div class="input-group mb-3">
                                    <label for="NomPatient" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom Patient :</label>
                                    
                                    <input id="NomPatient" name="NomPatient" type="text"  data-parsley-type="prenom" placeholder="Patient"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo"".$NomP." ".$PrenomP ?>" Disabled >
                            </div>


                            <div class="input-group mb-4">
                                    <label for="Allergie" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type Allergie :</label> 
                                    <!-- php pour selectionner les Allergies -->
                                    <select name="Allergie" id="Allergie" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                        <option value=""></option>
                                        <?php
                                              
                                              $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                                              $query = "Select * from allergies";
                                              $data=$conn->query($query);
                                              $data=$data->fetchall();
                                                foreach ($data as $row) {
                                                    $IDA=$row['IDA'];$TypeA=$row['TypeA'];
                                                    $DetailsA=$row['DetailsA'];
                                    
                                                    echo "
                                                    <option value ='$IDA'> $TypeA -- $DetailsA</option>


                                                    ";
                                                    }
                                         
                                        ?>
                                    </select>
                                
                                </div>

                                <div class="input-group mt-3">
                                    <button type="button" onclick="location.href='Patient.php'" class="btn btn-danger d-inline-block mx-auto">Annuler</button>
                                    <button type="submit" name="submit" class="btn btn-primary d-inline-block mx-auto">Ajouter</button>
                                        
                                </div>
                  
                            </form>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            
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