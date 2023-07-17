<?php
session_start();

$INPE=$_SESSION['INPE'];
if(isset($_SESSION['INPE'])){
    include("conexionDB.php");
	$query="SELECT * from Medecin M
    inner join medecin_lt Mlt on M.INPE = Mlt.INPE
    inner join LieuTravail lt on Mlt.IDLT = lt.IDLT
    where M.INPE = '$INPE'";
	$data=$conn->query($query);
	

    $data=$data->fetchall();
foreach ($data as $row) {
   
		$INPE=$row["INPE"];
        $IDLT=$row["IDLT"];
		$nom=$row["NomMedecin"];
        $prenom=$row["PrenomMedecin"];
		$Specialite=$row["Specialite"];
		$MailMedecin=$row["MailMedecin"];
		$TelephoneMedecin=$row["TelephoneMedecin"];
		$Password=$row["Password"];
		$DateNaissance=$row["DateNaissance"];
        $LieuTravail=$row["LibelleLT"];
        //requete pour Lieu Travail

        

	}

    
    
}
else{
    header("location:login.php");
}
    
   
?>
<?php

$errPass="";
$errPass2="";
if(isset($_POST['OLDPassword'])){
    $Old=$_POST['OLDPassword'];
    $NV=$_POST['NVPassword'];
    $NV2=$_POST['NVpassword2'];

    include("conexionDB.php");
    $query1="Select Password From Medecin Where INPE = '$INPE'";
    $data=$conn->query($query1);
    $lines=$data->fetchAll();

        if(count($lines)== 1){
            $pass=$lines[0]["Password"];
        }
if($Old==$pass){
    if($NV==$NV2){
        $query="UPDATE Medecin M
                SET M.Password = '$NV'
                WHERE INPE = '$INPE'
                ";
        $conn->exec($query);
        
    }
    else{
        $errPass="Les Mots de pass que vous avez entré ne sont pas identiques";
    }
}
else{
    $errPass="Votre Ancien mot de passe est incorrect";
}
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
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
        .open-button {
            background-color: #555;
            : white;
            padding: 16px 20px;
             border: none;
                cursor: pointer;
            opacity: 0.8;
             position: fixed;
             bottom: 23px;
            right: 28px;
            width: 280px;
                }

        /* The popup form - hidden by default */
        .form-popup {
            background-color: white;
            display: none;
            position: sticky;
            bottom: 200px;
            right: 0px;
            left : 100px;
            border: 3px solid #f1f1f1;
            z-index: 9;
                }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
                    }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password], .form-container input[type=Date] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
                }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
             background-color: #ddd;
            outline: none;
                }

        /* Set a style for the submit/login button */
        .form-container .btn {
             background-color: #04AA6D;
             color: white;
            padding: 16px 20px;
             border: none;
             cursor: pointer;
             width: 100%;
             margin-bottom:10px;
             opacity: 0.8;
            }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
         background-color: red;
            }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
         opacity: 1;
        }
    </style>
    <style>
        body{
            background-image: url(img2.jpg);
        }
    </style>

    <script>
            //fonction specialite   
                function openFormS() {
                        document.getElementById("myFormS").style.display = "block";
                        }

                 function closeFormS() {
                        document.getElementById("myFormS").style.display = "none";
                        } 
            //fonction Lieu Travail

                        function openFormLT() {
                        document.getElementById("myFormLT").style.display = "block";
                        }

                        function closeFormLT() {
                        document.getElementById("myFormLT").style.display = "none";
                        } 
            //fonctions Mail
                        function openFormM() {
                        document.getElementById("myFormM").style.display = "block";
                        }

                        function closeFormM() {
                        document.getElementById("myFormM").style.display = "none";
                        } 

            //fonction Telephone
                        function openFormT() {
                        document.getElementById("myFormT").style.display = "block";
                        }

                        function closeFormT() {
                        document.getElementById("myFormT").style.display = "none";
                        } 
            //fonction date de Naissance
                        function openFormDN() {
                        document.getElementById("myFormDN").style.display = "block";
                        }

                        function closeFormDN() {
                        document.getElementById("myFormDN").style.display = "none";
                        } 
            // fonction Pour changer mot de passe
                        function openFormMDPS() {
                        document.getElementById("myFormMDPS").style.display = "block";
                        }

                        function closeFormMDPS() {
                        document.getElementById("myFormMDPS").style.display = "none";
                        } 



    </script>
    
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
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
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
            <div class="  col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block"><?php echo"Dr.".$nom." ".$prenom ?></h2>
                        </div>
                    </div>


                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                        <table class="table ">
  
<tbody>
    <tr>
      <th scope="row">Nom </th>
      <td><?php echo"".$nom." ".$prenom ?></td>
      <td>    </td>
      
    </tr>
    <tr>
      <th scope="row">Spécialité</th>
      <td><?php echo"".$Specialite?></td>
      <td>
      <button type='button' class='btn btn-default btn-sm' class='open-button' onclick='openFormS()'>
      <span class='glyphicon glyphicon-th-list'></span> Modifier
      </button>

      </td>
      
    </tr>
    <tr>
      <th scope="row">Lieu de Travail</th>
      <td ><?php echo"".$LieuTravail ?></td>
      <td>
      <button type='button' class='btn btn-default btn-sm' class='open-button' onclick='openFormLT()'>
      <span class='glyphicon glyphicon-th-list'></span>Modifier
       </button>
      </td>
    </tr>
    <tr>
      <th scope="row">Votre E-Mail</th>
      <td><?php echo"".$MailMedecin?></td>
      <td>
      <button type='button' class='btn btn-default btn-sm' class='open-button' onclick='openFormM()'>
      <span class='glyphicon glyphicon-th-list'></span> Modifier
      </button>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Votre Telephone</th>
      <td><?php echo"".$TelephoneMedecin?></td>
      <td>
      <button type='button' class='btn btn-default btn-sm' class='open-button' onclick='openFormT()'>
        <span class='glyphicon glyphicon-th-list'></span> Modifier
        </button>
      </td>
      
    </tr>
    <tr>
      <th scope="row">Date de Naissance</th>
      <td><?php echo"".$DateNaissance?></td>
      <td>
      <button type='button' class='btn btn-default btn-sm ' class='open-button' onclick='openFormDN()'>
      <span class='glyphicon glyphicon-th-list'></span> Modifier
      </button>
      </td>
      
    </tr>
  </tbody>
</table>
                          
                                <div>
                                    <button type='button'  class="btn btn-danger btn-sm" class='open-button' onclick='openFormMDPS()'>
                                        <span class='glyphicon glyphicon-th-list' ></span> Changer le Mode de passe
                                    </button>
                                    
                                    <figure class="text-center">
                                        <figcaption class="blockquote">
                                            <p class="text-danger"><em><?= $errPass?></em></p> 
                                        </figcaption>
                                    </figure>
                                   
                                    
                                </div>
                                <div>
                                    <button type='button'  class="btn btn-danger btn-sm" class='open-button' onclick="location.href='SuppPatient.php?INPE=<?=$INPE?>'">
                                        <span class='glyphicon glyphicon-th-list' ></span> Supprimer Mon Compte
                                    </button>
                                    
                                </div>

                            


                            <!-- les pop up -->
                            <div class="form-popup" id="myFormS">
                                <form action="specialite_v.php" class="form-container" method="post">
                                           <h1>Modification</h1>

                                                    <label for="Specialite"><b>Changer votre Specialité</b></label>
                                                    <input type="text" placeholder="Votre specialite" name="specialite" required>

                                             
                                                    <button type="submit" class="btn">Executer</button>
                                                    <button type="button" class="btn cancel" onclick="closeFormS()">Annuler</button>
                                    </form>
                            </div>
                                <!-- condition php -->
                            <!-- pop up Lieu Travail -->

                            <div class="form-popup" id="myFormLT">
                                <form action="LieuTravail_v.php" class="form-container" method ="POST">
                                           <h1>Modification</h1>
                                                    


                                           <div class="input-group mt-3">
                                                <label for="LieuTravail" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Lieu de Travail</label> 
                                                <!-- php pour selectionner les leiux de travails -->
                                                    <select name="LieuTravail" id="LieuTravail" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                                            <?php
                                                                    $conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
                                                                    $query = "Select * from LieuTravail";
                                                                    $data=$conn->query($query);
                                                                    $data=$data->fetchall();
                                                                    foreach ($data as $row) {
                                                                        $IDLT=$row['IDLT'];$LibelleLT=$row['LibelleLT'];$AdresseLT=$row['AdresseLT'];
                                    
                                                                        echo "
                                                                            <option value ='$IDLT'> $LibelleLT</option>";
                                                                            }
                                                            ?>
                                                    </select>
                                            </div>
                                                 <!--   <label for="LieuTravail"><b>Changer votre Lieu de travail</b></label>
                                                    <input type="text" placeholder="Votre Lieu de travail" name="LieuTravail" required>-->

                                             
                                                    <button type="submit" class="btn">Executer</button>
                                                    <button type="button" class="btn cancel" onclick="closeFormLT()">Annuler</button>
                                    </form>
                            </div>
                            <!-- pop up E-mail -->
                            <div class="form-popup" id="myFormM">
                                <form action="Mail_v.php" class="form-container" method ="POST">
                                           <h1>Modification</h1>

                                                    <label for="Mail"><b>Changer votre E-Mail</b></label>
                                                    <input type="text" placeholder="Votre E-Mail" name="Mail" required>

                                             
                                                    <button type="submit" class="btn">Executer</button>
                                                    <button type="button" class="btn cancel" onclick="closeFormM()">Annuler</button>
                                    </form>
                            </div>

                        <!-- pop up telephone -->
                        <div class="form-popup" id="myFormT">
                                <form action="telephone_v.php" class="form-container" method ="POST">
                                           <h1>Modification</h1>

                                                    <label for="Telephone"><b>Changer votre Telephone</b></label>
                                                    <input type="text" placeholder="Votre specialite" name="Telephone" required>

                                             
                                                    <button type="submit" class="btn">Executer</button>
                                                    <button type="button" class="btn cancel" onclick="closeFormT()">Annuler</button>
                                    </form>
                            </div>
                            <!-- pop up Date de Naissance -->
                            <div class="form-popup" id="myFormDN">
                                <form action="DateNaissance.php" class="form-container" method="post">
                                           <h1>Modification</h1>

                                                    <label for="DateNaissance"><b>Changer votre Date de naissance</b></label>
                                                    <input type="Date" placeholder="Votre Date de Naissance" name="DateNaissance" required>

                                             
                                                    <button type="submit" class="btn">Executer</button>
                                                    <button type="button" class="btn cancel" onclick="closeFormDN()">Annuler</button>
                                    </form>
                            </div>
                            <!-- changement du mot de passe -->
                            <div class="form-popup" id="myFormMDPS">
                                <form action="#" class="form-container" method="post">
                                           <h1>Modification</h1>

                                                    <label for="OLDPassword"><b>Votre Ancien Mot de passe</b></label>
                                                    <input type="password" placeholder="Ancien" name="OLDPassword" >

                                                    <label for="NVPassword"><b>Votre Nouveau Mot de passe</b></label>
                                                    <input type="password" placeholder="Nouveau" name="NVPassword" >

                                                    <label for="NVPssword2"><b>Retaper Votre Nouveau Mot de passe</b></label>
                                                    <input type="password" placeholder="Nouveau" name="NVpassword2" >
                                             
                                                    <button type="submit" class="btn">Executer</button>
                                                    <button type="button" class="btn cancel" onclick="closeFormMDPS()">Annuler</button>
                                    </form>
                            </div>









                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" type="file" style="display:none;" />
                                <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..." onclick="document.getElementById('fileInput').click();"
                                />
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