<?php 
    $NomP="";
    $PrenomP="";
    
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
    }
    else{
        header("location:login.php");
    }
    
    if(isset($_POST['submit'])){
        $dateOR=$_POST['DateOR'];
        $observationOR=$_POST['ObservationOR'];

        $query="INSERT INTO ordonance value('','$dateOR','$observationOR')";
        $conn->exec($query);

        $medicament=$_POST['Medicament'];
        $medicament2 =$_POST['Medicament2'];
        $medicament3=$_POST['Medicament3'];
        $medicament4=$_POST['Medicament4'];

        $query2="SELECT * FROM ordonance ORDER BY IDOR DESC LIMIT 1";
        $data2=$conn->query($query2);
        $data2=$data2->fetchAll();
        foreach ($data2 as $row) {
            $IDOR=$row['IDOR'];$DateOR=$row['DateOR'];$ObservationOR=$row['ObservationOR'];
         }


         if(!empty($medicament)){
         $query3="INSERT into medicament_ordonance values ('$IDOR','$medicament')";
         $conn->exec($query3);
        }

        if(!empty($medicament2)){
         $query4="INSERT into medicament_ordonance values ('$IDOR','$medicament2')";
         $conn->exec($query4);
        }

        if(!empty($medicament3)){
         $query5="INSERT into medicament_ordonance values ('$IDOR','$medicament3')";
         $conn->exec($query5);
        }

        if(!empty($medicament4)){
         $query6="INSERT into medicament_ordonance values ('$IDOR','$medicament4')";
         $conn->exec($query6);
        }



        $query7="INSERT into medecin_patient_ordonance values('$INPE','$IDP','$IDOR')";
        $conn->exec($query7);

        header("location:patient.php");
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouvelle ordonance</title>
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
                            <h2 class="tm-block-title d-inline-block">Nouvelle Ordonance</h2>
                        </center>
                        </div>
                    </div>

                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-10 col-lg-7 col-md-12">
                            <form action="#" class="tm-edit-product-form" method ="post">
                               

                            <div class="input-group mb-3">
                                    <label for="NomMedecin" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom Medecin:
                                    </label>
                                    <input id="NomMedecin" name="NomMedecin" type="text"  data-parsley-type="Nom" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo"".$nom. " ".$prenom?>" Disabled>
                            </div>


                            <div class="input-group mb-3">
                                    <label for="NomPatient" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom Patient :</label>
                                    
                                    <input id="NomPatient" name="NomPatient" type="text"  data-parsley-type="prenom" placeholder="Patient"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo"".$NomP." ".$PrenomP ?>"  >
                            </div>


                            <div class="input-group mb-4">
                                    <label for="Medicament" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Medicament 1 :</label> 
                                    <!-- php pour selectionner les leiux de travails -->
                                    <select name="Medicament" id="Medicament" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" >
                                        <option value=""></option>
                                        <?php
                                              
                                              $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                                              $query = "Select * from Medicament";
                                              $data=$conn->query($query);
                                              $data=$data->fetchall();
                                                foreach ($data as $row) {
                                                    $IDMedicament=$row['IDMedicament'];$LibelleMedicament=$row['LibelleMedicament'];
                                                    $ObservationMedicament=$row['ObservationMedicament'];
                                    
                                                    echo "
                                                    <option value ='$IDMedicament'> $LibelleMedicament -- $ObservationMedicament</option>


                                                    ";
                                                    }
                                         
                                        ?>
                                    </select>
                                
                                </div>



                                <!-- 2eme medicament -->

                                <div class="input-group mb-4">
                                    <label for="Medicament" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Medicament 2 :</label> 
                                    <!-- php pour selectionner les leiux de travails -->
                                    <select name="Medicament2" id="Medicament" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                    <option value=""></option>
                                        <?php
                                                foreach ($data as $row) {
                                                    $IDMedicament=$row['IDMedicament'];$LibelleMedicament=$row['LibelleMedicament'];
                                                    $ObservationMedicament=$row['ObservationMedicament'];
                                    
                                                    echo "
                                                    <option value ='$IDMedicament'> $LibelleMedicament -- $ObservationMedicament</option>


                                                    ";
                                                    }
                                         
                                        ?>
                                    </select>
                                
                                </div>


                                <!-- 3eme medicament -->




                                <div class="input-group mb-4">
                                    <label for="Medicament" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Medicament 3 :</label> 
                                    <!-- php pour selectionner les leiux de travails -->
                                    <select name="Medicament3" id="Medicament" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" >
                                    <option value=""></option>

                                        <?php
                                               
                                                foreach ($data as $row) {
                                                    $IDMedicament=$row['IDMedicament'];$LibelleMedicament=$row['LibelleMedicament'];
                                                    $ObservationMedicament=$row['ObservationMedicament'];
                                    
                                                    echo "
                                                    <option value ='$IDMedicament'> $LibelleMedicament -- $ObservationMedicament</option>


                                                    ";
                                                    }
                                         
                                        ?>
                                    </select>
                                
                                </div>


                                <div class="input-group mb-4">
                                    <label for="Medicament" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Medicament 4 :</label> 
                                    <!-- php pour selectionner les leiux de travails -->
                                    <select name="Medicament4" id="Medicament" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" >
                                    <option value=""></option>

                                        <?php
                                               
                                                foreach ($data as $row) {
                                                    $IDMedicament=$row['IDMedicament'];$LibelleMedicament=$row['LibelleMedicament'];
                                                    $ObservationMedicament=$row['ObservationMedicament'];
                                    
                                                    echo "
                                                    <option value ='$IDMedicament'> $LibelleMedicament -- $ObservationMedicament</option>


                                                    ";
                                                    }
                                         
                                        ?>
                                    </select>
                                
                                </div>





                                <div class="input-group mb-3">
                                    <label for="DateOR" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date :
                                    </label>
                                    <input id="DateOR" name="DateOR" type="date" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" data-large-mode="true" value="<?php echo date("Y-m-d");?>">
                                </div>


                                <div class="input-group mb-3">
                                    <label for="observationOR" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Observation : </label>
                                    <textarea name="ObservationOR" id="observationOR" class="form-control"></textarea>
                                    
                                </div>
                                
                                
                                <div class="input-group mt-3">
                                    <button type="button" onclick="location.href='Patient.php'" class="btn btn-danger d-inline-block mx-auto">Annuler</button>
                                    <button type="submit" name="submit" class="btn btn-primary d-inline-block mx-auto">Suivant</button>
                                        
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