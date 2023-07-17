<?php

session_start();
$nvspecialite=$_POST['specialite'];
$inpe=$_SESSION['INPE'];

$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query =
"UPDATE Medecin
SET Specialite = '$nvspecialite'
WHERE INPE = '$inpe'
" ;
$conn->exec($query);


header("location:profile.php");


?>

