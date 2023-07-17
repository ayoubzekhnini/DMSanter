<?php
session_start();
$nvLT=$_POST['LieuTravail'];
$inpe=$_SESSION['INPE'];

$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query = "UPDATE Medecin SET LieuTravail = '$nvLT' WHERE INPE = '$inpe'" ;
$conn->exec($query);
header("location:profile.php");
?>