    
<?php
session_start();
$INPE="";
$Pass="";
$err="";
if(isset($_POST['INPE'])){
    $INPE=$_POST['INPE'];
    $Pass=$_POST['password'];
    include("conexionDB.php");
	$query="select * from Medecin where INPE = '$INPE' and Password = '$Pass'";
	$data=$conn->query($query);
	$lines=$data->fetchAll();

    if(count($lines)== 1){
		$_SESSION['INPE']=$lines[0]["INPE"];
		$_SESSION['Nom']=$lines[0]["NomMedecin"];
        $_SESSION['Prenom']=$lines[0]["PrenomMedecin"];
		$_SESSION['Specialite']=$lines[0]["Specialite"];
		$_SESSION['MailMedecin']=$lines[0]["MailMedecin"];
		$_SESSION['TelephoneMedecin']=$lines[0]["TelephoneMedecin"];
		$_SESSION['Password']=$lines[0]["Password"];
		$_SESSION['DateNaissance']=$lines[0]["DateNaissance"];
		$_SESSION['CINM']=$lines[0]["CIN"];


		header("location:index.php");
	}
    else{
        $err="Les données que vous avez saisies sont incorrectes";
        
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login </title>
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
                            <h2 class="tm-block-title mt-3">Login</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="#" method="post" class="tm-login-form">
                                <div class="input-group">
                                    <label for="INPE" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">INPE</label>
                                    <input name="INPE" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="INPE" value="<?php echo $INPE ?>"  required pattern="[0-9 ]{0,9}">
                                </div>
                                
                                <div class="input-group mt-3">
                                    <label for="password" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Password</label>
                                    <input name="password" type="password" class="form-control validate" id="password"  required value="">
                                    
                                </div>
                                <figure class="text-center">
                                    <figcaption class="blockquote">
                                        <p class="text-danger"><em><?= $err?></em></p> 
                                    </figcaption>
                                </figure>
                                 
                                
                                <div class="input-group mt-3">
                                    <button type="button" onclick="location.href='inscription_form.php'" class="btn btn-primary d-inline-block mx-auto">Creer votre compte</button>
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">Login</button>   
                                </div>

                                
                                 
                                

                                <div class="input-group mt-3">
                                    
                                    <p><em>"Merci d'entrer Votre INPE et le mot de passe "</em></p>
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