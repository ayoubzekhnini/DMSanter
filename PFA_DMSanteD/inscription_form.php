
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Inscription </title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
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
        <div class="row tm-mt-big">
            <div class="col-12 mx-auto tm-login-col">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12 text-center">
                            <!-- LOGO -->
                            <!--<i class="fas fa-3x fa-tachometer-alt tm-site-icon text-center"></i>-->
                            <h2 class="tm-block-title mt-3">Inscription</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="inscription_V.php" method="post" class="tm-login-form">
                            <div class="input-group mt-3">
                                    <label for="INPE" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">INPE</label>
                                    <input name="INPE" type="text" class="form-control validate" id="INPE"  required pattern="[0-9 ]{0,9}">
                                </div>
                                <div class="input-group mt-3">
                                    <label for="NomMedecin" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom</label>
                                    <input name="NomMedecin" type="text" class="form-control validate" id="NomMedecin"  required>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="PrenomMedecin" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Prénom</label>
                                    <input name="PrenomMedecin" type="text" class="form-control validate" id="PrenomMedecin"  required>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="DateNaissanceMedecin" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date de Naissance </label>
                                    <input name="DateNaissance" type="date" class="form-control validate" id="DateNaissanceMedecin"  required>
                                </div>

                                <div class="input-group mt-3">
                                    <label for="Specialite" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Spécialité</label>
                                    <input name="Specialite" type="text" class="form-control validate" id="Specialite"  required>
                                </div>

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
                                                    <option value ='$IDLT'> $LibelleLT</option>


                                                    ";
                                                    }
                                         
                                        ?>
                                    </select>
                                
                                </div>



                                <div class="input-group mt-3">
                                    <label for="MailMedecin" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mail</label>
                                    <input name="MailMedecin" type="text" class="form-control validate" id="MailMedecin"  required>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="TelephoneMedecin" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Telephone</label>
                                    <input name="TelephoneMedecin" type="text" class="form-control validate" id="TelephoneMedecin"  required>
                                </div>

                                <div class="input-group mt-3">
                                    <label for="Password" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Password</label>
                                    <input name="Password" type="password" class="form-control validate" id="Password"  required>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="Confirmationpassword" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Confirmez votre password</label>
                                    <input name="Confirmationpassword" type="password" class="form-control validate" id="Confirmationpassword"  required>
                                </div>

                                <!-- submit -->
                                <div class="input-group mt-3">
                                <button type="button" onclick="location.href='login.php'" class="btn btn-primary d-inline-block mx-auto">login</button>
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">Inscription</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light text-center">
                
            </div>
        </footer>
    </div>
</body>

</html>