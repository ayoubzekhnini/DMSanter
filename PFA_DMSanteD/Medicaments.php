<?php session_start();

if(isset($_SESSION['INPE'])){
    $nom=$_SESSION['Nom'];
    $prenom=$_SESSION['Prenom'];
}
else{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="Fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medicaments</title>
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
   
        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
                }
        
    </style>
    <style>
        body{
            background-image: url(img5.jpg);
        }
    </style>

    
<script>
        function myFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[0];
                              if (td) {
                                    txtValue = td.textContent || td.innerText;
                                         if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                           tr[i].style.display = "";
                                             } else {
                                       tr[i].style.display = "none";
                                         }
                                     }       
                                     }
                                    }
    </script>
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
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2 class="tm-block-title d-inline-block">Information sur les médicaments</h2>
                        </center>
                        </div>
                    </div>
                
                    
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                                <tr class="tm-bg-gray">
                                    
                                    <th scope="col">Medicament</th>
                                    <th scope="col" class="text-center">Details</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- php tableau pour afficher les données des medecins -->
                                
                            <?php
                                
                               
                                
                                $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                                
                                $query = "Select * from medicament
                                            
                                ";
                                $data=$conn->query($query);
                                $data=$data->fetchall();
                               
                                foreach ($data as $row) {
                                    $IDMedicament=$row['IDMedicament']; $LibelleMedicament=$row['LibelleMedicament'];
                                    $ObservationMedicament=$row['ObservationMedicament'];
                                    
                                    echo "
                                    <tr>
                                    
                                            <td>$LibelleMedicament</td>
                                            <td>$ObservationMedicament</td>
                                            
                                            
                                            
                                            <td> 
                                              
                                                <a href='ordonance.php?IDMedicament=$IDMedicament'>
                                                <button type='button' class='btn btn-default btn-sm' class='open-button' onclick='openForm()'>
                                                <span class='glyphicon glyphicon-th-list'></span> Ajouter a une Ordonance
                                                </button>
                                                </a>
                                            
                                            </td>
                                            
                                            
                            
                            </tr>
                                        ";
                                }
                               
                                
                            ?>
                          
                            </tbody>
                           




                   
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
                