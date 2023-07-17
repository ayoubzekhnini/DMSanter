<?php
session_start();
if(isset($_SESSION['INPE'])){
$IDP=$_SESSION['IDP'];
$INPE=$_SESSION['INPE'];
$date=date("Y-m-d");
$DetailsC=$_POST['DetailsC'];
include("conexionDB.php");
$query="insert into Consultation values (
    '','$date','$DetailsC','$INPE','$IDP'
)";
$conn->exec($query);
header("location:patient.php");

}
else{
    header("location:login.php");
}
?>