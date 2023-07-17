<?php
session_start();

$CINP  =$_POST['CIN'];
$NomP  =$_POST['Nom'];
$PrenomP   =$_POST['Prenom'];
$DNP   =$_POST['DateNaissance'];
$Tlfn  =$_POST['telephoneP'];
$Sexe  =$_POST['Sexe'];
$MailP =$_POST['MailP'];
$Profession=$_POST['Profession'];
$AdresseP  =$_POST['AdresseP'];
$Tlfn2 =$_POST['Tlfn2'];
$VaccinP   =$_POST['VaccinP'];
$DoseVaccinP   =$_POST['DoseVaccinP'];
$Poids =$_POST['Poids'];
$GS=$_POST['GS'];
$DiabeteP=$_POST['DiabeteP'];
$TypeDiabete=$_POST['TypeDiabete'];
$Allergie=$_POST['TypeA'];


//requetes
$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query = "insert into Patient values ('','$CINP','$NomP','$PrenomP','$DNP','$Tlfn','$Profession','$Sexe','$Poids'
            ,'$GS','$MailP','$AdresseP','$Tlfn2','$VaccinP','$DoseVaccinP','$DiabeteP','$TypeDiabete')";
$conn->exec($query);

$con=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query2="select * from Patient where CINP='$CINP'";
$data=$con->query($query2);
$data=$data->fetchall();
foreach ($data as $row) {

    $IDPa=$row['IDP'];
     
  ;}


$connn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query3="insert into patient_allergie values ('$Allergie','$IDPa')";
$connn->exec($query3);

header("location:Patient.php");

?>