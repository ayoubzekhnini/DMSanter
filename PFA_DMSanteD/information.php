<?php
session_start();

if(isset($_SESSION['INPE'])){ //le nom et prenom de la personne co
    $nom=$_SESSION['Nom'];
    $prenom=$_SESSION['Prenom'];
    if(isset($_GET['INPE'])){
        $inpe=$_GET['INPE'];// l'inpe de la personne  selectionné


        $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
        $query = "Select * from Medecin M
                inner join medecin_lt Mlt on M.INPE = Mlt.INPE
                inner join LieuTravail lt on Mlt.IDLT = lt.IDLT
                where M.INPE = $inpe";
        $data=$conn->query($query);
        $data=$data->fetchall();
        foreach ($data as $row) {
                $Inpe=$row['INPE'];$IDLT=$row['IDLT'];  
                $Nom=$row["NomMedecin"];$Prenom=$row['PrenomMedecin'];$Specialite=$row["Specialite"];
                $LieuTravail=$row['LibelleLT'];$mail=$row['MailMedecin'];$tel=$row['TelephoneMedecin'];
                $DN=$row['DateNaissance'];
            }
        }
        else{
            header("location:medecin.php");
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
    <title>Medecins</title>
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    
    <link rel="stylesheet" href="css/fontawesome.min.css">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    <link rel="stylesheet" href="css/tooplate.css">
    <style>
        body{
            background-image: url(img2.jpg);
        }
    </style>

  

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
        <div class="row tm-content-row tm-mt-big">
            <div class="tm-col ">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12" >
                            <h2 class="tm-block-title d-inline-block"><?php echo"Dr.".$Nom. " ".$Prenom ?> </h2>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-striped tm-table-striped-even mt-3">
                            
                        
                        <?php
                        echo "
                            
                                <tr class='tm-bg-gray'>
                                    <th scope='col'>Nom Medecin</th>
                                    <td>$Nom $Prenom</td>
                                </tr>
                                <tr class='tm-bg-gray'>
                                    <th scope='col' >Spécialité</th>
                                    <td>$Specialite</td>
                                </tr>

                                <tr class='tm-bg-gray'>
                                    <th scope='col'>Lieu de Travail</th>
                                    <td>$LieuTravail</td>
                                </tr>

                                <tr class='tm-bg-gray'>
                                    <th scope='col'>Adresse Mail</th>
                                    <td>$mail</td>
                                </tr>

                                <tr class='tm-bg-gray'>
                                    <th scope='col'>Numero de telephone</th>
                                    <td>$tel</td>
                                </tr>
                                <tr class='tm-bg-gray'>
                                    <th scope='col'>Date de Naissance : </th>
                                    <td>$DN</td>
                                </tr>

                                        ";
                                
                               
                                
                            ?>
                          
                            </table>
                            




                   
                </div>
            </div>
            
        </div>
        <footer class="row tm-mt-small">
           
           
        </footer>
    




    <script src="js/jquery-3.3.1.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
</body>

</html>