<?php 
session_start();
$INPE=$_POST['INPE'];
$NomMedecin=$_POST['NomMedecin'];
$PrenomMedecin=$_POST['PrenomMedecin'];
$Specialite=$_POST['Specialite'];
    
$MailMedecin=$_POST['MailMedecin'];
$TelephoneMedecin=$_POST['TelephoneMedecin'];
$Password=$_POST['Password'];
$DateNaissance=$_POST['DateNaissance'];


$_SESSION['INPE']=$INPE;

$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");

$query="insert into Medecin values ('$INPE','$NomMedecin','$PrenomMedecin','$Specialite','$MailMedecin','$TelephoneMedecin','$Password','$DateNaissance','')
        
";


$conn->exec($query);


//header("location:inscription_LieuTravailForm.php");
?>
<?php
session_start();

$INPE=$_SESSION['INPE'];    
$IDLT=$_POST['LieuTravail'];
$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");

$query2="insert into Medecin_lt values('$INPE','$IDLT')";
$conn->exec($query2);

header("location:login.php");
?>

