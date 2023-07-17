<?php
session_start();
$nvtlfn=$_POST['Telephone'];
$inpe=$_SESSION['INPE'];

$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query =
"UPDATE Medecin
SET TelephoneMedecin = '$nvtlfn'
WHERE INPE = '$inpe'
" ;
$conn->exec($query);
header("location:profile.php")
?>