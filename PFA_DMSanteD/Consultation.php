<?php session_start();

if(isset($_SESSION['INPE'])){
    $nom=$_SESSION['Nom'];
    $prenom=$_SESSION['Prenom'];
    $IDP=$_GET['IDP'];
    $_SESSION['IDP']=$IDP;

    include("conexionDB.php");
    $query="Select * from Patient where IDP ='$IDP'";
    $data=$conn->query($query);
    $data=$data->fetchall();
    foreach ($data as $row) {

    $NomP=$row['NomP'];$PrenomP=$row['PrenomP'];$CINP=$row['CINP']
     
  ;}

}
else{
    header("location:login.html");
}
?>
<!DOCTYPE html>
<html lang="Fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultation</title>
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
        <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
            <div class="bg-white tm-block">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2 class="tm-block-title d-inline-block">Consultation</h2>
                        </center>
                    </div>
                </div>
                
                <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="Consultation_v.php" class="tm-edit-product-form" method ="post">
                                
                            
                            
                                <div class="input-group mb-3">
                                    <label for="NomMedecin" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom Medecin:
                                    </label>
                                    <input id="NomMedecin" name="NomMedecin" type="text"  data-parsley-type="Nom" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo"".$nom. " ".$prenom?>" Disabled>
                                </div>

                                <div class="input-group mb-3">
                                    <label for="NomPatient" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom Patient :</label>
                                    
                                    <input id="NomPatient" name="NomPatient" type="text"  data-parsley-type="prenom" placeholder="Patient"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo"".$NomP." ".$PrenomP ?>" Disabled>
                                </div>

                                <div class="input-group mb-3">
                                    <label for="DateC" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date 
                                        Consultation 
                                    </label>
                                    <input id="DateC" name="DateC" type="date" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                        data-large-mode="true" value="<?php echo date("Y-m-d");?>"Disabled>
                                </div>

                                <div class="input-group mb-3">
                                    <label for="DetailsC" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Détails : </label>
                                    <textarea name="DetailsC" id="DetailsC" class="form-control"></textarea>
                                    
                                </div>

                                
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">Nouvelle Consultation</button>
                                </div>
                   
                            </form>
                    </div >
                                        <div class=" mt-2">
                                            <h4>Liste des consultation pour le patient<b> <?php echo"".$NomP." ".$PrenomP ?></b></h4>
                                        </div>

                    <div class="table-responsive">
                        
                        <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                                <tr class="tm-bg-gray">
                                    <th scope="col">Nom Medecin</th>
                                    <th scope="col" class="text-center">Spécialité</th>
                                    <th scope="col">Date de Consultation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- php tableau pour afficher les données des medecins -->
                                
                                <?php
                                
                               
                                
                                    $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                                
                                    $query = "Select * from Consultation C 
                                            inner join Patient P on C.IDP=P.IDP
                                            inner join Medecin M on M.INPE=C.INPE 
                                            where P.IDP='$IDP'
                                            
                                             ";
                                    $data=$conn->query($query);
                                    $data=$data->fetchall();
                               
                                    foreach ($data as $row) {
                                    
                                    $NomMedecin=$row["NomMedecin"];$PrenomMedecin=$row['PrenomMedecin'];$DateConsultation=$row['DateC'];$Specialite=$row["Specialite"];
                                    
                                    echo "
                                    <tr>
                                    
                                            <td>$NomMedecin $PrenomMedecin</td>
                                            <td>$Specialite</td>
                                            <td>$DateConsultation</td>
                                    </tr>
                                        ";
                                }
                            ?>
                          
                            </tbody>
                </div>
            </div>
        </div>
            
       </div>
        <footer class="row tm-mt-small">
           
           
        </footer>
    </div>
    



    <script src="js/jquery-3.3.1.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
</body>

</html>