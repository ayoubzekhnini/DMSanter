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
    <title>Nouveau Patient</title>
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
                            <h2 class="tm-block-title d-inline-block">Ajouter Patients</h2>
                        </center>
                        </div>
                    </div>

                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="AjouterPatient_V.php" class="tm-edit-product-form" method ="post">
                                <div class="input-group mb-3">
                                    <label for="CIN" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">CIN :</label>
                                    <input id="CIN" name="CIN" type="text"  data-parsley-type="CIN" placeholder="CIN"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="Nom" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom :
                                    </label>
                                    <input id="Nom" name="Nom" type="text"  data-parsley-type="Nom" placeholder="Nom"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="prenom" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Prénom :
                                    </label>
                                    <input id="prenom" name="Prenom" type="text"  data-parsley-type="prenom" placeholder="Prénom"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="DateDeNaissance" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date 
                                        de naissance :
                                    </label>
                                    <input id="DateDeNaissance" name="DateNaissance" type="date" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                        data-large-mode="true">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="telephoneP" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Téléphone :
                                    </label>
                                    <input id="telephoneP" name="telephoneP" type="tel"  data-parsley-type="telephoneP" placeholder="Téléphone"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                
                                <!--<div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" rows="3" required></textarea>
                                </div>-->

                                <div class="input-group mb-3">
                                    <label for="Sexe" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Sexe :</label>
                                    <select name="Sexe" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="Sexe">
                                        <!--<option selected>Select one</option>-->
                                        <option value="Femme">FEMME</option>
                                        <option value="Homme">HOMME</option>
                                        
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="MailP" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mail :
                                    </label>
                                    <input id="MailP" name="MailP" type="Mail"  data-parsley-type="Mail" placeholder="Mail"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                              
                                
                                <div class="input-group mb-3">
                                    <label for="Profession"  class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Profession :
                                    </label>
                                    <input id="Profession" name="Profession" type="text" data-parsley-type="Profession" placeholder="Profession"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <!-- input pour Adresse-->
                                <div class="input-group mb-3">
                                    <label for="AdresseP" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Adresse :
                                    </label>
                                    <input id="AdresseP" name="AdresseP" type="text"  data-parsley-type="AdresseP" placeholder="Adresse"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <!-- tln de secours-->
                                <div class="input-group mb-3">
                                    <label for="Tlfn2" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Telepone de secours :
                                    </label>
                                    <input id="Tlfn2" name="Tlfn2" type="tel"  data-parsley-type="Tlfn2" placeholder="Telephone de secours"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>

                                <!-- input pour vaccin-->
                                <div class="input-group mb-3">
                                    <label for="VaccinP" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Votre Vaccin COVID :</label>
                                    <select name="VaccinP"  class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="VaccinP">
                                        <!--<option selected>Select one</option>-->
                                        <option  value="">--Non Vacciné--</option>
                                        <option value="Pfizer">Pfizer</option>
                                        <option value="Moderna">Moderna</option>
                                        <option value="AstraZeneca">AstraZeneca</option>
                                        <option value="Sinopharm">Sinopharm</option>
                                        <option value="Janssen">Janssen</option>
                                        <option value="Novavax">Novavax</option>
                                        
                                    </select>
                                </div>

                                <!-- input nombre de doses-->
                                <div class="input-group mb-3">
                                    <label for="DoseVaccinP" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nombre de doses :</label>
                                    <select name="DoseVaccinP"  class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="DoseVaccinP">
                                        <!--<option selected>Select one</option>-->
                                        
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                       
                                        
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="Poids" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Poids :
                                    </label>
                                    <input id="Poids" name="Poids" type="text"  data-parsley-type="Poids " placeholder="Poids en Kg"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="GS" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Groupe sanguins :</label>
                                    <select Name="GS" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="GS">
                                        <!--<option selected>Select one</option>-->
                                        <option value="O-">O-</option>
                                        <option value="O+">O+</option>
                                        <option value="B-">B-</option>
                                        <option value="B+">B+</option>
                                        <option value="A-">A-</option>
                                        <option value="A+">A+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="AB+">AB+</option>    
                                    </select>
                                </div>
                                
                                <!-- radio button pour diabete-->

                                <div class="input-group mb-3">
                                    
                                    <label for="DiabeteP" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Diabétique :</label>
                                    <div class=" col-xl-3 col-lg-8 col-md-8 col-sm-7">
                                    <label for="oui" class=""> Oui</label>
                                        <input type="radio" name="DiabeteP" id="oui" value="Oui">
                                    </div>
                                    <div class="col-xl-3 col-lg-8 col-md-8 col-sm-7"> 
                                    <label for="Non" class=""> Non</label>
                                        <input type="radio" name="DiabeteP" id="Non" value="Non" >
                                    
                                       
                                    </div>
                                </div>
                                <!-- input pour type de Diabete-->
                                <div class="input-group mb-3">
                                    <label for="TypeDiabete" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type de Diabete :</label>
                                    <select name="TypeDiabete"  class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="TypeDiabete">
                                        <!--<option selected>Select one</option>-->
                                        <option  value=" ">--Pas de Diabete--</option>
                                        <option value="Type1">Type 1</option>
                                        <option value="Type2">Type 2</option>
                                        <option value="PréDiabète">PréDiabète</option>
                                        <option value="Diabéte de grossesse">Diabéte de Grossesse</option>
                                        
                                    </select>
                                </div>


                                <!-- input pourtype allergie  // a traiter avec php-->

                                <div class='input-group mb-3'>
                                    <label for="TypeA" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type d'allergie :</label>
                                    <select name="TypeA"  class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="TypeA">
                                    <option  value=''>--Pas d allergie--</option>
                                <?php
                                $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                                $query = "Select * from Allergies";
                                $data=$conn->query($query);
                                $data=$data->fetchall();
                                 foreach ($data as $row) {

                                    $IDA=$row['IDA'];$TypeA=$row['TypeA'];$DetailsA=$row['DetailsA'];
                                     
                                    echo"
                                
                                        
                                    
                                        <!--<option selected>Select one</option>-->
                                        
                                        <option value='$IDA'>$TypeA - $DetailsA</option>
                                       
                                        
                                    
                               
                            ";}

                                ?>
                                </select>
                                </div>
                                <!-- 2eme types d'allergies
                                -->
                                
                                <div class="input-group mt-3">
                                    <button type="button" onclick="location.href='Patient.php'" class="btn btn-primary d-inline-block mx-auto">Annuler</button>
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">Enregistrer</button>
                                        
                                </div>
                    
                            </form>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                
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