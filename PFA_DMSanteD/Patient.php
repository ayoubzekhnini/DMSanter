<?php 
    session_start();
    $IDMaladie="";
    if(isset($_SESSION['INPE'])){
        $nom=$_SESSION['Nom'];
        $prenom=$_SESSION['Prenom'];
        if(isset($_GET['IDMaladie'])){
            $IDMaladie=$_GET['IDMaladie'];
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
    <title>Patient</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">

    <style>
   
        #myInput {
             background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 80%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
                }
        
    </style>
    <style>
        body{
            background-image: url(img2.jpg);
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

<body id="reportsPage" class="">
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
                                <a class="nav-link " href="medecin.php">Medecins</a>
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
            <div class="row tm-content-row tm-mt-big">
                <div class=" col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block ">Patients</h2>
                           </div>
                        </div><!-- col-md-4 col-sm-12 text-left -->
                        <div class="">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for CIN.." title="Type in a name">

                            
                            <a href="AjouterPatient2.php" class="btn btn-small btn-primary">Nouveau Patient</a>
                            </div>                
            
                            
                            
                            
                        
                        <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        
                                        <th scope="col" class="text-center">CIN</th>
                                        <th scope="col" class="text-center">Nom</th>
                                        <th scope="col" class="text-center">Date de naissance</th>
                                        <th scope="col" class="text-center">Tel</th>
                                        <th scope="col" class="text-center">Sexe</th>
                                        <th scope="col" class="text-center">Proffession</th>
                                        <th scope="col" class="text-center">Poids</th>
                                        <th scope="col" class="text-center">Groupe Sanguins</th>
                                        

                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                               
                                
                                $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                                $query = "Select * from Patient";
                                $data=$conn->query($query);
                                $data=$data->fetchall();
                               
                                foreach ($data as $row) {
                                    $IDP=$row['IDP'];$CINP=$row['CINP'];$NomP=$row["NomP"];$PrenomP=$row['PrenomP'];
                                    $DNP=$row['DateNaissanceP'];$telP=$row['TelephoneP'];$sexeP=$row['SexeP'];
                                    $ProfessionP=$row['ProfessionP'];
                                    $PoidsP=$row['PoidsP'];$TypeSP=$row['TypeSanguinP'];


                                    $MailP=$row['MailP'];$AdresseP=$row['AdresseP'];$tlfnSP=$row['TelephoneSecoursP'];
                                    
                                    echo "
                                    <tr>
                                     

                                            <td>$CINP</td>
                                            <td>$NomP $PrenomP</td>
                                            <td>$DNP</td>
                                            <td>$telP</td>
                                            <td>$sexeP</td>
                                            <td>$ProfessionP</td>
                                            <td>$PoidsP</td>
                                            <td>$TypeSP</td>
                                            
                                            
                                            ";
                                        if(isset($_GET['IDMaladie'])){
                                                echo"
                                            <td> 
                                              
                                                <a href='maladie.php?IDP=$IDP,IDMaladie=$IDMaladie'>
                                                <button type='button' class='btn btn-default btn-sm' class='open-button' onclick='openForm()'>
                                                <span class='glyphicon glyphicon-th-list'></span> Plus...
                                                </button>
                                                </a>
                                                
                                            
                                            </td>
                                            ";
                                        }
                                        else{
                                                echo"
                                                <td> 
                                              
                                                <a href='ajouter.php?IDP=$IDP'>
                                                <button type='button' class='btn btn-default btn-sm' class='open-button' onclick='openForm()'>
                                                <span class='glyphicon glyphicon-th-list'></span> Plus...
                                                </button>
                                                </a>
                                                
                                            
                                            </td>
                                                ";
                                            }
                                        }
                            
                                        echo"  </tr>
                                        ";
                            ?>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger">Supprimer par selection</button>
                            </div>
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-product.html";
            });
        })
$('#Recherche').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {

CIN=$("#Recherche").val();
$("#AffichP").load("Patient/affichage.php?CIN="+CIN); 
  }
}); 
    </script>
</body>

</html>