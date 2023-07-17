<?php
session_start();
$nvmail=$_POST['Mail'];
$inpe=$_SESSION['INPE'];

$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query = "UPDATE Medecin SET MailMedecin = '$nvmail' WHERE INPE = '$inpe'" ;
$conn->exec($query);
header("location:profile.php");
?>