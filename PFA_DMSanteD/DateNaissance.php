<?php
session_start();


$nvDN=date('Y-m-d', strtotime($_POST['DateNaissance']));
$inpe=$_SESSION['INPE'];

$conn=new PDO("mysql:host=localhost;dbname=DMSante","root","");
$query =
"UPDATE Medecin
SET DateNaissance = '$nvDN'
WHERE INPE = '$inpe'
" ;
$conn->exec($query);
header("location:profile.php")
?>