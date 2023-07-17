<?php
session_start();
include("conexionDB.php");
if(isset($_POST['Patient'])){
    $CINP=$_POST['Patient'];
    $typeA=$_POST['typeA'];
    $libelleA=$_POST['LibelleA'];
    $DateA=$_POST['DateAnalyse'];
    $Observation=$_POST['Observation'];

    $query="select IDP from Patient where CINP='$CINP'";
    $data=$conn->query($query);
    $data=$data->fetchall();
        foreach ($data as $row) {
            $IDP=$row['IDP'];
            }
    
  
    $image_name=$_FILES["image"]["name"];
    $image_size=$_FILES["image"]["size"];
    $image_tmp=$_FILES["image"]["tmp_name"];

    $file=addslashes(file_get_contents($image_tmp));
    $query2="insert into analyses values ('','$libelleA','$typeA','$DateA','$file','$Observation','$IDP') ";
    $conn->exec($query2);
    header("lcoation:patient.php");
    
}
?>